<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Collection;

use Object\Collection;

class Segments extends Collection
{
    public $data = [
        'name' => 'AU Segments',
        'model' => '\Numbers\Audiences\Audiences\Model\Segments',
        'pk' => ['au_segment_tenant_id', 'au_segment_id'],
        'details' => [
            '\Numbers\Audiences\Audiences\Model\Segment\Details' => [
                'name' => 'AU Segment Details',
                'pk' => ['au_segdetail_tenant_id', 'au_segdetail_au_segment_id', 'au_segdetail_id'],
                'type' => '1M',
                'map' => ['au_segment_tenant_id' => 'au_segdetail_tenant_id', 'au_segment_id' => 'au_segdetail_au_segment_id'],
                'details' => [
                    '\Numbers\Audiences\Audiences\Model\Segment\Detail\ValuesIDs' => [
                        'name' => 'AU Segment Detail Values IDs',
                        'pk' => ['au_segdetvalids_tenant_id', 'au_segdetvalids_au_segment_id', 'au_segdetvalids_au_segdetail_id', 'au_segdetvalids_value_id'],
                        'type' => '1M',
                        'map' => ['au_segdetail_tenant_id' => 'au_segdetvalids_tenant_id', 'au_segdetail_au_segment_id' => 'au_segdetvalids_au_segment_id', 'au_segdetail_id' => 'au_segdetvalids_au_segdetail_id'],
                    ]
                ]
            ]
        ]
    ];
}
