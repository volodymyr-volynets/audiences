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
use Numbers\Backend\Db\Common\Model\Shareable\Fields;
use Numbers\Audiences\Audiences\Helper\Segments as HelperSegments;

class Segments extends Base
{
    public $form_link = 'au_segments';
    public $module_code = 'AU';
    public $title = 'A/U Segments Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'back' => true,
            'new' => true,
            'import' => true
        ],
        //'no_ajax_form_reload' => true,
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        'details_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Audiences\Audiences\Model\Segment\Details',
            'details_pk' => ['au_segdetail_id'],
            'details_autoincrement' => ['au_segdetail_id'],
            'order' => 35000
        ],
        'groups_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Audiences\Audiences\Model\Segment\Groups',
            'details_pk' => ['au_seggrp_au_group_id'],
            'order' => 35000
        ],
    ];
    public $rows = [
        'tabs' => [
            'details' => ['order' => 100, 'label_name' => 'Details'],
            'groups' => ['order' => 150, 'label_name' => 'Groups'],
            'statistics' => ['order' => 200, 'label_name' => 'Statistics'],
            'sql' => ['order' => 300, 'label_name' => 'SQL'],
        ]
    ];
    public $elements = [
        'top' => [
            'au_segment_id' => [
                'au_segment_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Segment #', 'domain' => 'segment_id_sequence', 'percent' => 50, 'navigation' => true],
                'au_segment_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'required' => 'c', 'percent' => 45, 'navigation' => true],
                'au_segment_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'au_segment_name' => [
                'au_segment_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ],
        ],
        'tabs' => [
            'details' => [
                'details' => ['container' => 'details_container', 'order' => 100],
            ],
            'groups' => [
                'groups' => ['container' => 'groups_container', 'order' => 100],
            ],
            'statistics' => [
                'statistics' => ['container' => 'statistics_container', 'order' => 100],
            ],
            'sql' => [
                'sql' => ['container' => 'sql_container', 'order' => 100],
            ]
        ],
        'details_container' => [
            'row1' => [
                'au_segdetail_operator' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Operator', 'domain' => 'code', 'null' => true, 'default' => 'AND', 'required' => true, 'percent' => 15, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Numbers\Audiences\Audiences\Model\Segment\Operators', 'onchange' => 'this.form.submit();'],
                'au_segdetail_field' => ['order' => 2, 'label_name' => 'Field', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 60, 'method' => 'select', 'tree' => true, 'searchable' => true, 'options_model' => '\Numbers\Backend\Db\Common\Model\Shareable\Fields::optionsGrouped', 'options_params' => ['sm_sharefield_sm_sharegrp_code' => ['AU::FIELDS', 'AU::GROUPS']], 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'au_segdetail_group' => ['order' => 3, 'label_name' => 'Group', 'domain' => 'code_az09', 'null' => true, 'required' => true, 'required_if_set' => ['au_segdetail_field' => '__au_group'], 'percent' => 15, 'placeholder' => 'XXXX-XXXX-XXXX'],
                'au_segdetail_order' => ['order' => 4, 'label_name' => 'Order', 'domain' => 'order', 'null' => true, 'required' => true, 'percent' => 10],
            ],
            'row2_all_fields' => [
                '__blank_row2_all_fields' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'type' => 'text', 'null' => true, 'percent' => 15, 'method' => 'hidden'],
                'au_segdetail_sm_sharetype_code' => ['order' => 2, 'label_name' => 'Field Type', 'domain' => 'type_code', 'null' => true, 'default' => '', 'required' => true, 'percent' => 15, 'method' => 'select', 'options_model' => '\Numbers\Backend\Db\Common\Model\Shareable\Types::optionsFiltered', 'options_params' => ['sm_sharetype_actual_type' => 1], 'options_depends' => ['au_segdetail_field' => 'au_segdetail_field'], 'onchange' => 'this.form.submit();'],
                // OPTIONS
                '\Numbers\Audiences\Audiences\Model\Segment\Detail\ValuesIDs' => ['order' => 3, 'label_name' => ' ', 'domain' => 'big_id', 'null' => true, 'multiple_column' => 'au_segdetvalids_value_id', 'required' => 'c', 'percent' => 70, 'method' => 'multiselect', 'tree' => true, 'searchable' => true, 'options_model' => ''],
                // OPTION
                'au_segdetail_options_value_id' => ['order' => 4, 'label_name' => ' ', 'domain' => 'big_id', 'null' => true, 'required' => 'c', 'percent' => 70, 'method' => 'select', 'tree' => true, 'searchable' => true, 'options_model' => ''],
                // RANGE
                'au_segdetail_range_value_id1' => ['order' => 5, 'label_name' => ' ', 'domain' => 'big_id', 'null' => true, 'required' => 'c', 'percent' => 35],
                'au_segdetail_range_value_id2' => ['order' => 6, 'label_name' => ' ', 'domain' => 'big_id', 'null' => true, 'required' => 'c', 'percent' => 35],
                // CODE
                'au_segdetail_options_value_code' => ['order' => 7, 'label_name' => ' ', 'type' => 'text', 'null' => true, 'required' => 'c', 'percent' => 70, 'method' => 'input'],
            ],
            self::HIDDEN => [
                'au_segdetail_id' => ['label_name' => 'Detail #', 'domain' => 'detail_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'groups_container' => [
            'row1' => [
                'au_seggrp_au_group_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Group', 'domain' => 'group_id', 'required' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Audiences\Audiences\Model\Groups::optionsActive', 'onchange' => 'this.form.submit();'],
                'au_seggrp_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'sql_container' => [
            'sql' => [
                'sql' => ['order' => 1, 'row_order' => 100, 'label_name' => '', 'type' => 'text', 'null' => true, 'custom_renderer' => 'self::renderSQL'],
            ]
        ],
        'statistics_container' => [
            'statistics' => [
                'statistics' => ['order' => 1, 'row_order' => 100, 'label_name' => '', 'type' => 'text', 'null' => true, 'custom_renderer' => 'self::renderStatistics'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'AU Segments',
        'model' => '\Numbers\Audiences\Audiences\Model\Segments',
        'details' => [
            '\Numbers\Audiences\Audiences\Model\Segment\Groups' => [
                'name' => 'AU Segment Groups',
                'pk' => ['au_seggrp_tenant_id', 'au_seggrp_au_segment_id', 'au_seggrp_au_group_id'],
                'type' => '1M',
                'map' => ['au_segment_tenant_id' => 'au_seggrp_tenant_id', 'au_segment_id' => 'au_seggrp_au_segment_id'],
            ],
            '\Numbers\Audiences\Audiences\Model\Segment\Details' => [
                'name' => 'AU Segment Details',
                'pk' => ['au_segdetail_tenant_id', 'au_segdetail_au_segment_id', 'au_segdetail_id'],
                'type' => '1M',
                'map' => ['au_segment_tenant_id' => 'au_segdetail_tenant_id', 'au_segment_id' => 'au_segdetail_au_segment_id'],
                'details' => [
                    '\Numbers\Audiences\Audiences\Model\Segment\Detail\ValuesIDs' => [
                        'name' => 'AU Segment Detail Values IDs',
                        'pk' => ['au_segdetvalids_tenant_id', 'au_segdetvalids_au_segment_id', 'au_segdetvalids_au_segdetail_id', 'au_segdetvalids_value_id'],
                        'type' => '1M',
                        'map' => ['au_segdetail_tenant_id' => 'au_segdetvalids_tenant_id', 'au_segdetail_au_segment_id' => 'au_segdetvalids_au_segment_id', 'au_segdetail_id' => 'au_segdetvalids_au_segdetail_id'],
                    ]
                ]
            ]
        ]
    ];

    public $loc = [
        'NF.Form.GroupMustBeWIthinAGroup' => 'Group must be within a group!',
        'NF.Form.OrderMustBeGreaterThenParent' => 'Order must be greater then parent\'s order!',
        'NF.Form.GroupIsEmpty' => 'Group is empty!',
    ];

    protected $temp_models = null;

    protected function preloadTempModels()
    {
        // preload models
        if (!isset($this->temp_models)) {
            $this->temp_models = Fields::getStatic([
                'where' => [
                    'sm_sharefield_module_code' => ['AU', 'SM']
                ],
                'pk' => ['sm_sharefield_code'],
            ]);
        }
    }

    public function validate(\Object\Form\Base & $form)
    {
        $this->preloadTempModels();
        // sort details
        array_key_sort($form->values['\Numbers\Audiences\Audiences\Model\Segment\Details'], ['au_segdetail_order' => SORT_ASC]);
        // process groups
        $groups = [];
        $empty_groups = [];
        // 1st round to gather groups
        foreach ($form->values['\Numbers\Audiences\Audiences\Model\Segment\Details'] as $k => $v) {
            if ($v['au_segdetail_field'] == '__au_group') {
                // if we have group within a group
                if (strpos($v['au_segdetail_group'] ?? '', '-') !== false) {
                    $all_group_key = $group_key = explode('-', $v['au_segdetail_group']);
                    unset($group_key[array_key_last($group_key)]);
                    $parent_key_exists = array_key_get($groups, $group_key);
                    if (!isset($parent_key_exists)) {
                        $form->error(DANGER, ['NF.Form.GroupMustBeWIthinAGroup' => 'Group must be within a group!'], "\Numbers\Audiences\Audiences\Model\Segment\Details[{$k}][au_segdetail_group]");
                    } elseif ($parent_key_exists['__order'] >= $v['au_segdetail_order']) {
                        $form->error(DANGER, ['NF.Form.OrderMustBeGreaterThenParent' => 'Order must be greater then parent\'s order!',], "\Numbers\Audiences\Audiences\Model\Segment\Details[{$k}][au_segdetail_order]");
                    } else {
                        array_key_set($groups, $all_group_key, [
                            '__order' => $v['au_segdetail_order']
                        ]);
                        $empty_groups[implode('-', $all_group_key)] = $k;
                        unset($empty_groups[implode('-', $group_key)]);
                    }
                } else {
                    $groups[$v['au_segdetail_group']] = [
                        '__order' => $v['au_segdetail_order']
                    ];
                    $empty_groups[$v['au_segdetail_group']] = $k;
                }
            }
        }
        // 2nd round to gather nodes
        foreach ($form->values['\Numbers\Audiences\Audiences\Model\Segment\Details'] as $k => $v) {
            if ($v['au_segdetail_field'] != '__au_group') {
                $all_group_key = $group_key = explode('-', $v['au_segdetail_group']);
                unset($group_key[array_key_last($group_key)]);
                $parent_key_exists = array_key_get($groups, $group_key);
                if (!isset($parent_key_exists)) {
                    $form->error(DANGER, ['NF.Form.GroupMustBeWIthinAGroup' => 'Group must be within a group!'], "\Numbers\Audiences\Audiences\Model\Segment\Details[{$k}][au_segdetail_group]");
                } elseif ($parent_key_exists['__order'] >= $v['au_segdetail_order']) {
                    $form->error(DANGER, ['NF.Form.OrderMustBeGreaterThenParent' => 'Order must be greater then parent\'s order!',], "\Numbers\Audiences\Audiences\Model\Segment\Details[{$k}][au_segdetail_order]");
                } else {
                    array_key_set($groups, $all_group_key, [
                        '__order' => $v['au_segdetail_order'],
                        '__is_node' => true,
                    ]);
                    unset($empty_groups[implode('-', $group_key)]);
                }
            }
        }
        // if we have empty groups
        if (count($empty_groups) > 0) {
            foreach ($empty_groups as $k => $v) {
                $form->error(DANGER, ['NF.Form.GroupIsEmpty' => 'Group is empty!'], "\Numbers\Audiences\Audiences\Model\Segment\Details[{$v}][au_segdetail_field]");
            }
        }
        // validate fields
        foreach ($form->values['\Numbers\Audiences\Audiences\Model\Segment\Details'] as $k => $v) {
            $field = $this->temp_models[$v['au_segdetail_field'] ?? ''] ?? false;
            if (!$field || $v['au_segdetail_field'] == '__au_group') {
                continue;
            }
            if ($v['au_segdetail_sm_sharetype_code'] == 'OPTION') {
                $form->validateQuickRequired(['\Numbers\Audiences\Audiences\Model\Segment\Details', $k, 'au_segdetail_options_value_id']);
            } elseif ($v['au_segdetail_sm_sharetype_code'] == 'OPTIONS') {
                $form->validateQuickRequired(['\Numbers\Audiences\Audiences\Model\Segment\Details', $k, '\Numbers\Audiences\Audiences\Model\Segment\Detail\ValuesIDs']);
            } elseif ($v['au_segdetail_sm_sharetype_code'] == 'RANGE') {
                $form->validateQuickRequired(['\Numbers\Audiences\Audiences\Model\Segment\Details', $k, 'au_segdetail_range_value_id1']);
                $form->validateQuickRequired(['\Numbers\Audiences\Audiences\Model\Segment\Details', $k, 'au_segdetail_range_value_id2']);
            } elseif ($v['au_segdetail_sm_sharetype_code'] == 'CODE') {
                $form->validateQuickRequired(['\Numbers\Audiences\Audiences\Model\Segment\Details', $k, 'au_segdetail_options_value_code']);
            }
        }
        // generate new sequence
        if (empty($form->values['au_segment_code'])) {
            $form->values['au_segment_code'] = Sequence::nextval('DEFAULT', 'SEG', 'AU', \Tenant::id(), true);
        }
    }

    public function processDefaultValue(& $form, $key, $default, & $value, & $neighbouring_values, $changed_field = [], $options = [])
    {
        if ($key == 'au_segdetail_sm_sharetype_code' && !empty($neighbouring_values['au_segdetail_field'])) {
            $this->preloadTempModels();
            if ($changed_field['detail'] == 'au_segdetail_field') {
                $neighbouring_values['au_segdetail_sm_sharetype_code'] = $value = $this->temp_models[$neighbouring_values['au_segdetail_field']]['sm_sharefield_type_code'];
            }
        }
    }

    public function overrideDetailValue(& $form, & $options, & $value, & $neighbouring_values)
    {
        $this->preloadTempModels();
        $field = $this->temp_models[$neighbouring_values['au_segdetail_field'] ?? ''] ?? false;
        // hide entire row
        if ($options['options']['field_name'] == 'au_segdetail_sm_sharetype_code') {
            if (!$field || $neighbouring_values['au_segdetail_field'] == '__au_group') {
                $options['options']['row_hidden'] = true;
            }
        }
        // options and option
        if (in_array($options['options']['field_name'], ['\Numbers\Audiences\Audiences\Model\Segment\Detail\ValuesIDs', 'au_segdetail_options_value_id'])) {
            if (!$field) {
                $options['options']['method'] = 'hidden';
                $options['options']['percent'] = -1;
            } elseif ($neighbouring_values['au_segdetail_sm_sharetype_code'] != 'OPTIONS' && $options['options']['field_name'] == '\Numbers\Audiences\Audiences\Model\Segment\Detail\ValuesIDs') {
                $options['options']['method'] = 'hidden';
                $options['options']['percent'] = -1;
            } elseif ($neighbouring_values['au_segdetail_sm_sharetype_code'] != 'OPTION' && $options['options']['field_name'] == 'au_segdetail_options_value_id') {
                $options['options']['method'] = 'hidden';
                $options['options']['percent'] = -1;
            } else {
                $options_model = $field['sm_sharefield_options_model_code'];
                if ($field['sm_sharefield_placeholder']) {
                    $options['options']['placeholder'] = \I18n::textToLoc('NF.Form', $field['sm_sharefield_placeholder'], [
                        'translate' => true,
                    ]);
                }
                if ($options_model) {
                    $options['options']['options_model'] = $options_model;
                    $options['options']['method'] = $options['options']['field_name'] == 'au_segdetail_options_value_id' ? 'select' : 'multiselect';
                    $options['options']['percent'] = 70;
                } else {
                    $options['options']['method'] = 'hidden';
                    $options['options']['percent'] = -1;
                }
            }
        }
        // range
        if (in_array($options['options']['field_name'], ['au_segdetail_range_value_id1', 'au_segdetail_range_value_id2'])) {
            if (!$field) {
                $options['options']['method'] = 'hidden';
                $options['options']['percent'] = -1;
            } elseif ($neighbouring_values['au_segdetail_sm_sharetype_code'] != 'RANGE') {
                $options['options']['method'] = 'hidden';
                $options['options']['percent'] = -1;
            } else {
                $placeholder = \I18n::textToLoc('NF.Form', $field['sm_sharefield_placeholder'], [
                    'translate' => true,
                ]);
                $options['options']['placeholder'] = ($options['options']['field_name'] == 'au_segdetail_range_value_id1' ? loc('NF.Form.Minimum', 'Minimum') : loc('NF.Form.Maximum', 'Maximum')) . ' ' . $placeholder;
                $options['options']['method'] = 'input';
                $options['options']['percent'] = 35;
            }
        }
        // code
        if ($options['options']['field_name'] == 'au_segdetail_options_value_code') {
            if (!$field) {
                $options['options']['method'] = 'hidden';
                $options['options']['percent'] = -1;
            } elseif ($neighbouring_values['au_segdetail_sm_sharetype_code'] != 'CODE') {
                $options['options']['method'] = 'hidden';
                $options['options']['percent'] = -1;
            } else {
                $placeholder = \I18n::textToLoc('NF.Form', $field['sm_sharefield_placeholder'], [
                    'translate' => true,
                ]);
                $options['options']['placeholder'] = $placeholder;
                $options['options']['method'] = 'input';
                $options['options']['percent'] = 70;
            }
        }
    }

    public function renderSQL(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($form->hasErrors()) {
            return;
        }
        $sql = HelperSegments::convertSegmentToSQL(null, [
            'data' => $form->values,
        ]);
        return print_r2($sql, '', true);
    }

    public function renderStatistics(& $form, & $options, & $value, & $neighbouring_values)
    {
        if ($form->hasErrors()) {
            return;
        }
        $sql = HelperSegments::convertSegmentToSQL(null, [
            'data' => $form->values,
        ]);
        $model = new \Numbers\Audiences\Audiences\Model\Segments();
        $rows_result = $model->db_object->query(<<<TTT
            SELECT
                COUNT(*) AS "Total Rows",
                COUNT(DISTINCT au_contact_email) AS "Distinct Emails",
                COUNT(DISTINCT au_contact_phone) AS "Distinct Phone Numbers"
            FROM (
                $sql
            ) a
TTT);
        $rows_data = [
            'header' => ['number' => '#', 'name' => 'Name', 'total' => 'Total'],
            'options' => []
        ];
        $index = 1;
        foreach ($rows_result['rows'][0] as $k => $v) {
            $rows_data['options'][] = ['number' => $index . '.', 'name' => $k, 'total' => $v];
            $index++;
        }
        $result = \HTML::table($rows_data);
        return $result;
    }
}
