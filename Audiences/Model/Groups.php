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

class Groups extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Groups';
    public $name = 'au_groups';
    public $pk = ['au_group_tenant_id', 'au_group_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_group_';
    public $columns = [
        'au_group_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_group_id' => ['name' => 'Group #', 'domain' => 'group_id_sequence'],
        'au_group_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
        'au_group_name' => ['name' => 'Name', 'domain' => 'name'],
        'au_group_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'au_group_um_usrgrp_id' => ['name' => 'U/M Group #', 'domain' => 'group_id', 'null' => true],
        'au_group_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'au_groups_pk' => ['type' => 'pk', 'columns' => ['au_group_tenant_id', 'au_group_id']],
        'au_group_code_un' => ['type' => 'unique', 'columns' => ['au_group_tenant_id', 'au_group_code']],
        'au_group_organization_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_group_tenant_id', 'au_group_organization_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
            'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
        ],
        'au_group_um_usrgrp_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_group_tenant_id', 'au_group_um_usrgrp_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Groups',
            'foreign_columns' => ['um_usrgrp_tenant_id', 'um_usrgrp_id']
        ]
    ];
    public $indexes = [
        'au_groups_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['au_group_name', 'au_group_code']]
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'au_group_name' => 'name',
        'au_group_name*' => 'avatar_circle_small',
        'au_group_inactive' => 'inactive',
    ];
    public $options_active = [
        'au_group_inactive' => 0,
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
