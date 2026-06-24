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

class Senders extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Senders';
    public $name = 'au_senders';
    public $pk = ['au_sender_tenant_id', 'au_sender_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_sender_';
    public $columns = [
        'au_sender_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_sender_id' => ['name' => 'Sender #', 'domain' => 'sender_id_sequence'],
        'au_sender_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
        'au_sender_name' => ['name' => 'Name', 'domain' => 'name'],
        'au_sender_au_camptype_code' => ['name' => 'Type', 'domain' => 'group_code'],
        // mail profile
        'au_sender_sm_mailprofile_id' => ['name' => 'Profile #', 'domain' => 'profile_id', 'null' => true],
        'au_sender_sm_mailprosndr_id' => ['name' => 'Detail #', 'domain' => 'detail_id', 'null' => true],
        'au_sender_email' => ['name' => 'Email', 'domain' => 'email', 'null' => true],
        // sms profile
        'au_sender_sm_smsprofile_id' => ['name' => 'Profile #', 'domain' => 'profile_id', 'null' => true],
        'au_sender_sm_smsprosndr_id' => ['name' => 'Detail #', 'domain' => 'detail_id', 'null' => true],
        'au_sender_phone' => ['name' => 'Phone', 'domain' => 'phone', 'null' => true],
        // other
        'au_sender_verified' => ['name' => 'Verified', 'type' => 'boolean'],
        'au_sender_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'au_senders_pk' => ['type' => 'pk', 'columns' => ['au_sender_tenant_id', 'au_sender_id']],
        'au_sender_code_un' => ['type' => 'unique', 'columns' => ['au_sender_tenant_id', 'au_sender_code']],
        'au_sender_sm_mailprosndr_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_sender_tenant_id', 'au_sender_sm_mailprofile_id', 'au_sender_sm_mailprosndr_id'],
            'foreign_model' => '\Numbers\Backend\Mail\Common\Model\Profile\Senders',
            'foreign_columns' => ['sm_mailprosndr_tenant_id', 'sm_mailprosndr_sm_mailprofile_id', 'sm_mailprosndr_id']
        ],
        'au_sender_sm_smsprosndr_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_sender_tenant_id', 'au_sender_sm_smsprofile_id', 'au_sender_sm_smsprosndr_id'],
            'foreign_model' => '\Numbers\Backend\SMS\Common\Model\Profile\Senders',
            'foreign_columns' => ['sm_smsprosndr_tenant_id', 'sm_smsprosndr_sm_smsprofile_id', 'sm_smsprosndr_id']
        ],
    ];
    public $indexes = [
        'au_senders_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['au_sender_name', 'au_sender_code']]
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'au_sender_name' => 'name',
        'au_sender_code' => 'name',
        'au_sender_verified' => 'verified',
        'au_sender_inactive' => 'inactive',
    ];
    public $options_active = [
        'au_sender_inactive' => 0,
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
