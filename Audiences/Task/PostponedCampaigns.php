<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Task;

use Numbers\Users\TaskScheduler\Abstract2\Task;
use Numbers\Audiences\Audiences\Helper\Segments;
use Numbers\Audiences\Audiences\Model\Campaigns;
use Numbers\Audiences\Audiences\Model\Collection\Contacts;
use Numbers\Audiences\Audiences\Helper\Notifications;
use Numbers\Audiences\Audiences\Model\Senders;
use Numbers\Internalization\Internalization\Model\Groups;
use Numbers\Templates\Forms\Model\Layouts;
use Numbers\Templates\Forms\Helper\Sender;

class PostponedCampaigns extends Task
{
    public $task_code = 'AU::POSTPONED_CAMPAIGNS';

    public function execute(array $parameters, array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'data' => [
                'comments' => []
            ]
        ];
        // init
        $in_groups = [];
        $pre_i18n_options = \I18n::$options;
        $au_senders = [];
        // load campaigns
        $campaigns = Campaigns::queryBuilderStatic(['alias' => 'a'])
            ->select()
            ->where('AND', ['a.au_campaign_tenant_id', '=', \Tenant::id()])
            ->where('AND', ['a.au_campaign_au_campstatus_code', '=', 'SCHEDULED'])
            ->where('AND', function ($query) {
                $query->where('OR', ['a.au_campaign_postponed_datetime', 'IS', null]);
                $query->where('OR', ['a.au_campaign_postponed_datetime', '<=', \Format::now('datetime')]);
            })
            ->query(['au_campaign_id']);
        $sender_object = new \Numbers\Users\Users\Helper\Notification\Sender();
        foreach ($campaigns['rows'] as $k => $v) {
            // update status to sending
            $status_result = Campaigns::collectionStatic()->touch([
                'au_campaign_tenant_id' => \Tenant::id(),
                'au_campaign_id' => $k,
                'au_campaign_au_campstatus_code' => 'SENDING',
            ], ['updated']);
            if (!$status_result['success']) {
                return $status_result;
            }
            // load all contacts in one go as they are prepared
            $contacts = \Numbers\Audiences\Audiences\Model\Campaign\Contacts::collectionStatic()->get([
                'where' => [
                    'au_campcont_tenant_id' => \Tenant::id(),
                    'au_campcont_au_campaign_id' => $k,
                ]
            ]);
            if (count($contacts['data']) == 0) {
                goto update_to_done_label;
            } else {
                $result['data']['comments'][] = loc('NF.Message.CampaignHasContactsCounter', 'Campaign {id} has {counter} contact(s).', [
                    'id' => $k,
                    'counter' => count($contacts['data']),
                ]);
            }
            // load in group
            if (!isset($in_groups[$v['au_campaign_in_group_id']])) {
                $temp = Groups::getStatic([
                    'where' => [
                        'in_group_tenant_id' => \Tenant::id(),
                        'in_group_id' => $v['au_campaign_in_group_id'],
                    ],
                    'pk' => null,
                    'single_row' => true,
                ]);
                $in_groups[$v['au_campaign_in_group_id']] = [
                    'group_id' => $temp['in_group_id'],
                    'language_code' => $temp['in_group_language_code'],
                    'locale_code' => $temp['in_group_locale_code'],
                    'timezone_code' => $temp['in_group_timezone_code'],
                    'format_date' => $temp['in_group_format_date'],
                    'format_time' => $temp['in_group_format_time'],
                    'format_datetime' => $temp['in_group_format_datetime'],
                    'format_timestamp' => $temp['in_group_format_timestamp'],
                    'format_amount_frm' => $temp['in_group_format_amount_frm'],
                    'format_amount_fs' => $temp['in_group_format_amount_fs'],
                    'format_uom' => $temp['in_group_format_uom'],
                ];
            }
            // load senders
            if (!isset($au_senders[$v['au_campaign_au_sender_id']])) {
                $au_senders[$v['au_campaign_au_sender_id']] = Senders::getStatic([
                    'where' => [
                        'au_sender_tenant_id' => \Tenant::id(),
                        'au_sender_id' => $v['au_campaign_au_sender_id'],
                    ],
                    'pk' => null,
                    'single_row' => true,
                ]);
            }
            // generate content
            foreach ($contacts['data'] as $k2 => $v2) {
                // set IN Group
                \I18n::init($in_groups[$v['au_campaign_in_group_id']]);
                // main switch
                switch ($v2['au_campcont_au_camptype_code']) {
                    case 'SMS':
                    case 'WHATSAPP':
                        if ($v2['au_campcont_au_camptype_code'] == 'SMS') {
                            $sms_result = Sender::sendSMSMessage(
                                $v['au_campaign_t9_smstemplate_id'],
                                $v2['au_campcont_au_contact_id'],
                                $v2['au_campcont_phone'],
                                [
                                    '__nf_message_plain' => $v['au_campaign_plain_message'],
                                    '__sender_phone' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_phone'],
                                    '__profile' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_sm_smsprofile_id'],
                                ],
                            );
                        } else {
                            $sms_result = Sender::sendWhatsAppMessage(
                                $v['au_campaign_t9_wapptemplate_id'],
                                $v2['au_campcont_au_contact_id'],
                                $v2['au_campcont_phone'],
                                [
                                    '__nf_message_plain' => $v['au_campaign_plain_message'],
                                    '__sender_phone' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_phone'],
                                    '__profile' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_sm_smsprofile_id'],
                                ],
                            );
                        }
                        if (!$sms_result['success']) {
                            $result['data']['comments'][] = loc('NF.Message.CampaignCouldNotDeliverMessage', 'Campaign {id} contact {name} could not deliver message.', [
                                'id' => $k,
                                'name' => $v2['au_campcont_name'],
                            ]);
                            $result['data']['comments'][] = $sms_result['error'];
                            continue;
                        } else {
                            $result['data']['comments'][] = loc('NF.Message.SentCampaignMessageToEmail', 'Sent campaign {campaign_id} message to {email}!', [
                                'campaign_id' => $k,
                                'email' => $v2['au_campcont_phone'],
                            ]);
                        }
                        // save in body
                        $sender_result = $sender_object->storeSingleNotification([
                            'notification_code' => $v2['au_campcont_au_camptype_code'] == 'SMS' ? 'AU::SMS_NOTIFICATION_SIMPLE' : 'AU::WHATSAPP_NOTI_SIMPLE',
                            'important' => false,
                            'from_email' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_phone'],
                            'from_name' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_name'],
                            'subject' => $v2['au_campcont_au_camptype_code'] == 'SMS' ? 'SMS Message' : 'WhatsApp Message',
                            'body' => $sms_result['full_html'],
                            'bytea' => true,
                            'user_id' => $v2['au_campcont_um_user_id'],
                            'email' => null,
                            'phone' => $v2['au_campcont_phone'],
                        ]);
                        // update contact
                        \Numbers\Audiences\Audiences\Model\Campaign\Contacts::collectionStatic()->merge([
                            'au_campcont_tenant_id' => \Tenant::id(),
                            'au_campcont_au_campaign_id' => $v2['au_campcont_au_campaign_id'],
                            'au_campcont_au_contact_id' => $v2['au_campcont_au_contact_id'],
                            'au_campcont_au_sender_id' => $v['au_campaign_au_sender_id'],
                            'au_campcont_sender_phone' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_phone'],
                            'au_campcont_um_mesbody_id' => $sender_result['um_mesbody_id'],
                            'au_campcont_au_campstatus_code' => 'DONE',
                        ]);
                        break;
                    case 'EMAIL':
                        $mail_result = Sender::sendEmailMessage(
                            $v['au_campaign_t9_page_id'],
                            $v2['au_campcont_au_contact_id'],
                            $v2['au_campcont_email'],
                            [
                                '__nf_message_plain' => $v['au_campaign_plain_message'],
                                'sender_email' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_email'],
                                'sender_name' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_name'],
                                'user_id' => $v2['au_campcont_um_user_id'],
                                'subject' => $v['au_campaign_subject'],
                                'important' => $v['au_campaign_important'],
                                '__profile' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_sm_mailprofile_id'],
                            ],
                        );
                        if (!$mail_result['success']) {
                            $result['data']['comments'][] = loc('NF.Message.CampaignCouldNotDeliverMessage', 'Campaign {id} contact {name} could not deliver message.', [
                                'id' => $k,
                                'name' => $v2['au_campcont_name'],
                            ]);
                            $result['data']['comments'][] = $sms_result['error'];
                            continue;
                        } else {
                            $result['data']['comments'][] = loc('NF.Message.SentCampaignMessageToEmail', 'Sent campaign {campaign_id} message to {email}!', [
                                'campaign_id' => $k,
                                'email' => $v2['au_campcont_email'],
                            ]);
                        }
                        // save in body
                        $sender_result = $sender_object->storeSingleNotification([
                            'notification_code' => 'AU::EMAIL_NOTIFICATION_SIMPLE',
                            'important' => $v['au_campaign_important'],
                            'from_email' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_email'],
                            'from_name' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_name'],
                            'subject' => $v['au_campaign_subject'],
                            'body' => $mail_result['html'],
                            'bytea' => true,
                            'user_id' => $v2['au_campcont_um_user_id'],
                            'email' => $v2['au_campcont_email'],
                            'phone' => null,
                        ]);
                        // update contact
                        \Numbers\Audiences\Audiences\Model\Campaign\Contacts::collectionStatic()->merge([
                            'au_campcont_tenant_id' => \Tenant::id(),
                            'au_campcont_au_campaign_id' => $v2['au_campcont_au_campaign_id'],
                            'au_campcont_au_contact_id' => $v2['au_campcont_au_contact_id'],
                            'au_campcont_au_sender_id' => $v['au_campaign_au_sender_id'],
                            'au_campcont_sender_email' => $au_senders[$v['au_campaign_au_sender_id']]['au_sender_email'],
                            'au_campcont_subject' => $v['au_campaign_subject'],
                            'au_campcont_important' => $v['au_campaign_important'],
                            'au_campcont_um_mesbody_id' => $sender_result['um_mesbody_id'],
                            'au_campcont_au_campstatus_code' => 'DONE',
                        ]);
                        break;
                    default:
                        throw new \Exception('Unknown type?');
                }
            }
            update_to_done_label:
                        // update to sent
                        $status_result = Campaigns::collectionStatic()->touch([
                            'au_campaign_tenant_id' => \Tenant::id(),
                            'au_campaign_id' => $k,
                            'au_campaign_au_campstatus_code' => 'DONE',
                        ], ['updated']);
        }
        // revert i18n
        \I18n::init($pre_i18n_options);
        // success
        $result['success'] = true;
        return $result;
    }
}
