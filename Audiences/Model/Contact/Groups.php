<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Contact;

use Object\Table;

class Groups extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Contact Groups';
    public $name = 'au_contact_groups';
    public $pk = ['au_contgrp_tenant_id', 'au_contgrp_au_contact_id', 'au_contgrp_au_group_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_contgrp_';
    public $columns = [
        'au_contgrp_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_contgrp_au_contact_id' => ['name' => 'Contact #', 'domain' => 'contact_id'],
        'au_contgrp_au_group_id' => ['name' => 'Group #', 'domain' => 'group_id'],
    ];
    public $constraints = [
        'au_contact_groups_pk' => ['type' => 'pk', 'columns' => ['au_contgrp_tenant_id', 'au_contgrp_au_contact_id', 'au_contgrp_au_group_id']],
        'au_contgrp_au_contact_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contgrp_tenant_id', 'au_contgrp_au_contact_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Contacts',
            'foreign_columns' => ['au_contact_tenant_id', 'au_contact_id']
        ],
        'au_contgrp_au_group_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contgrp_tenant_id', 'au_contgrp_au_group_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Groups',
            'foreign_columns' => ['au_group_tenant_id', 'au_group_id']
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
