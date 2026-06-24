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

use Object\Data;

class CampaignStatuses extends Data
{
    public $module_code = 'AU';
    public $title = 'A/U Campaign Statuses';
    public $column_key = 'au_campstatus_code';
    public $column_prefix = 'au_campstatus_';
    public $orderby = [
        'au_campstatus_order' => SORT_ASC,
    ];
    public $columns = [
        'au_campstatus_code' => ['name' => 'Status', 'domain' => 'status_code'],
        'au_campstatus_name' => ['name' => 'Name', 'type' => 'text'],
        'au_campstatus_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'DRAFT' => ['au_campstatus_name' => 'Draft', 'au_campstatus_order' => 1000],
        'NEW' => ['au_campstatus_name' => 'New', 'au_campstatus_order' => 2000],
        'SCHEDULED' => ['au_campstatus_name' => 'Scheduled', 'au_campstatus_order' => 3000],
        'SENDING' => ['au_campstatus_name' => 'Sending', 'au_campstatus_order' => 4000],
        'DONE' => ['au_campstatus_name' => 'Done', 'au_campstatus_order' => 5000],
    ];
}
