<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Segment\Detail;

use Object\ActiveRecord;

class ValuesIDsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = ValuesIDs::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_segdetvalids_tenant_id','au_segdetvalids_au_segment_id','au_segdetvalids_au_segdetail_id','au_segdetvalids_value_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_segdetvalids_tenant_id = null {
        get => $this->au_segdetvalids_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_segdetvalids_tenant_id', $value);
            $this->au_segdetvalids_tenant_id = $value;
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
    public int|null $au_segdetvalids_au_segment_id = null {
        get => $this->au_segdetvalids_au_segment_id;
        set {
            $this->setFullPkAndFilledColumn('au_segdetvalids_au_segment_id', $value);
            $this->au_segdetvalids_au_segment_id = $value;
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
    public int|null $au_segdetvalids_au_segdetail_id = null {
        get => $this->au_segdetvalids_au_segdetail_id;
        set {
            $this->setFullPkAndFilledColumn('au_segdetvalids_au_segdetail_id', $value);
            $this->au_segdetvalids_au_segdetail_id = $value;
        }
    }

    /**
     * Value #
     *
     *
     *
     * {domain{big_id}}
     *
     * @var int|null Domain: big_id Type: bigint
     */
    public int|null $au_segdetvalids_value_id = null {
        get => $this->au_segdetvalids_value_id;
        set {
            $this->setFullPkAndFilledColumn('au_segdetvalids_value_id', $value);
            $this->au_segdetvalids_value_id = $value;
        }
    }
}
