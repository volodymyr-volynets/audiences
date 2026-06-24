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
use Numbers\Audiences\Audiences\Model\Collection\Audiences as AudiencesCollection;
use Numbers\Audiences\Audiences\Seeder\AudiencesFakeNames;
use Numbers\Audiences\Audiences\Model\Audiences;

class AudiencesDevSeeder extends SeederBase
{
    public $db_link = 'default';
    public $seeder_name = 'A/U Audiences Dev Seeder';

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
        $collection = new AudiencesCollection();
        for ($i = 1; $i <= 50; $i++) {
            $au_audience_code = $this->names->generateModelCode('AUD_SDR_', 22, $i);
            $existing = Audiences::getStatic([
                'where' => [
                    'au_audience_tenant_id' => $tenant_id,
                    'au_audience_code' => $au_audience_code,
                ],
                'pk' => null,
                'single_row' => true,
            ]);
            if ($existing) {
                continue;
            }
            // generate records
            $role = AudiencesFakeNames::generate($au_audience_code);
            $result = $collection->merge($role);
            if (!$result['success']) {
                throw new \Exception2($result['error']);
            }
        }
    }
}
