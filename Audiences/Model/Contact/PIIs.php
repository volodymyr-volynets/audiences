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

class PIIs extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Contact PIIs';
    public $name = 'au_contact_piis';
    public $pk = ['au_contpii_tenant_id', 'au_contpii_au_contact_id'];
    public $tenant = true;
    public $orderby = [];
    public $limit;
    public $column_prefix = 'au_contpii_';
    public $columns = [
        'au_contpii_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_contpii_au_contact_id' => ['name' => 'Contact #', 'domain' => 'contact_id'],
        // pii settings
        'au_contpii_um_usrpiigender_code' => ['name' => 'Gender', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIGenders'],
        'au_contpii_um_usrpiirace_code' => ['name' => 'Race', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIRaces'],
        'au_contpii_um_usrpiidisability_code' => ['name' => 'Disability', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIDisability'],
        'au_contpii_um_um_usrpiiveteran_code' => ['name' => 'Veteran Status', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIVeteranStatuses'],
        'au_contpii_um_usrpiisexorient_code' => ['name' => 'Sexual Orientation', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIISexualOrientations'],
        'au_contpii_um_usrpiihighedu_code' => ['name' => 'Highest Education', 'domain' => 'group_code', 'null' => true, 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIHighestEducations'],
        'au_contpii_birth_cm_country_code' => ['name' => 'Birth Country Code', 'domain' => 'country_code', 'null' => true],
        'au_contpii_living_cm_country_code' => ['name' => 'Living Country Code', 'domain' => 'country_code', 'null' => true],
        // dates + computed
        'au_contpii_date_of_birth' => ['name' => 'Date Of Birth', 'type' => 'date', 'null' => true],
        'au_contpii_age_in_years' => ['name' => 'Age In Years', 'domain' => 'age_counter', 'null' => true, 'computed' => true],
        'au_contpii_date_of_seniority' => ['name' => 'Date Of Seniority', 'type' => 'date', 'null' => true],
        'au_contpii_seniority_in_years' => ['name' => 'Seniority In Years', 'domain' => 'age_counter', 'null' => true, 'computed' => true],
        'au_contpii_datetime_of_joining' => ['name' => 'Datetime Of Joining', 'type' => 'datetime', 'null' => true],
        'au_contpii_joining_in_days' => ['name' => 'Joining In Days', 'domain' => 'age_counter', 'null' => true, 'computed' => true],
        'au_contpii_datetime_of_last_purchase' => ['name' => 'Datetime Of Last Purchase', 'type' => 'datetime', 'null' => true],
        'au_contpii_last_purchase_in_days' => ['name' => 'Days Since Last Purchase', 'domain' => 'age_counter', 'null' => true, 'computed' => true],
        'au_contpii_datetime_of_last_login' => ['name' => 'Datetime Of Last Login', 'type' => 'datetime', 'null' => true],
        'au_contpii_last_login_in_days' => ['name' => 'Days Since Last Login', 'domain' => 'age_counter', 'null' => true, 'computed' => true],
        // sin
        'au_contpii_sin_number' => ['name' => 'Social Insurance Number (SIN)', 'domain' => 'sin', 'null' => true],
        'au_contpii_sin_expires' => ['name' => 'SIN Expires', 'type' => 'date', 'null' => true],
        // other
        'au_contpii_on_visa' => ['name' => 'On Visa', 'type' => 'boolean'],
        'au_contpii_vulnerable_person' => ['name' => 'Vulnerable Person', 'type' => 'boolean'],
    ];
    public $constraints = [
        'au_contact_piis_pk' => ['type' => 'pk', 'columns' => ['au_contpii_tenant_id', 'au_contpii_au_contact_id']],
        'au_contpii_au_contact_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contpii_tenant_id', 'au_contpii_au_contact_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Contacts',
            'foreign_columns' => ['au_contact_tenant_id', 'au_contact_id']
        ],
        'au_contpii_birth_cm_country_code_fk' => [
            'type' => 'fk',
            'columns' => ['au_contpii_tenant_id', 'au_contpii_birth_cm_country_code'],
            'foreign_model' => '\Numbers\Countries\Countries\Model\Countries',
            'foreign_columns' => ['cm_country_tenant_id', 'cm_country_code']
        ],
        'au_contpii_living_cm_country_code_fk' => [
            'type' => 'fk',
            'columns' => ['au_contpii_tenant_id', 'au_contpii_living_cm_country_code'],
            'foreign_model' => '\Numbers\Countries\Countries\Model\Countries',
            'foreign_columns' => ['cm_country_tenant_id', 'cm_country_code']
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

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
