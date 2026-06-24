<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Segment;

use Object\Table;

class Details extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Segment Details';
    public $name = 'au_segment_details';
    public $pk = ['au_segdetail_tenant_id', 'au_segdetail_au_segment_id', 'au_segdetail_id'];
    public $tenant = true;
    public $orderby = [
        'au_segdetail_order' => SORT_ASC,
    ];
    public $limit;
    public $column_prefix = 'au_segdetail_';
    public $columns = [
        'au_segdetail_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_segdetail_au_segment_id' => ['name' => 'Segment #', 'domain' => 'segment_id'],
        'au_segdetail_id' => ['name' => 'Detail #', 'domain' => 'detail_id'],
        'au_segdetail_operator' => ['name' => 'Operator', 'domain' => 'code', 'options_model' => '\Numbers\Audiences\Audiences\Model\Segment\Operators'],
        'au_segdetail_field' => ['name' => 'Field', 'domain' => 'code'],
        'au_segdetail_sm_sharetype_code' => ['name' => 'Field Type', 'domain' => 'type_code', 'null' => true],
        'au_segdetail_group' => ['name' => 'Group', 'domain' => 'code', 'null' => true],
        'au_segdetail_options_value_id' => ['name' => 'Options Value #', 'domain' => 'big_id', 'null' => true],
        'au_segdetail_options_value_code' => ['name' => 'Options Value Code', 'type' => 'text', 'null' => true],
        'au_segdetail_range_value_id1' => ['name' => 'Range Value 1', 'domain' => 'big_id', 'null' => true],
        'au_segdetail_range_value_id2' => ['name' => 'Range Value 2', 'domain' => 'big_id', 'null' => true],
        'au_segdetail_order' => ['name' => 'Order', 'domain' => 'order'],
        'au_segdetail_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'au_segment_details_pk' => ['type' => 'pk', 'columns' => ['au_segdetail_tenant_id', 'au_segdetail_au_segment_id', 'au_segdetail_id']],
        'au_segdetail_group_um' => ['type' => 'unique', 'columns' => ['au_segdetail_tenant_id', 'au_segdetail_au_segment_id', 'au_segdetail_group']],
        'au_segdetail_au_segment_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_segdetail_tenant_id', 'au_segdetail_au_segment_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Segments',
            'foreign_columns' => ['au_segment_tenant_id', 'au_segment_id']
        ]
    ];
    public $history = false;
    public $audit = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
