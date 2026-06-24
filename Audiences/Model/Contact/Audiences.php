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
use Numbers\Audiences\Audiences\Model\Audiences as ParentAudiences;
use Numbers\Audiences\Audiences\Model\Contacts as Contacts;

class Audiences extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Contact Audiences';
    public $name = 'au_contact_audiences';
    public $pk = ['au_contaud_tenant_id', 'au_contaud_au_contact_id', 'au_contaud_au_audience_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_contaud_';
    public $columns = [
        'au_contaud_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_contaud_au_contact_id' => ['name' => 'Contact #', 'domain' => 'contact_id'],
        'au_contaud_au_audience_id' => ['name' => 'Audience #', 'domain' => 'audience_id'],
        'au_contaud_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'au_contact_audiences_pk' => ['type' => 'pk', 'columns' => ['au_contaud_tenant_id', 'au_contaud_au_contact_id', 'au_contaud_au_audience_id']],
        'au_contaud_au_contact_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contaud_tenant_id', 'au_contaud_au_contact_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Contacts',
            'foreign_columns' => ['au_contact_tenant_id', 'au_contact_id']
        ],
        'au_contaud_au_audience_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contaud_tenant_id', 'au_contaud_au_audience_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Audiences',
            'foreign_columns' => ['au_audience_tenant_id', 'au_audience_id']
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

    public $code_model = Audiences::class;
    public $collections = [
        Contacts::class => [
            'name' => 'AU Contact Audiences',
            'pk' => ['au_contaud_tenant_id', 'au_contaud_au_contact_id', 'au_contaud_au_audience_id'],
            'type' => '1M',
            'map' => ['au_contact_tenant_id' => 'au_contaud_tenant_id', 'au_contact_id' => 'au_contaud_au_contact_id'],
        ],
        ParentAudiences::class => [
            'name' => 'AU Audience Contacts',
            'pk' => ['au_contaud_tenant_id', 'au_contaud_au_audience_id', 'au_contaud_au_contact_id'],
            'type' => '1M',
            'map' => ['au_audience_tenant_id' => 'au_contaud_tenant_id', 'au_audience_id' => 'au_contaud_au_audience_id'],
        ],
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
