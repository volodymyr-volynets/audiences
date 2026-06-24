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

class Skills extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Contact Skills';
    public $name = 'au_contact_skills';
    public $pk = ['au_contskill_tenant_id', 'au_contskill_au_contact_id', 'au_contskill_name'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_contskill_';
    public $columns = [
        'au_contskill_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_contskill_au_contact_id' => ['name' => 'Contact #', 'domain' => 'contact_id'],
        'au_contskill_name' => ['name' => 'Name', 'domain' => 'name'],
        'au_contskill_um_usrskillprof_code' => ['name' => 'Proficiency', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIISkillProficiencies'],
        'au_contskill_years_in_practice' => ['name' => 'Years In Practice', 'domain' => 'age_counter', 'null' => true],
        'au_contskill_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'au_contact_skills_pk' => ['type' => 'pk', 'columns' => ['au_contskill_tenant_id', 'au_contskill_au_contact_id', 'au_contskill_name']],
        'au_contskill_au_contact_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contskill_tenant_id', 'au_contskill_au_contact_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Contacts',
            'foreign_columns' => ['au_contact_tenant_id', 'au_contact_id']
        ],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [
        'au_contskill_mention' => 'name',
        'au_contskill_inactive' => 'inactive',
    ];
    public $options_active = [
        'au_contskill_inactive' => 0,
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
