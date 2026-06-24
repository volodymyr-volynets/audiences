<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model;

use Object\Table;

class Segments extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Segments';
    public $name = 'au_segments';
    public $pk = ['au_segment_tenant_id', 'au_segment_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_segment_';
    public $columns = [
        'au_segment_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_segment_id' => ['name' => 'Segment #', 'domain' => 'segment_id_sequence'],
        'au_segment_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
        'au_segment_name' => ['name' => 'Name', 'domain' => 'name'],
        'au_segment_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'au_segments_pk' => ['type' => 'pk', 'columns' => ['au_segment_tenant_id', 'au_segment_id']],
        'au_segment_code_un' => ['type' => 'unique', 'columns' => ['au_segment_tenant_id', 'au_segment_code']],
    ];
    public $indexes = [
        'au_segments_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['au_segment_name', 'au_segment_code']]
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'au_segment_name' => 'name',
        'au_segment_name*' => 'avatar_circle_small',
        'au_segment_inactive' => 'inactive',
    ];
    public $options_active = [
        'au_segment_inactive' => 0,
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $who = [
        'inserted' => true,
        'updated' => true,
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
