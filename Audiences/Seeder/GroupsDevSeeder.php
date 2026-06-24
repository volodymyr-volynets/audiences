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

use Numbers\Backend\Db\Common\Seeder\Base as SeederBase;
use Numbers\Audiences\Audiences\Model\Collection\Groups as GroupsCollection;
use Numbers\Audiences\Audiences\Seeder\GroupsFakeNames;
use Numbers\Audiences\Audiences\Model\Groups;

class GroupsDevSeeder extends SeederBase
{
    public $db_link = 'default';
    public $seeder_name = 'A/U Groups Dev Seeder';

    /**
     * Seed up
     *
     * Throw exceptions if something fails!!!
     */
    public function up()
    {
        // tenant
        $tenant_id = \Tenant::id();
        if (!$tenant_id) {
            throw new \Exception('Tenant?');
        }
        // in a loop
        $collection = new GroupsCollection();
        for ($i = 1; $i <= 50; $i++) {
            $au_group_code = $this->names->generateModelCode('GRP_SDR_', 22, $i);
            $existing = Groups::getStatic([
                'where' => [
                    'au_group_tenant_id' => $tenant_id,
                    'au_group_code' => $au_group_code,
                ],
                'pk' => null,
                'single_row' => true,
            ]);
            if ($existing) {
                continue;
            }
            // generate records
            $group = GroupsFakeNames::generate($au_group_code);
            $result = $collection->merge($group);
            if (!$result['success']) {
                throw new \Exception2($result['error']);
            }
        }
    }
}
