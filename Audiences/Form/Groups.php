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

class Groups extends Base
{
    public $form_link = 'au_groups';
    public $module_code = 'AU';
    public $title = 'A/U Groups Form';
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
            'au_group_id' => [
                'au_group_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group #', 'domain' => 'group_id_sequence', 'percent' => 50, 'navigation' => true],
                'au_group_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => 'c', 'percent' => 45, 'navigation' => true],
                'au_group_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'au_group_name' => [
                'au_group_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
            'au_group_organization_id' => [
                'au_group_organization_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive'],
                'au_group_um_usrgrp_id' => ['order' => 2, 'label_name' => 'U/M Group #', 'domain' => 'group_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Users\Model\User\Groups::optionsActive'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'AU Groups',
        'model' => '\Numbers\Audiences\Audiences\Model\Groups'
    ];

    public function validate(& $form)
    {
        // generate new sequence
        if (empty($form->values['au_group_code'])) {
            $form->values['au_group_code'] = Sequence::nextval('DEFAULT', 'GRP', 'AU', \Tenant::id(), true);
        }
    }
}
