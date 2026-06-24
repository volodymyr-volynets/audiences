<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model;

use Object\ActiveRecord;

class ContactsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Contacts::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_contact_tenant_id','au_contact_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_contact_tenant_id = null {
        get => $this->au_contact_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_contact_tenant_id', $value);
            $this->au_contact_tenant_id = $value;
        }
    }

    /**
     * Contact #
     *
     *
     *
     * {domain{contact_id_sequence}}
     *
     * @var int|null Domain: contact_id_sequence Type: bigserial
     */
    public int|null $au_contact_id = null {
        get => $this->au_contact_id;
        set {
            $this->setFullPkAndFilledColumn('au_contact_id', $value);
            $this->au_contact_id = $value;
        }
    }

    /**
     * Contact Number
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contact_code = null {
        get => $this->au_contact_code;
        set {
            $this->setFullPkAndFilledColumn('au_contact_code', $value);
            $this->au_contact_code = $value;
        }
    }

    /**
     * U/M User Type
     *
     *
     * {options_model{Numbers\Users\Users\Model\User\Types}}
     * {domain{type_id}}
     *
     * @var int|null Domain: type_id Type: smallint
     */
    public int|null $au_contact_um_usrtype_id = null {
        get => $this->au_contact_um_usrtype_id;
        set {
            $this->setFullPkAndFilledColumn('au_contact_um_usrtype_id', $value);
            $this->au_contact_um_usrtype_id = $value;
        }
    }

    /**
     * U/M User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $au_contact_um_user_id = null {
        get => $this->au_contact_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_contact_um_user_id', $value);
            $this->au_contact_um_user_id = $value;
        }
    }

    /**
     * U/M Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $au_contact_um_usrgrp_id = null {
        get => $this->au_contact_um_usrgrp_id;
        set {
            $this->setFullPkAndFilledColumn('au_contact_um_usrgrp_id', $value);
            $this->au_contact_um_usrgrp_id = $value;
        }
    }

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $au_contact_name = null {
        get => $this->au_contact_name;
        set {
            $this->setFullPkAndFilledColumn('au_contact_name', $value);
            $this->au_contact_name = $value;
        }
    }

    /**
     * Company
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $au_contact_company = null {
        get => $this->au_contact_company;
        set {
            $this->setFullPkAndFilledColumn('au_contact_company', $value);
            $this->au_contact_company = $value;
        }
    }

    /**
     * Title
     *
     *
     *
     * {domain{personal_title}}
     *
     * @var string|null Domain: personal_title Type: varchar
     */
    public string|null $au_contact_title = null {
        get => $this->au_contact_title;
        set {
            $this->setFullPkAndFilledColumn('au_contact_title', $value);
            $this->au_contact_title = $value;
        }
    }

    /**
     * First Name
     *
     *
     *
     * {domain{personal_name}}
     *
     * @var string|null Domain: personal_name Type: varchar
     */
    public string|null $au_contact_first_name = null {
        get => $this->au_contact_first_name;
        set {
            $this->setFullPkAndFilledColumn('au_contact_first_name', $value);
            $this->au_contact_first_name = $value;
        }
    }

    /**
     * Last Name
     *
     *
     *
     * {domain{personal_name}}
     *
     * @var string|null Domain: personal_name Type: varchar
     */
    public string|null $au_contact_last_name = null {
        get => $this->au_contact_last_name;
        set {
            $this->setFullPkAndFilledColumn('au_contact_last_name', $value);
            $this->au_contact_last_name = $value;
        }
    }

    /**
     * Primary Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $au_contact_email = null {
        get => $this->au_contact_email;
        set {
            $this->setFullPkAndFilledColumn('au_contact_email', $value);
            $this->au_contact_email = $value;
        }
    }

    /**
     * Secondary Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $au_contact_email2 = null {
        get => $this->au_contact_email2;
        set {
            $this->setFullPkAndFilledColumn('au_contact_email2', $value);
            $this->au_contact_email2 = $value;
        }
    }

    /**
     * Primary Phone (Generated)
     *
     * FORMATABLE
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $au_contact_phone = null {
        get => $this->au_contact_phone;
        set {
            $this->setFullPkAndFilledColumn('au_contact_phone', $value);
            $this->au_contact_phone = $value;
        }
    }

    /**
     * Primary Phone (Numeric)
     *
     *
     *
     * {domain{numeric_phone}}
     *
     * @var int|null Domain: numeric_phone Type: bigint
     */
    public int|null $au_contact_numeric_phone = null {
        get => $this->au_contact_numeric_phone;
        set {
            $this->setFullPkAndFilledColumn('au_contact_numeric_phone', $value);
            $this->au_contact_numeric_phone = $value;
        }
    }

    /**
     * Secondary Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $au_contact_phone2 = null {
        get => $this->au_contact_phone2;
        set {
            $this->setFullPkAndFilledColumn('au_contact_phone2', $value);
            $this->au_contact_phone2 = $value;
        }
    }

    /**
     * Cell Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $au_contact_cell = null {
        get => $this->au_contact_cell;
        set {
            $this->setFullPkAndFilledColumn('au_contact_cell', $value);
            $this->au_contact_cell = $value;
        }
    }

    /**
     * Fax
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $au_contact_fax = null {
        get => $this->au_contact_fax;
        set {
            $this->setFullPkAndFilledColumn('au_contact_fax', $value);
            $this->au_contact_fax = $value;
        }
    }

    /**
     * WhatsApp
     *
     *
     *
     * {domain{whatsapp}}
     *
     * @var string|null Domain: whatsapp Type: varchar
     */
    public string|null $au_contact_whatsapp = null {
        get => $this->au_contact_whatsapp;
        set {
            $this->setFullPkAndFilledColumn('au_contact_whatsapp', $value);
            $this->au_contact_whatsapp = $value;
        }
    }

    /**
     * Alternative Contact
     *
     *
     *
     * {domain{description}}
     *
     * @var string|null Domain: description Type: varchar
     */
    public string|null $au_contact_alternative_contact = null {
        get => $this->au_contact_alternative_contact;
        set {
            $this->setFullPkAndFilledColumn('au_contact_alternative_contact', $value);
            $this->au_contact_alternative_contact = $value;
        }
    }

    /**
     * Operating Country Code
     *
     *
     *
     * {domain{country_code}}
     *
     * @var string|null Domain: country_code Type: char
     */
    public string|null $au_contact_operating_country_code = null {
        get => $this->au_contact_operating_country_code;
        set {
            $this->setFullPkAndFilledColumn('au_contact_operating_country_code', $value);
            $this->au_contact_operating_country_code = $value;
        }
    }

    /**
     * Operating Province Code
     *
     *
     *
     * {domain{province_code}}
     *
     * @var string|null Domain: province_code Type: varchar
     */
    public string|null $au_contact_operating_province_code = null {
        get => $this->au_contact_operating_province_code;
        set {
            $this->setFullPkAndFilledColumn('au_contact_operating_province_code', $value);
            $this->au_contact_operating_province_code = $value;
        }
    }

    /**
     * Operating Currency Code
     *
     *
     *
     * {domain{currency_code}}
     *
     * @var string|null Domain: currency_code Type: char
     */
    public string|null $au_contact_operating_currency_code = null {
        get => $this->au_contact_operating_currency_code;
        set {
            $this->setFullPkAndFilledColumn('au_contact_operating_currency_code', $value);
            $this->au_contact_operating_currency_code = $value;
        }
    }

    /**
     * Operating Currency Type
     *
     *
     *
     * {domain{currency_type}}
     *
     * @var string|null Domain: currency_type Type: varchar
     */
    public string|null $au_contact_operating_currency_type = null {
        get => $this->au_contact_operating_currency_type;
        set {
            $this->setFullPkAndFilledColumn('au_contact_operating_currency_type', $value);
            $this->au_contact_operating_currency_type = $value;
        }
    }

    /**
     * Send Emails
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_contact_send_emails = 1 {
        get => $this->au_contact_send_emails;
        set {
            $this->setFullPkAndFilledColumn('au_contact_send_emails', $value);
            $this->au_contact_send_emails = $value;
        }
    }

    /**
     * Send SMS
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_contact_send_sms = 0 {
        get => $this->au_contact_send_sms;
        set {
            $this->setFullPkAndFilledColumn('au_contact_send_sms', $value);
            $this->au_contact_send_sms = $value;
        }
    }

    /**
     * Send Postal Mail
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_contact_send_postal = 0 {
        get => $this->au_contact_send_postal;
        set {
            $this->setFullPkAndFilledColumn('au_contact_send_postal', $value);
            $this->au_contact_send_postal = $value;
        }
    }

    /**
     * Send WhatsApp
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_contact_send_whatsapp = 0 {
        get => $this->au_contact_send_whatsapp;
        set {
            $this->setFullPkAndFilledColumn('au_contact_send_whatsapp', $value);
            $this->au_contact_send_whatsapp = $value;
        }
    }

    /**
     * Email Confirmed
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_contact_email_confirmed = 0 {
        get => $this->au_contact_email_confirmed;
        set {
            $this->setFullPkAndFilledColumn('au_contact_email_confirmed', $value);
            $this->au_contact_email_confirmed = $value;
        }
    }

    /**
     * Phone Confirmed
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_contact_phone_confirmed = 0 {
        get => $this->au_contact_phone_confirmed;
        set {
            $this->setFullPkAndFilledColumn('au_contact_phone_confirmed', $value);
            $this->au_contact_phone_confirmed = $value;
        }
    }

    /**
     * WhatsApp Confirmed
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_contact_whatsapp_confirmed = 0 {
        get => $this->au_contact_whatsapp_confirmed;
        set {
            $this->setFullPkAndFilledColumn('au_contact_whatsapp_confirmed', $value);
            $this->au_contact_whatsapp_confirmed = $value;
        }
    }

    /**
     * Postal Confirmed
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_contact_postal_confirmed = 0 {
        get => $this->au_contact_postal_confirmed;
        set {
            $this->setFullPkAndFilledColumn('au_contact_postal_confirmed', $value);
            $this->au_contact_postal_confirmed = $value;
        }
    }

    /**
     * IP
     *
     *
     *
     * {domain{ip}}
     *
     * @var string|null Domain: ip Type: varchar
     */
    public string|null $au_contact_ip = null {
        get => $this->au_contact_ip;
        set {
            $this->setFullPkAndFilledColumn('au_contact_ip', $value);
            $this->au_contact_ip = $value;
        }
    }

    /**
     * Hold (Generated)
     *
     * CASTABLE
     *
     *
     *
     * @var int|bool|null Type: boolean
     */
    public int|bool|null $au_contact_hold = 0 {
        get => $this->au_contact_hold;
        set {
            $this->setFullPkAndFilledColumn('au_contact_hold', $value);
            $this->au_contact_hold = $value;
        }
    }

    /**
     * Inactive (Generated)
     *
     * CASTABLE
     *
     *
     *
     * @var int|bool|null Type: boolean
     */
    public int|bool|null $au_contact_inactive = 0 {
        get => $this->au_contact_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_contact_inactive', $value);
            $this->au_contact_inactive = $value;
        }
    }

    /**
     * Optimistic Lock
     *
     *
     *
     * {domain{optimistic_lock}}
     *
     * @var string|null Domain: optimistic_lock Type: timestamp
     */
    public string|null $au_contact_optimistic_lock = 'now()' {
        get => $this->au_contact_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('au_contact_optimistic_lock', $value);
            $this->au_contact_optimistic_lock = $value;
        }
    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $au_contact_inserted_timestamp = null {
        get => $this->au_contact_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_contact_inserted_timestamp', $value);
            $this->au_contact_inserted_timestamp = $value;
        }
    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $au_contact_inserted_user_id = null {
        get => $this->au_contact_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_contact_inserted_user_id', $value);
            $this->au_contact_inserted_user_id = $value;
        }
    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $au_contact_updated_timestamp = null {
        get => $this->au_contact_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_contact_updated_timestamp', $value);
            $this->au_contact_updated_timestamp = $value;
        }
    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $au_contact_updated_user_id = null {
        get => $this->au_contact_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_contact_updated_user_id', $value);
            $this->au_contact_updated_user_id = $value;
        }
    }

    /**
     * (Generated) (Non Database)
     *
     * GENERABLE, READ_ONLY
     *
     * @var mixed
     */
    public $au_contact_name_assembled = null;
}
