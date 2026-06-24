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

class SegmentsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Segments::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_campsegm_tenant_id','au_campsegm_au_campaign_id','au_campsegm_au_segment_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_campsegm_tenant_id = null {
        get => $this->au_campsegm_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_campsegm_tenant_id', $value);
            $this->au_campsegm_tenant_id = $value;
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
    public int|null $au_campsegm_au_campaign_id = null {
        get => $this->au_campsegm_au_campaign_id;
        set {
            $this->setFullPkAndFilledColumn('au_campsegm_au_campaign_id', $value);
            $this->au_campsegm_au_campaign_id = $value;
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
    public int|null $au_campsegm_au_segment_id = null {
        get => $this->au_campsegm_au_segment_id;
        set {
            $this->setFullPkAndFilledColumn('au_campsegm_au_segment_id', $value);
            $this->au_campsegm_au_segment_id = $value;
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
    public int|null $au_campsegm_inactive = 0 {
        get => $this->au_campsegm_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_campsegm_inactive', $value);
            $this->au_campsegm_inactive = $value;
        }
    }
}
