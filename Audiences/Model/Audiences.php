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

class Audiences extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Audiences';
    public $name = 'au_audiences';
    public $pk = ['au_audience_tenant_id', 'au_audience_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_audience_';
    public $columns = [
        'au_audience_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_audience_id' => ['name' => 'Audience #', 'domain' => 'audience_id_sequence'],
        'au_audience_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
        'au_audience_name' => ['name' => 'Name', 'domain' => 'name'],
        'au_audience_in_group_id' => ['name' => 'I/N Group #', 'domain' => 'group_id', 'null' => true],
        'au_audience_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'au_audiences_pk' => ['type' => 'pk', 'columns' => ['au_audience_tenant_id', 'au_audience_id']],
        'au_audience_code_un' => ['type' => 'unique', 'columns' => ['au_audience_tenant_id', 'au_audience_code']],
        'au_audience_in_group_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_audience_tenant_id', 'au_audience_in_group_id'],
            'foreign_model' => '\Numbers\Internalization\Internalization\Model\Groups',
            'foreign_columns' => ['in_group_tenant_id', 'in_group_id']
        ]
    ];
    public $indexes = [
        'au_audiences_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['au_audience_name', 'au_audience_code']]
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'au_audience_name' => 'name',
        'au_audience_name*' => 'avatar_circle_small',
        'au_audience_inactive' => 'inactive',
    ];
    public $options_active = [
        'au_audience_inactive' => 0,
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
