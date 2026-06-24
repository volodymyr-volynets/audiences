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
use Numbers\Audiences\Audiences\Model\Collection\Contacts as ContactsCollection;
use Numbers\Audiences\Audiences\Seeder\ContactsFakeNames;
use Numbers\Audiences\Audiences\Model\Contacts;
use Numbers\FakeNames\FakeNames\FakerFactory;

class ContactsDevSeeder extends SeederBase
{
    public $db_link = 'default';
    public $seeder_name = 'A/U Contacts Dev Seeder';

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
        $collection = new ContactsCollection();
        $names = FakerFactory::create();
        // 50 random audiences
        $audiences = $names->getStoredModelValues('\Numbers\Audiences\Audiences\Model\Audiences', 'id', 50);
        foreach ($audiences as $a) {
            for ($i = 1; $i <= 50; $i++) {
                $index = $a * 10_000 + $i;
                $au_contact_code = $this->names->generateModelCode('CON_SDR_', 22, $index);
                $existing = Contacts::getStatic([
                    'where' => [
                        'au_contact_tenant_id' => $tenant_id,
                        'au_contact_code' => $au_contact_code,
                    ],
                    'pk' => null,
                    'single_row' => true,
                ]);
                if ($existing) {
                    continue;
                }
                // generate records
                $role = ContactsFakeNames::generate($au_contact_code, [
                    'au_audience_id' => $a,
                ]);
                $result = $collection->merge($role);
                if (!$result['success']) {
                    throw new \Exception2($result['error']);
                }
            }
        }
    }
}
