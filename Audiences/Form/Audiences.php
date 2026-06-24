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

class Audiences extends Base
{
    public $form_link = 'au_audiences';
    public $module_code = 'AU';
    public $title = 'A/U Audiences Form';
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
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'organizations_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Audiences\Audiences\Model\Audience\Organizations',
            'details_pk' => ['au_audorg_on_organization_id'],
            'required' => true,
            'order' => 35000
        ],
        'groups_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Audiences\Audiences\Model\Audience\Groups',
            'details_pk' => ['au_audgrp_au_group_id'],
            'order' => 35000
        ],
    ];
    public $rows = [
        'tabs' => [
            'organizations' => ['order' => 150, 'label_name' => 'Organizations'],
            'groups' => ['order' => 300, 'label_name' => 'Groups'],
        ]
    ];
    public $elements = [
        'top' => [
            'au_audience_id' => [
                'au_audience_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Audience #', 'domain' => 'audience_id_sequence', 'percent' => 50, 'navigation' => true],
                'au_audience_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 45, 'required' => 'c', 'navigation' => true],
                'au_audience_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'au_audience_name' => [
                'au_audience_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'percent' => 50, 'required' => true],
                'au_audience_in_group_id' => ['order' => 2, 'label_name' => 'I/N Group #', 'domain' => 'group_id', 'null' => true, 'percent' => 50, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Groups::optionsActive'],
            ],
        ],
        'tabs' => [
            'organizations' => [
                'organizations' => ['container' => 'organizations_container', 'order' => 100],
            ],
            'groups' => [
                'groups' => ['container' => 'groups_container', 'order' => 100],
            ],
        ],
        'organizations_container' => [
            'row1' => [
                'au_audorg_on_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
                'au_audorg_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 15],
                'au_audorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'groups_container' => [
            'row1' => [
                'au_audgrp_au_group_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Audiences\Audiences\Model\Groups::optionsActive', 'onchange' => 'this.form.submit();'],
                'au_audgrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'AU Audiences',
        'model' => '\Numbers\Audiences\Audiences\Model\Audiences',
        'details' => [
            '\Numbers\Audiences\Audiences\Model\Audience\Organizations' => [
                'name' => 'AU Audience Organizations',
                'pk' => ['au_audorg_tenant_id', 'au_audorg_au_audience_id', 'au_audorg_on_organization_id'],
                'type' => '1M',
                'map' => ['au_audience_tenant_id' => 'au_audorg_tenant_id', 'au_audience_id' => 'au_audorg_au_audience_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Audience\Groups' => [
                'name' => 'AU Audience Groups',
                'pk' => ['au_audgrp_tenant_id', 'au_audgrp_au_audience_id', 'au_audgrp_au_group_id'],
                'type' => '1M',
                'map' => ['au_audience_tenant_id' => 'au_audgrp_tenant_id', 'au_audience_id' => 'au_audgrp_au_audience_id'],
            ],
        ]
    ];

    public function validate(& $form)
    {
        // primary organizations
        $primary_organization_id = $form->validateDetailsPrimaryColumn(
            '\Numbers\Audiences\Audiences\Model\Audience\Organizations',
            'au_audorg_primary',
            'au_audorg_inactive',
            'au_audorg_on_organization_id'
        );
        // generate new sequence
        if (empty($form->values['au_audience_code'])) {
            $form->values['au_audience_code'] = Sequence::nextval('DEFAULT', 'AUD', 'AU', \Tenant::id(), true);
        }
    }
}
