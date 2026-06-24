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

use Numbers\Users\Users\Model\User\Types;
use Object\Table;
use Object\Traits\BatchesURLHelper;

class Contacts extends Table
{
    use BatchesURLHelper;

    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Contacts';
    public $schema;
    public $name = 'au_contacts';
    public $pk = ['au_contact_tenant_id', 'au_contact_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_contact_';
    public $columns = [
        'au_contact_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_contact_id' => ['name' => 'Contact #', 'domain' => 'contact_id_sequence'],
        'au_contact_code' => ['name' => 'Contact Number', 'domain' => 'group_code', 'null' => true],
        // user
        'au_contact_um_usrtype_id' => ['name' => 'U/M User Type', 'domain' => 'type_id', 'null' => true, 'options_model' => Types::class],
        'au_contact_um_user_id' => ['name' => 'U/M User #', 'domain' => 'user_id', 'null' => true],
        'au_contact_um_usrgrp_id' => ['name' => 'U/M Group #', 'domain' => 'group_id', 'null' => true],
        // name
        'au_contact_name' => ['name' => 'Name', 'domain' => 'name'],
        'au_contact_company' => ['name' => 'Company', 'domain' => 'name', 'null' => true],
        // personal information
        'au_contact_title' => ['name' => 'Title', 'domain' => 'personal_title', 'null' => true],
        'au_contact_first_name' => ['name' => 'First Name', 'domain' => 'personal_name', 'null' => true],
        'au_contact_last_name' => ['name' => 'Last Name', 'domain' => 'personal_name', 'null' => true],
        // contact
        'au_contact_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
        'au_contact_email2' => ['name' => 'Secondary Email', 'domain' => 'email', 'null' => true],
        'au_contact_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
        'au_contact_numeric_phone' => ['name' => 'Primary Phone (Numeric)', 'domain' => 'numeric_phone', 'null' => true],
        'au_contact_phone2' => ['name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true],
        'au_contact_cell' => ['name' => 'Cell Phone', 'domain' => 'phone', 'null' => true],
        'au_contact_fax' => ['name' => 'Fax', 'domain' => 'phone', 'null' => true],
        'au_contact_whatsapp' => ['name' => 'WhatsApp', 'domain' => 'whatsapp', 'null' => true],
        'au_contact_alternative_contact' => ['name' => 'Alternative Contact', 'domain' => 'description', 'null' => true],
        // operating country / province / currency code & type
        'au_contact_operating_country_code' => ['name' => 'Operating Country Code', 'domain' => 'country_code', 'null' => true],
        'au_contact_operating_province_code' => ['name' => 'Operating Province Code', 'domain' => 'province_code', 'null' => true],
        'au_contact_operating_currency_code' => ['name' => 'Operating Currency Code', 'domain' => 'currency_code', 'null' => true],
        'au_contact_operating_currency_type' => ['name' => 'Operating Currency Type', 'domain' => 'currency_type', 'null' => true],
        // tracking
        'au_contact_send_emails' => ['name' => 'Send Emails', 'type' => 'boolean', 'default' => 1],
        'au_contact_send_sms' => ['name' => 'Send SMS', 'type' => 'boolean'],
        'au_contact_send_postal' => ['name' => 'Send Postal Mail', 'type' => 'boolean'],
        'au_contact_send_whatsapp' => ['name' => 'Send WhatsApp', 'type' => 'boolean'],
        'au_contact_email_confirmed' => ['name' => 'Email Confirmed', 'type' => 'boolean'],
        'au_contact_phone_confirmed' => ['name' => 'Phone Confirmed', 'type' => 'boolean'],
        'au_contact_whatsapp_confirmed' => ['name' => 'WhatsApp Confirmed', 'type' => 'boolean'],
        'au_contact_postal_confirmed' => ['name' => 'Postal Confirmed', 'type' => 'boolean'],
        // other
        'au_contact_ip' => ['name' => 'IP', 'domain' => 'ip', 'null' => true],
        // inactive & hold
        'au_contact_hold' => ['name' => 'Hold', 'type' => 'boolean'],
        'au_contact_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $column_settings = [
        'au_contact_name_assembled' => [GENERABLE, 'concat' => [' ', 'au_contact_title', 'au_contact_first_name', 'au_contact_last_name'], READ_ONLY],
        'au_contact_hold' => [CASTABLE, 'php_type' => 'bool'],
        'au_contact_inactive' => [CASTABLE, 'php_type' => 'bool'],
        'au_contact_phone' => [FORMATABLE, 'format' => '\Object\Validator\Phone::format'],
    ];
    public $constraints = [
        'au_contacts_pk' => ['type' => 'pk', 'columns' => ['au_contact_tenant_id', 'au_contact_id']],
        'au_contact_code_un' => ['type' => 'unique', 'columns' => ['au_contact_tenant_id', 'au_contact_code']],
        'au_contact_um_usrtype_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contact_um_usrtype_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Types',
            'foreign_columns' => ['um_usrtype_id']
        ],
        'au_contact_title_fk' => [
            'type' => 'fk',
            'columns' => ['au_contact_tenant_id', 'au_contact_title'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Titles',
            'foreign_columns' => ['um_usrtitle_tenant_id', 'um_usrtitle_name']
        ],
        'au_contact_um_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contact_tenant_id', 'au_contact_um_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'au_contact_um_usrgrp_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_contact_tenant_id', 'au_contact_um_usrgrp_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\User\Groups',
            'foreign_columns' => ['um_usrgrp_tenant_id', 'um_usrgrp_id']
        ]
    ];
    public $indexes = [
        'au_contacts_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['au_contact_code', 'au_contact_name', 'au_contact_phone', 'au_contact_email', 'au_contact_company']],
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'au_contact_name' => 'name',
        'au_contact_name*' => 'avatar_user_small',
        'au_contact_company' => 'name',
        'au_contact_id' => 'id_suffixed',
        'au_contact_inactive' => 'inactive',
    ];
    public $options_active = [
        'au_contact_inactive' => 0
    ];
    public const selectOptionsActive = '\Numbers\Audiences\Audiences\Model\Contacts::optionsActive';
    public $options_skip_i18n = true;
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $addresses = [
        'map' => [
            'au_contact_tenant_id' => 'wg_address_tenant_id',
            'au_contact_id' => 'wg_address_au_contact_id'
        ]
    ];

    public $attributes = [
        'map' => [
            'au_contact_tenant_id' => 'wg_attribute_tenant_id',
            'au_contact_id' => 'wg_attribute_au_contact_id'
        ]
    ];

    public $comments = [
        'map' => [
            'au_contact_tenant_id' => 'wg_comment_tenant_id',
            'au_contact_id' => 'wg_comment_au_contact_id'
        ]
    ];

    public $documents = [
        'map' => [
            'au_contact_tenant_id' => 'wg_document_tenant_id',
            'au_contact_id' => 'wg_document_au_contact_id'
        ]
    ];

    public $tags = [
        'map' => [
            'au_contact_tenant_id' => 'wg_tag_tenant_id',
            'au_contact_id' => 'wg_tag_au_contact_id'
        ]
    ];

    public $batches = [
        'map' => [
            'au_contact_tenant_id' => 'tm_batchrecord_tenant_id',
            'au_contact_id' => 'tm_batchrecord_field_value_id'
        ],
        'where' => [
            'tm_batchrecord_sm_model_code' => '\Numbers\Audiences\Audiences\Model\Contacts',
            'tm_batchrecord_field_code' => 'au_contact_id',
        ],
        'edit' => [
            'batch_value' => 'tm_batchrecord_field_value_id',
            'batch_name' => 'U/M Contact #',
            'edit_endpoint' => '/Numbers/Audiences/Audiences/Controller/Contacts/_Edit',
            'edit_key' => 'au_contact_id',
            'list_endpoint' => '/Numbers/Audiences/Audiences/Controller/Contacts/_Index',
            'list_key' => ['au_contact_id1', 'au_contact_id2'],
        ],
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];

    public $scoped_records = [
        'column_key' => 'au_contact_id',
        'column_pk_type' => 'int',
        'column_name' => 'A/U Contact #',
        'access_settings' => [
            'default' => 'Owner-*-Write,Access-*-Admin'
        ]
    ];
}
