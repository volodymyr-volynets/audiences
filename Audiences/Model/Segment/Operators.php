<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Segment;

use Object\Data;

class Operators extends Data
{
    public $module_code = 'AU';
    public $title = 'A/U Segment Operators';
    public $column_key = 'au_segoperator_code';
    public $column_prefix = 'au_segoperator_';
    public $orderby = [
        'au_segoperator_order' => SORT_ASC,
    ];
    public $columns = [
        'au_segoperator_code' => ['name' => 'Operator', 'domain' => 'type_code'],
        'au_segoperator_name' => ['name' => 'Name', 'type' => 'text'],
        'au_segoperator_order' => ['name' => 'Order', 'domain' => 'order'],
    ];
    public $data = [
        'AND' => ['au_segoperator_name' => 'AND', 'au_segoperator_order' => 1000],
        'OR' => ['au_segoperator_name' => 'OR', 'au_segoperator_order' => 2000],
        'AND NOT' => ['au_segoperator_name' => 'AND NOT', 'au_segoperator_order' => 3000],
        'OR NOT' => ['au_segoperator_name' => 'OR NOT', 'au_segoperator_order' => 4000],
    ];
}
