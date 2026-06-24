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

class CampaignTypes extends Data
{
    public $module_code = 'AU';
    public $title = 'A/U Campaign Types';
    public $column_key = 'au_camptype_code';
    public $column_prefix = 'au_camptype_';
    public $orderby = [
        'au_camptype_order' => SORT_ASC,
    ];
    public $columns = [
        'au_camptype_code' => ['name' => 'Type', 'domain' => 'group_code'],
        'au_camptype_name' => ['name' => 'Name', 'type' => 'text'],
        'au_camptype_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'EMAIL' => ['au_camptype_name' => 'Email', 'au_camptype_order' => 1000],
        'SMS' => ['au_camptype_name' => 'SMS', 'au_camptype_order' => 2000],
        'WHATSAPP' => ['au_camptype_name' => 'WhatsApp', 'au_camptype_order' => 3000],
    ];
}
