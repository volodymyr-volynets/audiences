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
use Numbers\Users\Organizations\Model\Organizations as OrganizationsParent;
use Numbers\Audiences\Audiences\Model\Contacts;

class Organizations extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Contact Organizations';
    public $name = 'au_contact_organizations';
    public $pk = ['au_contorg_tenant_id', 'au_contorg_au_contact_id', 'au_contorg_on_organization_id'];
    public $tenant = true;
    public $orderby = [
        'au_contorg_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'au_contorg_';
    public $columns = [
        'au_contorg_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_contorg_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'au_contorg_au_contact_id' => ['name' => 'Contact #', 'domain' => 'contact_id'],
        'au_contorg_on_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'au_contorg_primary' => ['name' => 'Primary', 'type' => 'boolean'],
        'au_contorg_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'au_contact_organizations_pk' => ['type' => 'pk', 'columns' => ['au_contorg_tenant_id', 'au_contorg_au_contact_id', 'au_contorg_on_organization_id']],
        'au_contorg_au_contact_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contorg_tenant_id', 'au_contorg_au_contact_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Contacts',
            'foreign_columns' => ['au_contact_tenant_id', 'au_contact_id']
        ],
        'au_contorg_on_organization_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contorg_tenant_id', 'au_contorg_on_organization_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
            'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $code_model = OrganizationsParent::class;
    public $collections = [
        Contacts::class => [
            'name' => 'Contact Organizations',
            'pk' => ['au_contorg_tenant_id', 'au_contorg_au_contact_id', 'au_contorg_on_organization_id'],
            'type' => '1M',
            'map' => ['au_contact_tenant_id' => 'au_contorg_tenant_id', 'au_contact_id' => 'au_contorg_au_contact_id'],
        ],
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
