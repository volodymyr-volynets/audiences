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

class Senders extends Base
{
    public $form_link = 'au_senders';
    public $module_code = 'AU';
    public $title = 'A/U Senders Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true,
            'import' => true
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'top' => [
            'au_sender_id' => [
                'au_sender_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sender #', 'domain' => 'sender_id_sequence', 'percent' => 50, 'navigation' => true],
                'au_sender_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => 'c', 'percent' => 45, 'navigation' => true],
                'au_sender_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'au_sender_name' => [
                'au_sender_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
            'au_sender_au_camptype_code' => [
                'au_sender_au_camptype_code' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Audiences\Audiences\Model\Campaign\CampaignTypes', 'onchange' => 'this.form.submit();'],
                'au_sender_verified' => ['order' => 2, 'label_name' => 'Verified', 'type' => 'boolean', 'percent' => 50],
            ],
            'au_sender_sm_mailprofile_id' => [
                'au_sender_sm_mailprofile_id' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Mail Profile #', 'domain' => 'profile_id', 'null' => true, 'required' => 'c', 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Backend\Mail\Common\Model\Profiles::optionsActive', 'onchange' => 'this.form.submit();'],
                'au_sender_sm_mailprosndr_id' => ['order' => 2, 'label_name' => 'Mail Detail #', 'domain' => 'detail_id', 'null' => true, 'required' => 'c', 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\Mail\Common\Model\Profile\Senders::optionsActive', 'options_depends' => ['sm_mailprosndr_sm_mailprofile_id' => 'au_sender_sm_mailprofile_id'], 'onchange' => 'this.form.submit();'],
                'au_sender_email' => ['order' => 3, 'label_name' => 'Email', 'domain' => 'email', 'null' => true, 'required' => 'c', 'percent' => 25, 'readonly' => true],
            ],
            'au_sender_sm_smsprofile_id' => [
                'au_sender_sm_smsprofile_id' => ['order' => 1, 'row_order' => 500, 'label_name' => 'SMS Profile #', 'domain' => 'profile_id', 'null' => true, 'required' => 'c', 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Backend\SMS\Common\Model\Profiles::optionsActive', 'onchange' => 'this.form.submit();'],
                'au_sender_sm_smsprosndr_id' => ['order' => 2, 'label_name' => 'SMS Detail #', 'domain' => 'detail_id', 'null' => true, 'required' => 'c', 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Backend\SMS\Common\Model\Profile\Senders::optionsActive', 'options_depends' => ['sm_smsprosndr_sm_smsprofile_id' => 'au_sender_sm_smsprofile_id'], 'onchange' => 'this.form.submit();'],
                'au_sender_phone' => ['order' => 3, 'label_name' => 'Phone', 'domain' => 'phone', 'null' => true, 'required' => 'c', 'percent' => 25, 'readonly' => true],
            ],
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'AU Senders',
        'model' => '\Numbers\Audiences\Audiences\Model\Senders'
    ];

    public function validate(\Object\Form\Base & $form)
    {
        if ($form->values['au_sender_au_camptype_code'] == 'EMAIL') {
            // preload phone number
            if (!empty($form->values['au_sender_sm_mailprosndr_id'])) {
                $sender = \Numbers\Backend\Mail\Common\Model\Profile\Senders::getSingleStatic([
                    'where' => [
                        'sm_mailprosndr_tenant_id' => \Tenant::id(),
                        'sm_mailprosndr_sm_mailprofile_id' => $form->values['au_sender_sm_mailprofile_id'],
                        'sm_mailprosndr_id' => $form->values['au_sender_sm_mailprosndr_id'],
                    ]
                ]);
                $form->values['au_sender_email'] = $sender['sm_mailprosndr_email'];
            }
            $form->validateQuickRequired('au_sender_sm_mailprofile_id');
            $form->validateQuickRequired('au_sender_sm_mailprosndr_id');
            $form->validateQuickRequired('au_sender_email');
        } elseif ($form->values['au_sender_au_camptype_code'] == 'SMS' || $form->values['au_sender_au_camptype_code'] == 'WHATSAPP') {
            // preload phone number
            if (!empty($form->values['au_sender_sm_smsprosndr_id'])) {
                $sender = \Numbers\Backend\SMS\Common\Model\Profile\Senders::getSingleStatic([
                    'where' => [
                        'sm_smsprosndr_tenant_id' => \Tenant::id(),
                        'sm_smsprosndr_sm_smsprofile_id' => $form->values['au_sender_sm_smsprofile_id'],
                        'sm_smsprosndr_id' => $form->values['au_sender_sm_smsprosndr_id'],
                    ]
                ]);
                $form->values['au_sender_phone'] = $sender['sm_smsprosndr_phone'];
            }
            $form->validateQuickRequired('au_sender_sm_smsprofile_id');
            $form->validateQuickRequired('au_sender_sm_smsprosndr_id');
            $form->validateQuickRequired('au_sender_phone');
        }
        // generate new sequence
        if (empty($form->values['au_sender_code'])) {
            $form->values['au_sender_code'] = Sequence::nextval('DEFAULT', 'SEN', 'AU', \Tenant::id(), true);
        }
    }

    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($options['options']['field_name'] == 'au_sender_sm_mailprofile_id') {
            if ($form->values['au_sender_au_camptype_code'] != 'EMAIL') {
                $options['options']['row_hidden'] = true;
                $value = null;
            }
        }
        if ($options['options']['field_name'] == 'au_sender_sm_smsprofile_id') {
            if ($form->values['au_sender_au_camptype_code'] == 'EMAIL') {
                $options['options']['row_hidden'] = true;
                $value = null;
            }
        }
    }
}
