<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Form;

use Object\Form\Wrapper\Base;
use Numbers\Tenants\Tenants\Helper\Sequence;
use Numbers\Audiences\Audiences\Helper\Segments;
use Numbers\Audiences\Audiences\Model\Collection\Contacts;
use Object\Validator\Phone;
use Validator;

class Campaigns extends Base
{
    public $form_link = 'au_campaigns';
    public $module_code = 'AU';
    public $title = 'A/U Campaigns Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true,
            'import' => true
        ]
    ];
    public $workflow_steps = [
        'step1' => [
            'label_name' => 'General',
            'icon' => 'fa-solid fa-window-restore',
            'panel_type' => 'secondary',
            'containers' => ['top', 'general_container'],
            'order' => 1000,
        ],
        'step2' => [
            'label_name' => 'Groups',
            'icon' => 'fa-regular fa-object-group',
            'containers' => ['groups_container'],
            'order' => 2000,
        ],
        'step3' => [
            'label_name' => 'Segments',
            'icon' => 'fa-regular fa-object-ungroup',
            'containers' => ['segments_container'],
            'order' => 3000,
        ],
        'step4' => [
            'label_name' => 'Contents',
            'icon' => 'fa-regular fa-newspaper',
            'containers' => ['contents_container'],
            'order' => 4000,
        ],
        'step5' => [
            'label_name' => 'Scheduling',
            'icon' => 'fa-regular fa-calendar-alt',
            'containers' => ['scheduling_container'],
            'order' => 5000,
        ],
        self::WORKFLOW_REVIEW_CONTAINER => self::WORKFLOW_REVIEW_DATA,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'groups_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Audiences\Audiences\Model\Campaign\Groups',
            'details_pk' => ['au_campgrp_au_group_id'],
            'order' => 35000
        ],
        'segments_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Audiences\Audiences\Model\Campaign\Segments',
            'details_pk' => ['au_campsegm_au_segment_id'],
            'order' => 35001,
            'required' => true,
        ],
        'segments_stats_container' => ['default_row_type' => 'grid', 'order' => 35001, 'custom_renderer' => 'self::renderStatistics'],
    ];
    public $rows = [
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'groups' => ['order' => 200, 'label_name' => 'Groups'],
            'segments' => ['order' => 300, 'label_name' => 'Segments'],
            'contents' => ['order' => 400, 'label_name' => 'Contents'],
            'scheduling' => ['order' => 500, 'label_name' => 'Scheduling'],
        ],
    ];
    public $elements = [
        'top' => [
            'au_campaign_id' => [
                'au_campaign_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Campaign #', 'domain' => 'campaign_id_sequence', 'percent' => 50, 'navigation' => true],
                'au_campaign_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => 'c', 'percent' => 45, 'navigation' => true],
                'au_campaign_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'au_campaign_name' => [
                'au_campaign_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
            ],
            'groups' => [
                'groups' => ['container' => 'groups_container', 'order' => 100],
            ],
            'segments' => [
                'segments' => ['container' => 'segments_container', 'order' => 100],
                'sep' => ['container' => 'segments_sep_container', 'order' => 200],
                'segments_stats' => ['container' => 'segments_stats_container', 'order' => 300],
            ],
            'contents' => [
                'contents' => ['container' => 'contents_container', 'order' => 100],
            ],
            'scheduling' => [
                'scheduling' => ['container' => 'scheduling_container', 'order' => 100],
            ]
        ],
        'general_container' => [
            'au_campaign_au_camptype_code' => [
                'au_campaign_au_camptype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'default' => 'EMAIL', 'required' => true, 'percent' => 50, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Numbers\Audiences\Audiences\Model\Campaign\CampaignTypes', 'onchange' => 'this.form.submit();'],
                'au_campaign_au_campstatus_code' => ['order' => 2, 'label_name' => 'Status', 'domain' => 'status_code', 'null' => true, 'default' => 'DRAFT', 'method' => 'select', 'options_model' => '\Numbers\Audiences\Audiences\Model\Campaign\CampaignStatuses', 'options_options' => ['i18n' => 'skip_sorting'], 'readonly' => true],
            ],
            'au_campaign_in_group_id' => [
                'au_campaign_in_group_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'I/N Group #', 'domain' => 'group_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Groups', 'onchange' => 'this.form.submit();'],
                'au_campaign_au_sender_id' => ['order' => 2, 'label_name' => 'Sender #', 'domain' => 'sender_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Audiences\Audiences\Model\Senders', 'options_depends' => ['au_sender_au_camptype_code' => 'au_campaign_au_camptype_code']],
            ]
        ],
        'groups_container' => [
            'row1' => [
                'au_campgrp_au_group_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'details_unique_select' => true, 'options_model' => '\Numbers\Audiences\Audiences\Model\Groups::optionsActive', 'onchange' => 'this.form.submit();'],
                'au_campgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'segments_container' => [
            'row1' => [
                'au_campsegm_au_segment_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Segment', 'domain' => 'segment_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'details_unique_select' => true, 'options_model' => '\Numbers\Audiences\Audiences\Model\Segments::optionsActive', 'onchange' => 'this.form.submit();'],
                'au_campsegm_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'segments_sep_container' => [
            'sep' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 100, 'label_name' => 'Statistics', 'icon' => 'fa-solid fa-info', 'percent' => 100],
            ]
        ],
        'contents_container' => [
            'au_campaign_t9_page_id' => [
                'au_campaign_t9_page_id' => ['order' => 1, 'row_order' => 150, 'label_name' => 'Page #', 'domain' => 'page_id', 'null' => true, 'required_if_set' => ['au_campaign_au_camptype_code' => 'EMAIL', '__hide_otherwise' => 'row'], 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Templates\Forms\Model\Pages', 'options_params' => ['t9_page_module_code' => ['T9', 'AU']]],
            ],
            'au_campaign_t9_smstemplate_id' => [
                'au_campaign_t9_smstemplate_id' => ['order' => 1, 'row_order' => 175, 'label_name' => 'SMS Template #', 'domain' => 'template_id', 'null' => true, 'required_if_set' => ['au_campaign_au_camptype_code' => ['SMS'], '__hide_otherwise' => 'row'], 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Templates\Forms\Model\SMSTemplates', 'options_params' => ['t9_smstemplate_module_code' => ['T9', 'AU']]],
            ],
            'au_campaign_t9_wapptemplate_id' => [
                'au_campaign_t9_wapptemplate_id' => ['order' => 1, 'row_order' => 185, 'label_name' => 'WhatsApp Template #', 'domain' => 'template_id', 'null' => true, 'required_if_set' => ['au_campaign_au_camptype_code' => ['WHATSAPP'], '__hide_otherwise' => 'row'], 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Templates\Forms\Model\WhatsAppTemplates', 'options_params' => ['t9_wapptemplate_module_code' => ['T9', 'AU']]],
            ],
            'au_campaign_subject' => [
                'au_campaign_subject' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Subject', 'domain' => 'subject', 'null' => true, 'required_if_set' => ['au_campaign_au_camptype_code' => 'EMAIL'], 'percent' => 50],
                'au_campaign_important' => ['order' => 2, 'label_name' => 'Important', 'type' => 'boolean', 'percent' => 25],
            ],
            'au_campaign_plain_message' => [
                'au_campaign_plain_message' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Message (Plain)', 'domain' => 'message', 'null' => true, 'method' => 'wysiwyg'],
            ]
        ],
        'scheduling_container' => [
            'au_campaign_postponed_datetime' => [
                'au_campaign_postponed_datetime' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Postponed Datetime', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP  + [
                self::BUTTON_ACTIONS_SUBMIT => self::BUTTON_ACTIONS_SUBMIT_DATA + [
                    'options_menu_down' => [
                        self::BUTTON_SUBMIT_DUPLICATE => self::BUTTON_SUBMIT_DUPLICATE_DATA,
                        self::BUTTON_SUBMIT_SEND => self::BUTTON_SUBMIT_SEND_DATA,
                    ]
                ],
                self::BUTTON_SUBMIT_DUPLICATE => self::BUTTON_SUBMIT_DUPLICATE_DATA + ['style' => 'display: none;'],
                self::BUTTON_SUBMIT_SEND => self::BUTTON_SUBMIT_SEND_DATA + ['style' => 'display: none;'],
            ]
        ]
    ];
    public $collection = [
        'name' => 'AU Campaigns',
        'model' => '\Numbers\Audiences\Audiences\Model\Campaigns',
        'details' => [
            '\Numbers\Audiences\Audiences\Model\Campaign\Groups' => [
                'name' => 'AU Campaign Groups',
                'pk' => ['au_campgrp_tenant_id', 'au_campgrp_au_campaign_id', 'au_campgrp_au_group_id'],
                'type' => '1M',
                'map' => ['au_campaign_tenant_id' => 'au_campgrp_tenant_id', 'au_campaign_id' => 'au_campgrp_au_campaign_id'],
            ],
            '\Numbers\Audiences\Audiences\Model\Campaign\Segments' => [
                'name' => 'AU Campaign Segments',
                'pk' => ['au_campsegm_tenant_id', 'au_campsegm_au_campaign_id', 'au_campsegm_au_segment_id'],
                'type' => '1M',
                'map' => ['au_campaign_tenant_id' => 'au_campsegm_tenant_id', 'au_campaign_id' => 'au_campsegm_au_campaign_id'],
            ]
        ]
    ];
    public $loc = [
        'NF.Form.ContactsNotFound' => 'Contacts not found!',
        'NF.Form.ContactIDMissingPhone' => 'Contact {name} does not have phone!',
        'NF.Form.ContactIDMissingEmail' => 'Contact {name} does not have email!',
        'NF.Form.ContactIDMissingWhatsAppNumber' => 'Contact {name} does not have WhatsApp number!',
    ];

    public function validate(\Object\Form\Base & $form)
    {
        // duplicate
        if (!empty($form->process_submit[$form::BUTTON_SUBMIT_DUPLICATE])) {
            if (!$form->hasErrors()) {
                $values = $form->values;
                $values['au_campaign_id'] = null;
                $values['au_campaign_code'] = Sequence::nextval('DEFAULT', 'CAM', 'AU', \Tenant::id(), true);
                $values['au_campaign_au_campstatus_code'] = 'DRAFT';
                $result = $form->collection_object->merge($values, [
                    'skip_optimistic_lock' => true,
                ]);
                $form->collection_object->primary_model->db_object->commit();
                $form->transaction = false;
                $form->redirect('/Numbers/Audiences/Audiences/Controller/Campaigns/_Edit', [
                    'au_campaign_id' => $result['new_serials']['au_campaign_id']
                ]);
                return;
            }
        }
        // send
        if (!empty($form->process_submit[$form::BUTTON_SUBMIT_SEND])) {
            if (!$form->hasErrors()) {
                // load ids
                $contact_ids = Segments::loadContactsByCampaignID($form->values['au_campaign_id']);
                if (empty($contact_ids)) {
                    $form->error(DANGER, loc('NF.Form.ContactsNotFound', 'Contacts not found!'));
                    return;
                }
                // load all contacts in one go
                $contacts = Contacts::getStatic([
                    'where' => [
                        'au_contact_tenant_id' => \Tenant::id(),
                        'au_contact_id' => $contact_ids,
                    ],
                ]);
                $campaign_contacts = [];
                foreach ($contacts['data'] as $k => $v) {
                    switch ($form->values['au_campaign_au_camptype_code']) {
                        case 'SMS':
                            // check if contact have phone number
                            $phone = $v['au_contact_phone'] ?? $v['au_contact_phone2'] ?? $v['au_contact_cell'];
                            if (empty($phone)) {
                                $form->error(DANGER, loc('NF.Form.ContactIDMissingPhone', 'Contact {name} does not have phone!', [
                                    'name' => $v['au_contact_name'],
                                ]));
                                break;
                            }
                            // if contact opted in or inactive
                            if (empty($v['au_contact_send_sms']) || !empty($v['au_contact_inactive'])) {
                                break;
                            }
                            $campaign_contacts[$v['au_contact_id']] = [
                                'au_campcont_au_campaign_id' => $form->values['au_campaign_id'],
                                'au_campcont_au_contact_id' => $v['au_contact_id'],
                                'au_campcont_au_camptype_code' => 'SMS',
                                'au_campcont_au_campstatus_code' => 'SCHEDULED',
                                'au_campcont_name' => $v['au_contact_name'],
                                'au_campcont_phone' => Phone::plainNumber($phone),
                                'au_campcont_um_user_id' => $v['au_contact_um_user_id'],
                                'au_campcont_inactive' => 0,
                            ];
                            break;
                        case 'WHATSAPP':
                            // check if contact have phone number
                            $phone = $v['au_contact_whatsapp'];
                            if (empty($phone)) {
                                $form->error(DANGER, loc('NF.Form.ContactIDMissingWhatsAppNumber', 'Contact {name} does not have WhatsApp number!', [
                                    'name' => $v['au_contact_name'],
                                ]));
                                break;
                            }
                            // if contact opted in or inactive
                            if (empty($v['au_contact_send_whatsapp']) || !empty($v['au_contact_inactive'])) {
                                break;
                            }
                            $campaign_contacts[$v['au_contact_id']] = [
                                'au_campcont_au_campaign_id' => $form->values['au_campaign_id'],
                                'au_campcont_au_contact_id' => $v['au_contact_id'],
                                'au_campcont_au_camptype_code' => 'WHATSAPP',
                                'au_campcont_au_campstatus_code' => 'SCHEDULED',
                                'au_campcont_name' => $v['au_contact_name'],
                                'au_campcont_phone' => Phone::plainNumber($phone),
                                'au_campcont_um_user_id' => $v['au_contact_um_user_id'],
                                'au_campcont_inactive' => 0,
                            ];
                            break;
                        case 'EMAIL':
                            // check if contact have phone number
                            $email = $v['au_contact_email'] ?? $v['au_contact_email2'];
                            if (empty($email)) {
                                $form->error(DANGER, loc('NF.Form.ContactIDMissingEmail', 'Contact {name} does not have email!', [
                                    'name' => $v['au_contact_name'],
                                ]));
                                break;
                            }
                            // if contact opted in or inactive
                            if (empty($v['au_contact_send_emails']) || !empty($v['au_contact_inactive'])) {
                                break;
                            }
                            $campaign_contacts[$v['au_contact_id']] = [
                                'au_campcont_au_campaign_id' => $form->values['au_campaign_id'],
                                'au_campcont_au_contact_id' => $v['au_contact_id'],
                                'au_campcont_au_camptype_code' => 'EMAIL',
                                'au_campcont_au_campstatus_code' => 'SCHEDULED',
                                'au_campcont_name' => $v['au_contact_name'],
                                'au_campcont_email' => $email,
                                'au_campcont_um_user_id' => $v['au_contact_um_user_id'],
                                'au_campcont_inactive' => 0,
                            ];
                            break;
                        default:
                            throw new \Exception('Unknown type?');
                    }
                }
                // see if we have at least one contact
                if (empty($campaign_contacts)) {
                    $form->error(DANGER, loc('NF.Form.ContactsNotFound', 'Contacts not found!'));
                    return;
                }
                // save contacts to lock so you cannot delete
                $contacts_result = \Numbers\Audiences\Audiences\Model\Campaign\Contacts::collectionStatic()->mergeMultiple($campaign_contacts);
                if (!$contacts_result['success']) {
                    $form->error(DANGER, $contacts_result['error']);
                    return;
                }
                // set a scheduled
                $form->values['au_campaign_au_campstatus_code'] = 'SCHEDULED';
                $form->process_submit[$form::BUTTON_SUBMIT_SAVE] = true;
            }
        }
        // generate new sequence
        if (empty($form->values['au_campaign_code'])) {
            $form->values['au_campaign_code'] = Sequence::nextval('DEFAULT', 'CAM', 'AU', \Tenant::id(), true);
        }
    }

    public function renderStatistics(& $form)
    {
        if (empty($form->values['au_campaign_id'])) {
            return '';
        }
        // table
        $table = [];
        // load ids
        $contact_ids = Segments::loadContactsByCampaignID($form->values['au_campaign_id']);
        if (empty($contact_ids)) {
            return loc('NF.Form.ContactsNotFound', 'Contacts not found!');
        }
        // load all contacts in one go
        $contacts = Contacts::getStatic([
            'where' => [
                'au_contact_tenant_id' => \Tenant::id(),
                'au_contact_id' => $contact_ids,
            ],
        ]);
        // EMAIL
        if ($form->values['au_campaign_au_camptype_code'] == 'EMAIL') {
            $counter = 0;
            foreach ($contacts['data'] as $k => $v) {
                $email = $v['au_contact_email'] ?? $v['au_contact_email2'];
                if (empty($email)) {
                    continue;
                }
                if (empty($v['au_contact_send_emails']) || !empty($v['au_contact_inactive'])) {
                    continue;
                }
                $counter++;
                $table[] = [$counter, $v['au_contact_id'], $v['au_contact_name'], $email];
            }
        }
        // SMS
        if ($form->values['au_campaign_au_camptype_code'] == 'SMS') {
            $counter = 0;
            foreach ($contacts['data'] as $k => $v) {
                $phone = $v['au_contact_phone'] ?? $v['au_contact_phone2'] ?? $v['au_contact_cell'];
                if (empty($phone)) {
                    continue;
                }
                if (empty($v['au_contact_send_sms']) || !empty($v['au_contact_inactive'])) {
                    continue;
                }
                $counter++;
                $table[] = [$counter, $v['au_contact_id'], $v['au_contact_name'], $phone];
            }
        }
        // WHATSAPP
        if ($form->values['au_campaign_au_camptype_code'] == 'WHATSAPP') {
            $counter = 0;
            foreach ($contacts['data'] as $k => $v) {
                $phone = $v['au_contact_whatsapp'];
                if (empty($phone)) {
                    continue;
                }
                if (empty($v['au_contact_send_whatsapp']) || !empty($v['au_contact_inactive'])) {
                    continue;
                }
                $counter++;
                $table[] = [$counter, $v['au_contact_id'], $v['au_contact_name'], $phone];
            }
        }
        // generate table
        if (count($table) > 0) {
            $result = '<table class="table table-striped">';
            $result .= '<tr>';
            $result .= '<th width="1%">&nbsp;</th>';
            $result .= '<th width="1%">#</th>';
            $result .= '<th width="30%">Name</th>';
            $result .= '<th width="68%">Phone / Email</th>';
            $result .= '</tr>';
            foreach ($table as $v) {
                $result .= '<tr>';
                $result .= '<td align="right">' . \Format::id($v[0]) . '.</td>';
                $result .= '<td>' . \Format::id($v[1]) . '</td>';
                $result .= '<td>' . $v[2] . '</td>';
                $result .= '<td>' . $v[3] . '</td>';
                $result .= '</tr>';
            }
            $result .= '</table>';
            return $result;
        } else {
            return loc('NF.Form.ContactsNotFound', 'Contacts not found!');
        }
    }
}
