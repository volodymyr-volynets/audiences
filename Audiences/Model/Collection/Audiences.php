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

class Audiences extends Collection
{
    public $data = [
        'name' => 'AU Audiences',
        'model' => '\Numbers\Audiences\Audiences\Model\Audiences',
        'details' => [
            '\Numbers\Audiences\Audiences\Model\Audience\Organizations' => [
                'name' => 'AU Audience Organizations',
                'pk' => ['au_audorg_tenant_id', 'au_audorg_au_audience_id', 'au_audorg_on_organization_id'],
                'type' => '1M',
                'map' => ['au_audience_tenant_id' => 'au_audorg_tenant_id', 'au_audience_id' => 'au_audorg_au_audience_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Audience\Groups' => [
                'name' => 'AU Audience Groups',
                'pk' => ['au_audgrp_tenant_id', 'au_audgrp_au_audience_id', 'au_audgrp_au_group_id'],
                'type' => '1M',
                'map' => ['au_audience_tenant_id' => 'au_audgrp_tenant_id', 'au_audience_id' => 'au_audgrp_au_audience_id'],
            ],
        ]
    ];
}
