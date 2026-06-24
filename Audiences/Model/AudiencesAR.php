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

class AudiencesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Audiences::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_audience_tenant_id','au_audience_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_audience_tenant_id = null {
        get => $this->au_audience_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_audience_tenant_id', $value);
            $this->au_audience_tenant_id = $value;
        }
    }

    /**
     * Audience #
     *
     *
     *
     * {domain{audience_id_sequence}}
     *
     * @var int|null Domain: audience_id_sequence Type: serial
     */
    public int|null $au_audience_id = null {
        get => $this->au_audience_id;
        set {
            $this->setFullPkAndFilledColumn('au_audience_id', $value);
            $this->au_audience_id = $value;
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
    public string|null $au_audience_code = null {
        get => $this->au_audience_code;
        set {
            $this->setFullPkAndFilledColumn('au_audience_code', $value);
            $this->au_audience_code = $value;
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
    public string|null $au_audience_name = null {
        get => $this->au_audience_name;
        set {
            $this->setFullPkAndFilledColumn('au_audience_name', $value);
            $this->au_audience_name = $value;
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
    public int|null $au_audience_in_group_id = null {
        get => $this->au_audience_in_group_id;
        set {
            $this->setFullPkAndFilledColumn('au_audience_in_group_id', $value);
            $this->au_audience_in_group_id = $value;
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
    public int|null $au_audience_inactive = 0 {
        get => $this->au_audience_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_audience_inactive', $value);
            $this->au_audience_inactive = $value;
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
    public string|null $au_audience_optimistic_lock = 'now()' {
        get => $this->au_audience_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('au_audience_optimistic_lock', $value);
            $this->au_audience_optimistic_lock = $value;
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
    public string|null $au_audience_inserted_timestamp = null {
        get => $this->au_audience_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_audience_inserted_timestamp', $value);
            $this->au_audience_inserted_timestamp = $value;
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
    public int|null $au_audience_inserted_user_id = null {
        get => $this->au_audience_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_audience_inserted_user_id', $value);
            $this->au_audience_inserted_user_id = $value;
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
    public string|null $au_audience_updated_timestamp = null {
        get => $this->au_audience_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_audience_updated_timestamp', $value);
            $this->au_audience_updated_timestamp = $value;
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
    public int|null $au_audience_updated_user_id = null {
        get => $this->au_audience_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_audience_updated_user_id', $value);
            $this->au_audience_updated_user_id = $value;
        }
    }
}
