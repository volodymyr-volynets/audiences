<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Segment\Detail;

use Object\Table;

class ValuesIDs extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Segment Detail Value IDs';
    public $name = 'au_segment_detail_value_ids';
    public $pk = ['au_segdetvalids_tenant_id', 'au_segdetvalids_au_segment_id', 'au_segdetvalids_au_segdetail_id', 'au_segdetvalids_value_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_segdetvalids_';
    public $columns = [
        'au_segdetvalids_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_segdetvalids_au_segment_id' => ['name' => 'Segment #', 'domain' => 'segment_id'],
        'au_segdetvalids_au_segdetail_id' => ['name' => 'Detail #', 'domain' => 'detail_id'],
        'au_segdetvalids_value_id' => ['name' => 'Value #', 'domain' => 'big_id'],
    ];
    public $constraints = [
        'au_segment_detail_value_ids_pk' => ['type' => 'pk', 'columns' => ['au_segdetvalids_tenant_id', 'au_segdetvalids_au_segment_id', 'au_segdetvalids_au_segdetail_id', 'au_segdetvalids_value_id']],
        'au_segdetvalids_au_segdetail_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_segdetvalids_tenant_id', 'au_segdetvalids_au_segment_id', 'au_segdetvalids_au_segdetail_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Segment\Details',
            'foreign_columns' => ['au_segdetail_tenant_id', 'au_segdetail_au_segment_id', 'au_segdetail_id']
        ],
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
