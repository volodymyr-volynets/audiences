<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Form\List2;

use Object\Form\Wrapper\List2;
use Numbers\Audiences\Audiences\Helper\Segments as HelperSegments;

class Contacts extends List2
{
    public $form_link = 'au_contacts_list';
    public $module_code = 'AU';
    public $title = 'A/U Contacts List';
    public $options = [
        'segment' => self::SEGMENT_LIST,
        'actions' => [
            'refresh' => true,
            'new' => true,
            'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fa-solid fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
        ]
    ];
    public $containers = [
        'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
        'filter' => ['default_row_type' => 'grid', 'order' => 1500],
        'sort' => self::LIST_SORT_CONTAINER,
        self::LIST_CONTAINER => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
    ];
    public $rows = [
        'tabs' => [
            'filter' => ['order' => 100, 'label_name' => 'Filter'],
            'sort' => ['order' => 200, 'label_name' => 'Sort'],
        ]
    ];
    public $elements = [
        'tabs' => [
            'filter' => [
                'filter' => ['container' => 'filter', 'order' => 100]
            ],
            'sort' => [
                'sort' => ['container' => 'sort', 'order' => 100]
            ]
        ],
        'filter' => [
            'au_contact_id' => [
                'au_contact_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Contact #', 'domain' => 'contact_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.au_contact_id;>='],
                'au_contact_id2' => ['order' => 2, 'label_name' => 'Contact #', 'domain' => 'contact_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.au_contact_id;<='],
                'au_contact_um_usrtype_id1' => ['order' => 3, 'label_name' => 'Type', 'domain' => 'type_id', 'percent' => 50, 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Users\Model\User\Types', 'query_builder' => 'a.au_contact_um_usrtype_id;='],
            ],
            'roles_filter' => [
                'au_contaud_au_audience_id1' => ['order' => 1, 'row_order' => 150, 'label_name' => 'Audiences', 'domain' => 'audience_id', 'percent' => 50, 'method' => 'multiselect', 'searchable' => true, 'multiple_column' => 1, 'options_model' => '\Numbers\Audiences\Audiences\Model\Audiences', 'subquery_builder' => ['model' => '\Numbers\Audiences\Audiences\Model\Contact\Audiences', 'alias' => 'inner_b2', 'column' => 'inner_b2.au_contaud_au_audience_id', 'on' => [['a.au_contact_id', '=', 'inner_b2.au_contaud_au_contact_id']]]],
                'um_usrorg_organization_id1' => ['order' => 2, 'label_name' => 'Organizations', 'domain' => 'organization_id', 'percent' => 50, 'method' => 'multiselect', 'searchable' => true, 'multiple_column' => 1, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGrouped', 'subquery_builder' => ['model' => '\Numbers\Audiences\Audiences\Model\Contact\Organizations', 'alias' => 'inner_a2', 'column' => 'inner_a2.au_contorg_on_organization_id', 'on' => [['a.au_contact_id', '=', 'inner_a2.au_contorg_au_contact_id']]]],
            ],
            'au_contact_hold1' => [
                'au_contact_hold1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 25, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.au_contact_hold;='],
                'au_contact_inactive1' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 25, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.au_contact_inactive;='],
                'au_contgrp_au_group_id1' => ['order' => 3, 'label_name' => 'Groups', 'domain' => 'group_id', 'percent' => 50, 'method' => 'multiselect', 'searchable' => true, 'multiple_column' => 1, 'options_model' => '\Numbers\Audiences\Audiences\Model\Groups', 'subquery_builder' => ['model' => '\Numbers\Audiences\Audiences\Model\Contact\Groups', 'alias' => 'inner_g2', 'column' => 'inner_g2.au_contgrp_au_group_id', 'on' => [['a.au_contact_id', '=', 'inner_g2.au_contgrp_au_contact_id']]]],
            ],
            'au_segment_id1' => [
                'au_segment_id1' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Segments', 'domain' => 'segment_id', 'null' => true, 'method' => 'multiselect', 'searchable' => true, 'multiple_column' => 1, 'options_model' => '\Numbers\Audiences\Audiences\Model\Segments'],
            ],
            'full_text_search' => [
                'full_text_search' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.au_contact_name', 'a.au_contact_code', 'a.au_contact_phone', 'a.au_contact_email', 'a.au_contact_company'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
            ]
        ],
        'sort' => [
            '__sort' => [
                '__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::LIST_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
                '__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
            ]
        ],
        self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
        self::LIST_CONTAINER => [
            'row1' => [
                'au_contact_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Contact #', 'domain' => 'contact_id', 'percent' => 10, 'url_edit' => true],
                'au_contact_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 45],
                'au_contact_code' => ['order' => 3, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 25],
                'au_contact_um_usrtype_id' => ['order' => 4, 'label_name' => 'Type', 'domain' => 'type_id', 'percent' => 15, 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
                'au_contact_inactive' => ['order' => 5, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ],
            'row2' => [
                'blank' => ['order' => 1, 'row_order' => 200, 'label_name' => null, 'domain' => 'name', 'null' => true, 'percent' => 10],
                'au_contact_company' => ['order' => 2, 'label_name' => 'Company', 'domain' => 'name', 'null' => true, 'percent' => 20],
                'au_contact_email' => ['order' => 3, 'label_name' => 'Email', 'domain' => 'email', 'null' => true, 'percent' => 25],
                'au_contact_phone' => ['order' => 4, 'label_name' => 'Phone', 'domain' => 'phone', 'null' => true, 'percent' => 25],
                'au_contact_ip' => ['order' => 5, 'label_name' => 'IP', 'domain' => 'ip', 'null' => true, 'percent' => 15],
                'au_contact_hold' => ['order' => 6, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 5],
            ],
            'row3' => [
                'blank' => ['order' => 1, 'row_order' => 300, 'label_name' => null, 'domain' => 'name', 'null' => true, 'percent' => 10],
                'au_contaud_au_audience_id' => ['order' => 2, 'label_name' => 'Audiences', 'domain' => 'audience_id', 'null' => true, 'percent' => 45, 'options_model' => '\Numbers\Audiences\Audiences\Model\Audiences', 'subquery' => ['model' => '\Numbers\Audiences\Audiences\Model\Contact\Audiences', 'alias' => 'inner_b', 'groupby' => 'au_contaud_au_contact_id', 'on' => [['a.au_contact_id', '=', 'inner_b.au_contaud_au_contact_id']]]],
                'au_contorg_on_organization_id' => ['order' => 3, 'label_name' => 'Organizations', 'domain' => 'organization_id', 'null' => true, 'percent' => 45, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations', 'subquery' => ['model' => '\Numbers\Audiences\Audiences\Model\Contact\Organizations', 'alias' => 'inner_a', 'groupby' => 'au_contorg_au_contact_id', 'on' => [['a.au_contact_id', '=', 'inner_a.au_contorg_au_contact_id']]]],
            ]
        ]
    ];
    public $query_primary_model = '\Numbers\Audiences\Audiences\Model\Contacts';
    public $query_primary_parameters = [];
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 30,
        'default_sort' => [
            'au_contact_id' => SORT_ASC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'au_contact_id' => ['name' => 'Contact #'],
        'au_contact_name' => ['name' => 'Name'],
        'au_contact_email' => ['name' => 'Email'],
        'au_contact_phone' => ['name' => 'Phone'],
        'au_contact_company' => ['name' => 'Company']
    ];

    public function listQuery(& $form)
    {
        if (!empty($form->values['au_segment_id1'])) {
            foreach ($form->values['au_segment_id1'] as $v) {
                $sql = HelperSegments::convertSegmentToSQL($v, [
                    'columns' => ['au_contact_id'],
                ]);
                $form->query->where('AND', ['a.au_contact_id', 'IN', '(' . $sql . ')', true]);
            }
        }
    }
}
