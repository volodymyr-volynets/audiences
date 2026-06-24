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

class Languages extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Contact Languages';
    public $name = 'au_contact_languages';
    public $pk = ['au_contsplang_tenant_id', 'au_contsplang_au_contact_id', 'au_contsplang_language_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_contsplang_';
    public $columns = [
        'au_contsplang_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_contsplang_au_contact_id' => ['name' => 'Contact #', 'domain' => 'contact_id'],
        'au_contsplang_language_code' => ['name' => 'Language Code', 'domain' => 'language_code'],
        'au_contsplang_listening_um_usrpiiprof_code' => ['name' => 'Listening Proficiencies', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies'],
        'au_contsplang_speaking_um_usrpiiprof_code' => ['name' => 'Speaking Proficiencies', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies'],
        'au_contsplang_writing_um_usrpiiprof_code' => ['name' => 'Writing Proficiencies', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies'],
        'au_contsplang_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'au_contact_languages_pk' => ['type' => 'pk', 'columns' => ['au_contsplang_tenant_id', 'au_contsplang_au_contact_id', 'au_contsplang_language_code']],
        'au_contsplang_au_contact_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contsplang_tenant_id', 'au_contsplang_au_contact_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Contacts',
            'foreign_columns' => ['au_contact_tenant_id', 'au_contact_id']
        ],
        'au_contsplang_language_code_fk' => [
            'type' => 'fk',
            'columns' => ['au_contsplang_tenant_id', 'au_contsplang_language_code'],
            'foreign_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes',
            'foreign_columns' => ['in_language_tenant_id', 'in_language_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [
        'au_contsplang_mention' => 'name',
        'au_contsplang_inactive' => 'inactive',
    ];
    public $options_active = [
        'au_contsplang_inactive' => 0,
    ];
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
