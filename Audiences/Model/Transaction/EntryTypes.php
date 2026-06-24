<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Transaction;

use Object\Data;

class EntryTypes extends Data
{
    public $module_code = 'AU';
    public $title = 'A/U Entry Types';
    public $column_key = 'au_enttype_code';
    public $column_prefix = 'au_enttype_';
    public $orderby = ['au_enttype_order' => SORT_ASC];
    public $columns = [
        'au_enttype_code' => ['name' => 'Entry Type', 'domain' => 'type_code'],
        'au_enttype_name' => ['name' => 'Name', 'type' => 'text'],
        'au_enttype_order' => ['name' => 'Order', 'domain' => 'order']
    ];
    public $data = [
        'AUD' => ['au_enttype_name' => 'Audience', 'au_enttype_order' => 1000],
        'CON' => ['au_enttype_name' => 'Contact', 'au_enttype_order' => 2000],
        'GRP' => ['au_enttype_name' => 'Group', 'au_enttype_order' => 3000],
        'SEG' => ['au_enttype_name' => 'Segment', 'au_enttype_order' => 4000],
        'CAM' => ['au_enttype_name' => 'Campaign', 'au_enttype_order' => 5000],
        'SEN' => ['au_enttype_name' => 'Sender', 'au_enttype_order' => 6000],
    ];
}
