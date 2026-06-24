<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Campaign;

use Object\Table;

class Contacts extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Campaign Contacts';
    public $name = 'au_campaign_contacts';
    public $pk = ['au_campcont_tenant_id', 'au_campcont_au_campaign_id', 'au_campcont_au_contact_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_campcont_';
    public $columns = [
        'au_campcont_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_campcont_au_campaign_id' => ['name' => 'Campaign #', 'domain' => 'campaign_id'],
        'au_campcont_au_contact_id' => ['name' => 'Contact #', 'domain' => 'contact_id'],
        'au_campcont_au_camptype_code' => ['name' => 'Type', 'domain' => 'group_code'], // from campaign
        'au_campcont_au_campstatus_code' => ['name' => 'Status', 'domain' => 'status_code'], // updated by script
        'au_campcont_name' => ['name' => 'Name', 'domain' => 'name', 'null' => true],
        'au_campcont_email' => ['name' => 'Email', 'domain' => 'email', 'null' => true],
        'au_campcont_phone' => ['name' => 'Phone', 'domain' => 'phone', 'null' => true],
        'au_campcont_whatsapp' => ['name' => 'WhatsApp', 'domain' => 'whatsapp', 'null' => true],
        'au_campcont_fax' => ['name' => 'Fax', 'domain' => 'phone', 'null' => true],
        'au_campcont_um_user_id' => ['name' => 'U/M User #', 'domain' => 'user_id', 'null' => true],
        // content
        'au_campcont_au_sender_id' => ['name' => 'Sender #', 'domain' => 'sender_id', 'null' => true],
        'au_campcont_sender_phone' => ['name' => 'Sender Phone', 'domain' => 'phone', 'null' => true],
        'au_campcont_sender_email' => ['name' => 'Sender Email', 'domain' => 'email', 'null' => true],
        'au_campcont_subject' => ['name' => 'Subject', 'domain' => 'subject', 'null' => true],
        'au_campcont_important' => ['name' => 'Important', 'type' => 'boolean'],
        'au_campcont_um_mesbody_id' => ['name' => 'Message #', 'domain' => 'message_id', 'null' => true],
        // other
        'au_campcont_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'au_campaign_contacts_pk' => ['type' => 'pk', 'columns' => ['au_campcont_tenant_id', 'au_campcont_au_campaign_id', 'au_campcont_au_contact_id']],
        'au_campcont_au_campaign_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_campcont_tenant_id', 'au_campcont_au_campaign_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Campaigns',
            'foreign_columns' => ['au_campaign_tenant_id', 'au_campaign_id']
        ],
        'au_campcont_au_contact_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_campcont_tenant_id', 'au_campcont_au_contact_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Contacts',
            'foreign_columns' => ['au_contact_tenant_id', 'au_contact_id']
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

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
