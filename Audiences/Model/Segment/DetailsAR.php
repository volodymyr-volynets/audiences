<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Segment;

use Object\ActiveRecord;

class DetailsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Details::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_segdetail_tenant_id','au_segdetail_au_segment_id','au_segdetail_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_segdetail_tenant_id = null {
        get => $this->au_segdetail_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_tenant_id', $value);
            $this->au_segdetail_tenant_id = $value;
        }
    }

    /**
     * Segment #
     *
     *
     *
     * {domain{segment_id}}
     *
     * @var int|null Domain: segment_id Type: integer
     */
    public int|null $au_segdetail_au_segment_id = null {
        get => $this->au_segdetail_au_segment_id;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_au_segment_id', $value);
            $this->au_segdetail_au_segment_id = $value;
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
    public int|null $au_segdetail_id = null {
        get => $this->au_segdetail_id;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_id', $value);
            $this->au_segdetail_id = $value;
        }
    }

    /**
     * Operator
     *
     *
     * {options_model{\Numbers\Audiences\Audiences\Model\Segment\Operators}}
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $au_segdetail_operator = null {
        get => $this->au_segdetail_operator;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_operator', $value);
            $this->au_segdetail_operator = $value;
        }
    }

    /**
     * Field
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $au_segdetail_field = null {
        get => $this->au_segdetail_field;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_field', $value);
            $this->au_segdetail_field = $value;
        }
    }

    /**
     * Field Type
     *
     *
     *
     * {domain{type_code}}
     *
     * @var string|null Domain: type_code Type: varchar
     */
    public string|null $au_segdetail_sm_sharetype_code = null {
        get => $this->au_segdetail_sm_sharetype_code;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_sm_sharetype_code', $value);
            $this->au_segdetail_sm_sharetype_code = $value;
        }
    }

    /**
     * Group
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $au_segdetail_group = null {
        get => $this->au_segdetail_group;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_group', $value);
            $this->au_segdetail_group = $value;
        }
    }

    /**
     * Options Value #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $au_segdetail_options_value_id = null {
        get => $this->au_segdetail_options_value_id;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_options_value_id', $value);
            $this->au_segdetail_options_value_id = $value;
        }
    }

    /**
     * Options Value Code
     *
     *
     *
     *
     *
     * @var string|null Type: text
     */
    public string|null $au_segdetail_options_value_code = null {
        get => $this->au_segdetail_options_value_code;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_options_value_code', $value);
            $this->au_segdetail_options_value_code = $value;
        }
    }

    /**
     * Range Value 1
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $au_segdetail_range_value_id1 = null {
        get => $this->au_segdetail_range_value_id1;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_range_value_id1', $value);
            $this->au_segdetail_range_value_id1 = $value;
        }
    }

    /**
     * Range Value 2
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $au_segdetail_range_value_id2 = null {
        get => $this->au_segdetail_range_value_id2;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_range_value_id2', $value);
            $this->au_segdetail_range_value_id2 = $value;
        }
    }

    /**
     * Order
     *
     *
     *
     * {domain{order}}
     *
     * @var int|null Domain: order Type: integer
     */
    public int|null $au_segdetail_order = 0 {
        get => $this->au_segdetail_order;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_order', $value);
            $this->au_segdetail_order = $value;
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
    public int|null $au_segdetail_inactive = 0 {
        get => $this->au_segdetail_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_segdetail_inactive', $value);
            $this->au_segdetail_inactive = $value;
        }
    }
}
