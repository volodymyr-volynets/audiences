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

class SegmentsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Segments::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_segment_tenant_id','au_segment_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_segment_tenant_id = null {
        get => $this->au_segment_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_segment_tenant_id', $value);
            $this->au_segment_tenant_id = $value;
        }
    }

    /**
     * Segment #
     *
     *
     *
     * {domain{segment_id_sequence}}
     *
     * @var int|null Domain: segment_id_sequence Type: serial
     */
    public int|null $au_segment_id = null {
        get => $this->au_segment_id;
        set {
            $this->setFullPkAndFilledColumn('au_segment_id', $value);
            $this->au_segment_id = $value;
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
    public string|null $au_segment_code = null {
        get => $this->au_segment_code;
        set {
            $this->setFullPkAndFilledColumn('au_segment_code', $value);
            $this->au_segment_code = $value;
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
    public string|null $au_segment_name = null {
        get => $this->au_segment_name;
        set {
            $this->setFullPkAndFilledColumn('au_segment_name', $value);
            $this->au_segment_name = $value;
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
    public int|null $au_segment_inactive = 0 {
        get => $this->au_segment_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_segment_inactive', $value);
            $this->au_segment_inactive = $value;
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
    public string|null $au_segment_optimistic_lock = 'now()' {
        get => $this->au_segment_optimistic_lock;
        set {
            $this->setFullPkAndFilledColumn('au_segment_optimistic_lock', $value);
            $this->au_segment_optimistic_lock = $value;
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
    public string|null $au_segment_inserted_timestamp = null {
        get => $this->au_segment_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_segment_inserted_timestamp', $value);
            $this->au_segment_inserted_timestamp = $value;
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
    public int|null $au_segment_inserted_user_id = null {
        get => $this->au_segment_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_segment_inserted_user_id', $value);
            $this->au_segment_inserted_user_id = $value;
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
    public string|null $au_segment_updated_timestamp = null {
        get => $this->au_segment_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_segment_updated_timestamp', $value);
            $this->au_segment_updated_timestamp = $value;
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
    public int|null $au_segment_updated_user_id = null {
        get => $this->au_segment_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('au_segment_updated_user_id', $value);
            $this->au_segment_updated_user_id = $value;
        }
    }
}
