<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Form\List2\Widgets;

use Object\Form\Wrapper\List2;
use Numbers\Audiences\Audiences\Model\Campaign\Contacts;
use Numbers\Users\Users\Model\Message\Bodies;

class ContactMessages extends List2
{
    public $form_link = 'wg_contact_messages';
    public $module_code = 'AU';
    public $title = 'A/U Contact Messages List';
    public $options = [
        'segment' => null,
        'actions' => [
            'refresh' => true,
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
            'apis' => [
                'au_campcont_au_camptype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'group_code', 'null' => true, 'method' => 'select', 'multiple_column' => 1, 'options_model' => '\Numbers\Audiences\Audiences\Model\Campaign\CampaignTypes'],
            ],
            /*
            'full_text_search' => [
                'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.wg_comment_value'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
            ]
            */
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
                'au_campcont_au_campaign_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Campaign #', 'domain' => 'campaign_id', 'percent' => 15],
                'au_campcont_au_camptype_code' => ['order' => 2, 'label_name' => 'Type', 'domain' => 'group_code', 'percent' => 15, 'options_model' => '\Numbers\Audiences\Audiences\Model\Campaign\CampaignTypes'],
                'au_campcont_au_campstatus_code' => ['order' => 3, 'label_name' => 'Status', 'domain' => 'status_code', 'percent' => 15, 'options_model' => '\Numbers\Audiences\Audiences\Model\Campaign\CampaignStatuses'],
                'au_campcont_sender_phone' => ['order' => 4, 'label_name' => 'Sender', 'type' => 'text', 'null' => true, 'percent' => 30, 'custom_renderer' => 'self::renderSender'],
                'au_campcont_phone' => ['order' => 5, 'label_name' => 'To', 'type' => 'text', 'null' => true, 'percent' => 25, 'custom_renderer' => 'self::renderTo'],
            ],
            'row2' => [
                '__blank' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'type' => 'text', 'percent' => 15],
                'um_mesbody_body' => ['order' => 2, 'label_name' => 'Message / Content', 'type' => 'text', 'null' => true, 'percent' => 85, 'custom_renderer' => 'self::renderContactMessage'],
            ]
        ]
    ];
    public $query_primary_model;
    public $list_options = [
        'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
        'default_limit' => 10,
        'default_sort' => [
            'au_campcont_inserted_timestamp' => SORT_DESC
        ]
    ];
    public const LIST_SORT_OPTIONS = [
        'au_campcont_inserted_timestamp' => ['name' => 'Inserted'],
    ];

    public function overrideFieldValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        // hide module #
        if (in_array($options['options']['field_name'], ['__module_id', '__separator__module_id', '__format'])) {
            $options['options']['row_class'] = 'grid_row_hidden';
            return;
        }
    }

    public function listQuery(& $form)
    {
        $result = [
            'success' => false,
            'error' => [],
            'total' => 0,
            'rows' => []
        ];
        $form->query = Contacts::queryBuilderStatic(['alias' => 'a'])->select();
        $form->processReportQueryFilter($form->query);
        $form->query->where('AND', ['a.au_campcont_au_contact_id', '=', (int) $form->options['input']['au_contact_id']]);
        if (!empty($form->values['au_campcont_au_camptype_code'])) {
            $form->query->where('AND', ['a.au_campcont_au_camptype_code', '=', $form->values['au_campcont_au_camptype_code']]);
        }
        // join on message
        $form->query->join('LEFT', new Bodies(), 'am', 'ON', [
            ['AND', ['a.au_campcont_um_mesbody_id', '=', 'am.um_mesbody_id', true], false]
        ]);
        // query #1 get counter
        $counter_query = clone $form->query;
        $counter_query->columns(['counter' => 'COUNT(*)'], ['empty_existing' => true]);
        $temp = $counter_query->query();
        if (!$temp['success']) {
            array_merge3($result['error'], $temp['error']);
            return $result;
        }
        $result['total'] = $temp['rows'][0]['counter'];
        // query #2 get rows
        $form->processListQueryOrderBy();
        $form->query->offset($form->values['__offset'] ?? 0);
        $form->query->limit($form->values['__limit']);
        $temp = $form->query->query();
        if (!$temp['success']) {
            array_merge3($result['error'], $temp['error']);
            return $result;
        }
        $result['rows'] = & $temp['rows'];
        $result['success'] = true;
        return $result;
    }

    public static function renderSender(& $form, & $options, & $value, & $neighbouring_values)
    {
        return $neighbouring_values['au_campcont_sender_phone'] ?? $neighbouring_values['au_campcont_sender_email'] ?? '';
    }

    public static function renderTo(& $form, & $options, & $value, & $neighbouring_values)
    {
        return $neighbouring_values['au_campcont_phone'] ?? $neighbouring_values['au_campcont_email'] ?? '';
    }

    public function renderContactMessage(& $form, & $options, & $value, & $neighbouring_values)
    {
        $crypt = new \Crypt();
        $subject = '';
        if (!empty($neighbouring_values['au_campcont_subject'])) {
            $subject = 'Subject: ' . $neighbouring_values['au_campcont_subject'] . ($neighbouring_values['au_campcont_important'] ? ' [Important] ' : '') . '<hr/>';
        }
        return $subject . \HTML::iframe([
            'src' => \Request::host() . 'Numbers/Users/Users/Controller/Account/Messages/_ViewBody?token=' . $crypt->tokenCreate($neighbouring_values['au_campcont_um_mesbody_id'], 'message.body'),
            'width' => '100%',
            'height' => '100%',
            'border' => 0,
            'style' => 'height: 700px;'
        ]);
    }
}
