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

class SendersAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Senders::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_sender_tenant_id','au_sender_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_sender_tenant_id = null {
        get => $this->au_sender_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_sender_tenant_id', $value);
            $this->au_sender_tenant_id = $value;
        }
    }

    /**
     * Sender #
     *
     *
     *
     * {domain{sender_id_sequence}}
     *
     * @var int|null Domain: sender_id_sequence Type: serial
     */
    public int|null $au_sender_id = null {
        get => $this->au_sender_id;
        set {
            $this->setFullPkAndFilledColumn('au_sender_id', $value);
            $this->au_sender_id = $value;
        }
    }

    /**
     * Code
     *
     *
     *
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_sender_code = null {
        get => $this->au_sender_code;
        set {
            $this->setFullPkAndFilledColumn('au_sender_code', $value);
            $this->au_sender_code = $value;
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
    public string|null $au_sender_name = null {
        get => $this->au_sender_name;
        set {
            $this->setFullPkAndFilledColumn('au_sender_name', $value);
            $this->au_sender_name = $value;
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
    public string|null $au_sender_au_camptype_code = null {
        get => $this->au_sender_au_camptype_code;
        set {
            $this->setFullPkAndFilledColumn('au_sender_au_camptype_code', $value);
            $this->au_sender_au_camptype_code = $value;
        }
    }

    /**
     * Profile #
     *
     *
     *
     * {domain{profile_id}}
     *
     * @var int|null Domain: profile_id Type: integer
     */
    public int|null $au_sender_sm_mailprofile_id = null {
        get => $this->au_sender_sm_mailprofile_id;
        set {
            $this->setFullPkAndFilledColumn('au_sender_sm_mailprofile_id', $value);
            $this->au_sender_sm_mailprofile_id = $value;
        }
    }

    /**
     * Detail #
     *
     *
     *
     * {domain{detail_id}}
     *
     * @var int|null Domain: detail_id Type: integer
     */
    public int|null $au_sender_sm_mailprosndr_id = null {
        get => $this->au_sender_sm_mailprosndr_id;
        set {
            $this->setFullPkAndFilledColumn('au_sender_sm_mailprosndr_id', $value);
            $this->au_sender_sm_mailprosndr_id = $value;
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
    public string|null $au_sender_email = null {
        get => $this->au_sender_email;
        set {
            $this->setFullPkAndFilledColumn('au_sender_email', $value);
            $this->au_sender_email = $value;
        }
    }

    /**
     * Profile #
     *
     *
     *
     * {domain{profile_id}}
     *
     * @var int|null Domain: profile_id Type: integer
     */
    public int|null $au_sender_sm_smsprofile_id = null {
        get => $this->au_sender_sm_smsprofile_id;
        set {
            $this->setFullPkAndFilledColumn('au_sender_sm_smsprofile_id', $value);
            $this->au_sender_sm_smsprofile_id = $value;
        }
    }

    /**
     * Detail #
     *
     *
     *
     * {domain{detail_id}}
     *
     * @var int|null Domain: detail_id Type: integer
     */
    public int|null $au_sender_sm_smsprosndr_id = null {
        get => $this->au_sender_sm_smsprosndr_id;
        set {
            $this->setFullPkAndFilledColumn('au_sender_sm_smsprosndr_id', $value);
            $this->au_sender_sm_smsprosndr_id = $value;
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
    public string|null $au_sender_phone = null {
        get => $this->au_sender_phone;
        set {
            $this->setFullPkAndFilledColumn('au_sender_phone', $value);
            $this->au_sender_phone = $value;
        }
    }

    /**
     * Verified
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_sender_verified = 0 {
        get => $this->au_sender_verified;
        set {
            $this->setFullPkAndFilledColumn('au_sender_verified', $value);
            $this->au_sender_verified = $value;
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
    public int|null $au_sender_inactive = 0 {
        get => $this->au_sender_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_sender_inactive', $value);
            $this->au_sender_inactive = $value;
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
    public string|null $au_sender_optimistic_lock = 'now()' {
        get => $this->au_sender_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('au_sender_optimistic_lock', $value);
            $this->au_sender_optimistic_lock = $value;
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
    public string|null $au_sender_inserted_timestamp = null {
        get => $this->au_sender_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_sender_inserted_timestamp', $value);
            $this->au_sender_inserted_timestamp = $value;
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
    public int|null $au_sender_inserted_user_id = null {
        get => $this->au_sender_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_sender_inserted_user_id', $value);
            $this->au_sender_inserted_user_id = $value;
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
    public string|null $au_sender_updated_timestamp = null {
        get => $this->au_sender_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_sender_updated_timestamp', $value);
            $this->au_sender_updated_timestamp = $value;
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
    public int|null $au_sender_updated_user_id = null {
        get => $this->au_sender_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_sender_updated_user_id', $value);
            $this->au_sender_updated_user_id = $value;
        }
    }
}
