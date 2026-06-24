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

class Campaigns extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Campaigns';
    public $name = 'au_campaigns';
    public $pk = ['au_campaign_tenant_id', 'au_campaign_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_campaign_';
    public $columns = [
        'au_campaign_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_campaign_id' => ['name' => 'Campaign #', 'domain' => 'campaign_id_sequence'],
        'au_campaign_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
        'au_campaign_name' => ['name' => 'Name', 'domain' => 'name'],
        'au_campaign_in_group_id' => ['name' => 'I/N Group #', 'domain' => 'group_id', 'null' => true],
        'au_campaign_au_camptype_code' => ['name' => 'Type', 'domain' => 'group_code', 'options_model' => '\Numbers\Audiences\Audiences\Model\Campaign\CampaignTypes'],
        'au_campaign_au_sender_id' => ['name' => 'Sender #', 'domain' => 'sender_id'],
        'au_campaign_au_campstatus_code' => ['name' => 'Status', 'domain' => 'status_code', 'options_model' => '\Numbers\Audiences\Audiences\Model\Campaign\CampaignStatuses'],
        // content
        'au_campaign_t9_page_id' => ['name' => 'Page #', 'domain' => 'page_id', 'null' => true],
        'au_campaign_t9_layout_code' => ['name' => 'Layout Code', 'domain' => 'layout_code', 'null' => true],
        'au_campaign_t9_smstemplate_id' => ['name' => 'SMS Template #', 'domain' => 'template_id', 'null' => true],
        'au_campaign_t9_wapptemplate_id' => ['name' => 'WhatsApp Template #', 'domain' => 'template_id', 'null' => true],
        'au_campaign_plain_message' => ['name' => 'Message (Plain)', 'domain' => 'message', 'null' => true],
        'au_campaign_subject' => ['name' => 'Subject', 'domain' => 'subject', 'null' => true],
        'au_campaign_important' => ['name' => 'Important', 'type' => 'boolean'],
        // scheduling
        'au_campaign_postponed_datetime' => ['name' => 'Postponed Datetime', 'type' => 'datetime', 'null' => true],
        // other
        'au_campaign_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'au_campaigns_pk' => ['type' => 'pk', 'columns' => ['au_campaign_tenant_id', 'au_campaign_id']],
        'au_campaign_code_un' => ['type' => 'unique', 'columns' => ['au_campaign_tenant_id', 'au_campaign_code']],
        'au_campaign_in_group_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_campaign_tenant_id', 'au_campaign_in_group_id'],
            'foreign_model' => '\Numbers\Internalization\Internalization\Model\Groups',
            'foreign_columns' => ['in_group_tenant_id', 'in_group_id']
        ],
        'au_campaign_au_sender_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_campaign_tenant_id', 'au_campaign_au_sender_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Senders',
            'foreign_columns' => ['au_sender_tenant_id', 'au_sender_id']
        ],
        'au_campaign_t9_page_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_campaign_tenant_id', 'au_campaign_t9_page_id'],
            'foreign_model' => '\Numbers\Templates\Forms\Model\Pages',
            'foreign_columns' => ['t9_page_tenant_id', 't9_page_id']
        ],
        'au_campaign_t9_layout_code_fk' => [
            'type' => 'fk',
            'columns' => ['au_campaign_tenant_id', 'au_campaign_t9_layout_code'],
            'foreign_model' => '\Numbers\Templates\Forms\Model\Layouts',
            'foreign_columns' => ['t9_layout_tenant_id', 't9_layout_code']
        ],
        'au_campaign_t9_smstemplate_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_campaign_tenant_id', 'au_campaign_t9_smstemplate_id'],
            'foreign_model' => '\Numbers\Templates\Forms\Model\SMSTemplates',
            'foreign_columns' => ['t9_smstemplate_tenant_id', 't9_smstemplate_id']
        ],
        'au_campaign_t9_wapptemplate_id' => [
            'type' => 'fk',
            'columns' => ['au_campaign_tenant_id', 'au_campaign_t9_wapptemplate_id'],
            'foreign_model' => '\Numbers\Templates\Forms\Model\WhatsAppTemplates',
            'foreign_columns' => ['t9_wapptemplate_tenant_id', 't9_wapptemplate_id']
        ]
    ];
    public $indexes = [
        'au_campaigns_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['au_campaign_name', 'au_campaign_code']]
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'au_campaign_name' => 'name',
        'au_campaign_code' => 'name',
        'au_campaign_inactive' => 'inactive',
    ];
    public $options_active = [
        'au_campaign_inactive' => 0,
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
