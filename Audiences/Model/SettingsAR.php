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

class SettingsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Settings::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_setting_tenant_id','au_setting_module_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_setting_tenant_id = null {
        get => $this->au_setting_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_setting_tenant_id', $value);
            $this->au_setting_tenant_id = $value;
        }
    }

    /**
     * Module #
     *
     *
     *
     * {domain{module_id}}
     *
     * @var int|null Domain: module_id Type: integer
     */
    public int|null $au_setting_module_id = null {
        get => $this->au_setting_module_id;
        set {
            $this->setFullPkAndFilledColumn('au_setting_module_id', $value);
            $this->au_setting_module_id = $value;
        }
    }

    /**
     * Email Sender #
     *
     *
     *
     * {domain{sender_id}}
     *
     * @var int|null Domain: sender_id Type: integer
     */
    public int|null $au_setting_email_au_sender_id = null {
        get => $this->au_setting_email_au_sender_id;
        set {
            $this->setFullPkAndFilledColumn('au_setting_email_au_sender_id', $value);
            $this->au_setting_email_au_sender_id = $value;
        }
    }

    /**
     * SMS Sender #
     *
     *
     *
     * {domain{sender_id}}
     *
     * @var int|null Domain: sender_id Type: integer
     */
    public int|null $au_setting_sms_au_sender_id = null {
        get => $this->au_setting_sms_au_sender_id;
        set {
            $this->setFullPkAndFilledColumn('au_setting_sms_au_sender_id', $value);
            $this->au_setting_sms_au_sender_id = $value;
        }
    }

    /**
     * WhatsApp Sender #
     *
     *
     *
     * {domain{sender_id}}
     *
     * @var int|null Domain: sender_id Type: integer
     */
    public int|null $au_setting_whatsapp_au_sender_id = null {
        get => $this->au_setting_whatsapp_au_sender_id;
        set {
            $this->setFullPkAndFilledColumn('au_setting_whatsapp_au_sender_id', $value);
            $this->au_setting_whatsapp_au_sender_id = $value;
        }
    }

    /**
     * Sequence
     *
     *
     *
     *
     *
     * @var int|null Type: bigserial
     */
    public int|null $au_setting_sequence = null {
        get => $this->au_setting_sequence;
        set {
            $this->setFullPkAndFilledColumn('au_setting_sequence', $value);
            $this->au_setting_sequence = $value;
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
    public int|null $au_setting_inactive = 0 {
        get => $this->au_setting_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_setting_inactive', $value);
            $this->au_setting_inactive = $value;
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
    public string|null $au_setting_optimistic_lock = 'now()' {
        get => $this->au_setting_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('au_setting_optimistic_lock', $value);
            $this->au_setting_optimistic_lock = $value;
        }
    }
}
