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

class GroupsFakeNames
{
    public static function generate(string $code): array
    {
        $names = FakerFactory::create();
        // generate data
        $result = [
            'au_group_tenant_id' => \Tenant::id(),
            'au_group_code' => $code,
            'au_group_name' => $names->name__suffix_Group,
            'au_group_organization_id' => $names->getStoredModelValues('\Numbers\Users\Organizations\Model\Organizations', 'id', 1),
            'au_group_um_usrgrp_id' => null,
            'au_group_inactive' => 0
        ];
        return $result;
    }
}
