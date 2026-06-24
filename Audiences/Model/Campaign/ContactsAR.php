<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Campaign;

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
    public array $object_table_pk = ['au_campcont_tenant_id','au_campcont_au_campaign_id','au_campcont_au_contact_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_campcont_tenant_id = null {
        get => $this->au_campcont_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_tenant_id', $value);
            $this->au_campcont_tenant_id = $value;
        }
    }

    /**
     * Campaign #
     *
     *
     *
     * {domain{campaign_id}}
     *
     * @var int|null Domain: campaign_id Type: integer
     */
    public int|null $au_campcont_au_campaign_id = null {
        get => $this->au_campcont_au_campaign_id;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_au_campaign_id', $value);
            $this->au_campcont_au_campaign_id = $value;
        }
    }

    /**
     * Contact #
     *
     *
     *
     * {domain{contact_id}}
     *
     * @var int|null Domain: contact_id Type: bigint
     */
    public int|null $au_campcont_au_contact_id = null {
        get => $this->au_campcont_au_contact_id;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_au_contact_id', $value);
            $this->au_campcont_au_contact_id = $value;
        }
    }

    /**
     * Type
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_campcont_au_camptype_code = null {
        get => $this->au_campcont_au_camptype_code;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_au_camptype_code', $value);
            $this->au_campcont_au_camptype_code = $value;
        }
    }

    /**
     * Status
     *
     *
     *
     * {domain{status_code}}
     *
     * @var string|null Domain: status_code Type: varchar
     */
    public string|null $au_campcont_au_campstatus_code = null {
        get => $this->au_campcont_au_campstatus_code;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_au_campstatus_code', $value);
            $this->au_campcont_au_campstatus_code = $value;
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
    public string|null $au_campcont_name = null {
        get => $this->au_campcont_name;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_name', $value);
            $this->au_campcont_name = $value;
        }
    }

    /**
     * Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $au_campcont_email = null {
        get => $this->au_campcont_email;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_email', $value);
            $this->au_campcont_email = $value;
        }
    }

    /**
     * Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $au_campcont_phone = null {
        get => $this->au_campcont_phone;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_phone', $value);
            $this->au_campcont_phone = $value;
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
    public string|null $au_campcont_whatsapp = null {
        get => $this->au_campcont_whatsapp;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_whatsapp', $value);
            $this->au_campcont_whatsapp = $value;
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
    public string|null $au_campcont_fax = null {
        get => $this->au_campcont_fax;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_fax', $value);
            $this->au_campcont_fax = $value;
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
    public int|null $au_campcont_um_user_id = null {
        get => $this->au_campcont_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_um_user_id', $value);
            $this->au_campcont_um_user_id = $value;
        }
    }

    /**
     * Sender #
     *
     *
     *
     * {domain{sender_id}}
     *
     * @var int|null Domain: sender_id Type: integer
     */
    public int|null $au_campcont_au_sender_id = null {
        get => $this->au_campcont_au_sender_id;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_au_sender_id', $value);
            $this->au_campcont_au_sender_id = $value;
        }
    }

    /**
     * Sender Phone
     *
     *
     *
     * {domain{phone}}
     *
     * @var string|null Domain: phone Type: varchar
     */
    public string|null $au_campcont_sender_phone = null {
        get => $this->au_campcont_sender_phone;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_sender_phone', $value);
            $this->au_campcont_sender_phone = $value;
        }
    }

    /**
     * Sender Email
     *
     *
     *
     * {domain{email}}
     *
     * @var string|null Domain: email Type: varchar
     */
    public string|null $au_campcont_sender_email = null {
        get => $this->au_campcont_sender_email;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_sender_email', $value);
            $this->au_campcont_sender_email = $value;
        }
    }

    /**
     * Subject
     *
     *
     *
     * {domain{subject}}
     *
     * @var string|null Domain: subject Type: varchar
     */
    public string|null $au_campcont_subject = null {
        get => $this->au_campcont_subject;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_subject', $value);
            $this->au_campcont_subject = $value;
        }
    }

    /**
     * Important
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_campcont_important = 0 {
        get => $this->au_campcont_important;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_important', $value);
            $this->au_campcont_important = $value;
        }
    }

    /**
     * Message #
     *
     *
     *
     * {domain{message_id}}
     *
     * @var int|null Domain: message_id Type: bigint
     */
    public int|null $au_campcont_um_mesbody_id = null {
        get => $this->au_campcont_um_mesbody_id;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_um_mesbody_id', $value);
            $this->au_campcont_um_mesbody_id = $value;
        }
    }

    /**
     * Inactive
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_campcont_inactive = 0 {
        get => $this->au_campcont_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_inactive', $value);
            $this->au_campcont_inactive = $value;
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
    public string|null $au_campcont_inserted_timestamp = null {
        get => $this->au_campcont_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_inserted_timestamp', $value);
            $this->au_campcont_inserted_timestamp = $value;
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
    public int|null $au_campcont_inserted_user_id = null {
        get => $this->au_campcont_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_inserted_user_id', $value);
            $this->au_campcont_inserted_user_id = $value;
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
    public string|null $au_campcont_updated_timestamp = null {
        get => $this->au_campcont_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_updated_timestamp', $value);
            $this->au_campcont_updated_timestamp = $value;
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
    public int|null $au_campcont_updated_user_id = null {
        get => $this->au_campcont_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_campcont_updated_user_id', $value);
            $this->au_campcont_updated_user_id = $value;
        }
    }
}
