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

class Contacts extends Collection
{
    public $data = [
        'name' => 'AU Contacts',
        'model' => '\Numbers\Audiences\Audiences\Model\Contacts',
        'details' => [
            '\Numbers\Audiences\Audiences\Model\Contact\Audiences' => [
                'name' => 'AU Contact Audiences',
                'pk' => ['au_contaud_tenant_id', 'au_contaud_au_contact_id', 'au_contaud_au_audience_id'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'au_contaud_tenant_id', 'au_contact_id' => 'au_contaud_au_contact_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Groups' => [
                'name' => 'AU Contact Groups',
                'pk' => ['au_contgrp_tenant_id', 'au_contgrp_au_contact_id', 'au_contgrp_au_group_id'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'au_contgrp_tenant_id', 'au_contact_id' => 'au_contgrp_au_contact_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Organizations' => [
                'name' => 'AU Contact Organizations',
                'pk' => ['au_contorg_tenant_id', 'au_contorg_au_contact_id', 'au_contorg_on_organization_id'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'au_contorg_tenant_id', 'au_contact_id' => 'au_contorg_au_contact_id'],
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\PIIs' => [
                'name' => 'AU Contact Demographics',
                'pk' => ['au_contpii_tenant_id', 'au_contpii_au_contact_id'],
                'type' => '11',
                'map' => ['au_contact_tenant_id' => 'au_contpii_tenant_id', 'au_contact_id' => 'au_contpii_au_contact_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Languages' => [
                'name' => 'AU Contact Languages',
                'pk' => ['au_contsplang_tenant_id', 'au_contsplang_au_contact_id', 'au_contsplang_language_code'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'au_contsplang_tenant_id', 'au_contact_id' => 'au_contsplang_au_contact_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Skills' => [
                'name' => 'AU Contact Skills',
                'pk' => ['au_contskill_tenant_id', 'au_contskill_au_contact_id', 'au_contskill_name'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'au_contskill_tenant_id', 'au_contact_id' => 'au_contskill_au_contact_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Contacts\0Virtual0\Widgets\Addresses' => [
                'name' => 'AU Contact Addresses',
                'pk' => ['wg_address_tenant_id', 'wg_address_au_contact_id', 'wg_address_type_code'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'wg_address_tenant_id', 'au_contact_id' => 'wg_address_au_contact_id']
            ]
        ]
    ];
}
