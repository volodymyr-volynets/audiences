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

class Segments extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'AU';
    public $title = 'A/U Campaign Segments';
    public $name = 'au_campaign_segments';
    public $pk = ['au_campsegm_tenant_id', 'au_campsegm_au_campaign_id', 'au_campsegm_au_segment_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'au_campsegm_';
    public $columns = [
        'au_campsegm_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'au_campsegm_au_campaign_id' => ['name' => 'Campaign #', 'domain' => 'campaign_id'],
        'au_campsegm_au_segment_id' => ['name' => 'Segment #', 'domain' => 'segment_id'],
        'au_campsegm_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'au_campaign_segments_pk' => ['type' => 'pk', 'columns' => ['au_campsegm_tenant_id', 'au_campsegm_au_campaign_id', 'au_campsegm_au_segment_id']],
        'au_campsegm_au_campaign_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_campsegm_tenant_id', 'au_campsegm_au_campaign_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Campaigns',
            'foreign_columns' => ['au_campaign_tenant_id', 'au_campaign_id']
        ],
        'au_campsegm_au_segment_id_fk' => [
            'type' => 'fk',
            'columns' => ['au_campsegm_tenant_id', 'au_campsegm_au_segment_id'],
            'foreign_model' => '\Numbers\Audiences\Audiences\Model\Segments',
            'foreign_columns' => ['au_segment_tenant_id', 'au_segment_id']
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
