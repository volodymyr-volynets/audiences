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

class CampaignsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Campaigns::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_campaign_tenant_id','au_campaign_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_campaign_tenant_id = null {
        get => $this->au_campaign_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_tenant_id', $value);
            $this->au_campaign_tenant_id = $value;
        }
    }

    /**
     * Campaign #
     *
     *
     *
     * {domain{campaign_id_sequence}}
     *
     * @var int|null Domain: campaign_id_sequence Type: serial
     */
    public int|null $au_campaign_id = null {
        get => $this->au_campaign_id;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_id', $value);
            $this->au_campaign_id = $value;
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
    public string|null $au_campaign_code = null {
        get => $this->au_campaign_code;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_code', $value);
            $this->au_campaign_code = $value;
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
    public string|null $au_campaign_name = null {
        get => $this->au_campaign_name;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_name', $value);
            $this->au_campaign_name = $value;
        }
    }

    /**
     * I/N Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $au_campaign_in_group_id = null {
        get => $this->au_campaign_in_group_id;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_in_group_id', $value);
            $this->au_campaign_in_group_id = $value;
        }
    }

    /**
     * Type
     *
     *
     * {options_model{\Numbers\Audiences\Audiences\Model\Campaign\CampaignTypes}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_campaign_au_camptype_code = null {
        get => $this->au_campaign_au_camptype_code;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_au_camptype_code', $value);
            $this->au_campaign_au_camptype_code = $value;
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
    public int|null $au_campaign_au_sender_id = null {
        get => $this->au_campaign_au_sender_id;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_au_sender_id', $value);
            $this->au_campaign_au_sender_id = $value;
        }
    }

    /**
     * Status
     *
     *
     * {options_model{\Numbers\Audiences\Audiences\Model\Campaign\CampaignStatuses}}
     * {domain{status_code}}
     *
     * @var string|null Domain: status_code Type: varchar
     */
    public string|null $au_campaign_au_campstatus_code = null {
        get => $this->au_campaign_au_campstatus_code;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_au_campstatus_code', $value);
            $this->au_campaign_au_campstatus_code = $value;
        }
    }

    /**
     * Page #
     *
     *
     *
     * {domain{page_id}}
     *
     * @var int|null Domain: page_id Type: bigint
     */
    public int|null $au_campaign_t9_page_id = null {
        get => $this->au_campaign_t9_page_id;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_t9_page_id', $value);
            $this->au_campaign_t9_page_id = $value;
        }
    }

    /**
     * Layout Code
     *
     *
     *
     * {domain{layout_code}}
     *
     * @var string|null Domain: layout_code Type: varchar
     */
    public string|null $au_campaign_t9_layout_code = null {
        get => $this->au_campaign_t9_layout_code;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_t9_layout_code', $value);
            $this->au_campaign_t9_layout_code = $value;
        }
    }

    /**
     * SMS Template #
     *
     *
     *
     * {domain{template_id}}
     *
     * @var int|null Domain: template_id Type: integer
     */
    public int|null $au_campaign_t9_smstemplate_id = null {
        get => $this->au_campaign_t9_smstemplate_id;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_t9_smstemplate_id', $value);
            $this->au_campaign_t9_smstemplate_id = $value;
        }
    }

    /**
     * WhatsApp Template #
     *
     *
     *
     * {domain{template_id}}
     *
     * @var int|null Domain: template_id Type: integer
     */
    public int|null $au_campaign_t9_wapptemplate_id = null {
        get => $this->au_campaign_t9_wapptemplate_id;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_t9_wapptemplate_id', $value);
            $this->au_campaign_t9_wapptemplate_id = $value;
        }
    }

    /**
     * Message (Plain)
     *
     *
     *
     * {domain{message}}
     *
     * @var string|null Domain: message Type: text
     */
    public string|null $au_campaign_plain_message = null {
        get => $this->au_campaign_plain_message;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_plain_message', $value);
            $this->au_campaign_plain_message = $value;
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
    public string|null $au_campaign_subject = null {
        get => $this->au_campaign_subject;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_subject', $value);
            $this->au_campaign_subject = $value;
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
    public int|null $au_campaign_important = 0 {
        get => $this->au_campaign_important;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_important', $value);
            $this->au_campaign_important = $value;
        }
    }

    /**
     * Postponed Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $au_campaign_postponed_datetime = null {
        get => $this->au_campaign_postponed_datetime;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_postponed_datetime', $value);
            $this->au_campaign_postponed_datetime = $value;
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
    public int|null $au_campaign_inactive = 0 {
        get => $this->au_campaign_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_inactive', $value);
            $this->au_campaign_inactive = $value;
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
    public string|null $au_campaign_optimistic_lock = 'now()' {
        get => $this->au_campaign_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_optimistic_lock', $value);
            $this->au_campaign_optimistic_lock = $value;
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
    public string|null $au_campaign_inserted_timestamp = null {
        get => $this->au_campaign_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_inserted_timestamp', $value);
            $this->au_campaign_inserted_timestamp = $value;
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
    public int|null $au_campaign_inserted_user_id = null {
        get => $this->au_campaign_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_inserted_user_id', $value);
            $this->au_campaign_inserted_user_id = $value;
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
    public string|null $au_campaign_updated_timestamp = null {
        get => $this->au_campaign_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_updated_timestamp', $value);
            $this->au_campaign_updated_timestamp = $value;
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
    public int|null $au_campaign_updated_user_id = null {
        get => $this->au_campaign_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_campaign_updated_user_id', $value);
            $this->au_campaign_updated_user_id = $value;
        }
    }
}
