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

class ContactsFakeNames
{
    public static function generate(string $code, array $options = []): array
    {
        $names = FakerFactory::create();
        // generate data
        $result = [
            'au_contact_tenant_id' => \Tenant::id(),
            'au_contact_code' => $code,
            // user
            'au_contact_um_usrtype_id' => $names->randomFromArray([10, 20, 30, 40, 50]),
            'au_contact_um_user_id' => null,
            'au_contact_um_usrgrp_id' => null,
            // name
            'au_contact_name' => $names->full_name,
            'au_contact_company' => $names->company_saved,
            // personal information
            'au_contact_title' => $names->title,
            'au_contact_first_name' => $names->first_name,
            'au_contact_last_name' => $names->last_name,
            // contact
            'au_contact_email' => $names->email,
            'au_contact_email2' => null,
            'au_contact_phone' => $names->phone__digits_11__start_1__format_y,
            'au_contact_numeric_phone' => $names->phone_numeric__digits_11__start_1__format_y,
            'au_contact_phone2' => null,
            'au_contact_cell' => $names->cell__digits_11__start_1__format_y,
            'au_contact_fax' => $names->fax__digits_11__start_1__format_y,
            'au_contact_whatsapp' => $names->whatsapp__digits_11__start_1,
            'au_contact_alternative_contact' => null,
            // operating country / province / currency code & type
            'au_contact_operating_country_code' => $names->country_code,
            'au_contact_operating_province_code' => $names->province_code,
            'au_contact_operating_currency_code' => null,
            'au_contact_operating_currency_type' => null,
            // tracking
            'au_contact_send_emails' => 1,
            'au_contact_send_sms' => 1,
            'au_contact_send_postal' => 1,
            'au_contact_send_whatsapp' => 1,
            'au_contact_email_confirmed' => 0,
            'au_contact_phone_confirmed' => 0,
            'au_contact_whatsapp_confirmed' => 0,
            'au_contact_postal_confirmed' => 0,
            // other
            'au_contact_ip' => $names->ipv4,
            // inactive & hold
            'au_contact_hold' => 0,
            'au_contact_inactive' => 0,
            '\Numbers\Audiences\Audiences\Model\Contacts\0Virtual0\Widgets\Addresses' => [
                [
                    'wg_address_type_code' => $names->getStoredModelValues('\Numbers\Countries\Countries\Model\Address\Types', 'code', 1),
                    'wg_address_primary' => 1,
                    'wg_address_address1' => $names->address,
                    'wg_address_address2' => $names->address2,
                    'wg_address_city' => $names->city,
                    'wg_address_province_code' => $names->province_code,
                    'wg_address_postal_code' => $names->postal_code,
                    'wg_address_country_code' => $names->country_code,
                    'wg_address_inactive' => 0,
                ]
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Audiences' => [
                [
                    'au_contaud_au_audience_id' => $options['au_audience_id'] ?? $names->getStoredModelValues('\Numbers\Audiences\Audiences\Model\Audiences', 'id', 1),
                    'au_contaud_inactive' => 0,
                ]
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Groups' => [
                [
                    'au_contgrp_au_group_id' => $names->getStoredModelValues('\Numbers\Audiences\Audiences\Model\Groups', 'id', 1),
                ]
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Organizations' => [
                [
                    'au_contorg_on_organization_id' => $names->getStoredModelValues('\Numbers\Users\Organizations\Model\Organizations', 'id', 1),
                    'au_contorg_primary' => 1,
                    'au_contorg_inactive' => 0,
                ]
            ]
        ];
        return $result;
    }
}
