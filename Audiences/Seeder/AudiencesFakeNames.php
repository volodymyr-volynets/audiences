<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Seeder;

use Numbers\FakeNames\FakeNames\FakerFactory;

class AudiencesFakeNames
{
    public static function generate(string $code): array
    {
        $names = FakerFactory::create();
        // generate data
        $result = [
            'au_audience_tenant_id' => \Tenant::id(),
            'au_audience_code' => $code,
            'au_audience_name' => $names->name__suffix_Audience,
            'au_audience_in_group_id' => $names->getStoredModelValues('\Numbers\Internalization\Internalization\Model\Groups', 'id', 1),
            'au_audience_inactive' => 0,
            '\Numbers\Audiences\Audiences\Model\Audience\Organizations' => [
                [
                    'au_audorg_on_organization_id' => $names->getStoredModelValues('\Numbers\Users\Organizations\Model\Organizations', 'id', 1),
                    'au_audorg_primary' => 1,
                    'au_audorg_inactive' => 0
                ]
            ],
            '\Numbers\Audiences\Audiences\Model\Audience\Groups' => [
                [
                    'au_audgrp_au_group_id' => $names->getStoredModelValues('\Numbers\Audiences\Audiences\Model\Groups', 'id', 1),
                    'au_audgrp_inactive' => 0,
                ]
            ]
        ];
        return $result;
    }
}
