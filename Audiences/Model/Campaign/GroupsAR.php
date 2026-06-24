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

class GroupsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Groups::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_campgrp_tenant_id','au_campgrp_au_campaign_id','au_campgrp_au_group_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_campgrp_tenant_id = null {
        get => $this->au_campgrp_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_campgrp_tenant_id', $value);
            $this->au_campgrp_tenant_id = $value;
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
    public int|null $au_campgrp_au_campaign_id = null {
        get => $this->au_campgrp_au_campaign_id;
        set {
            $this->setFullPkAndFilledColumn('au_campgrp_au_campaign_id', $value);
            $this->au_campgrp_au_campaign_id = $value;
        }
    }

    /**
     * Group #
     *
     *
     *
     * {domain{group_id}}
     *
     * @var int|null Domain: group_id Type: integer
     */
    public int|null $au_campgrp_au_group_id = null {
        get => $this->au_campgrp_au_group_id;
        set {
            $this->setFullPkAndFilledColumn('au_campgrp_au_group_id', $value);
            $this->au_campgrp_au_group_id = $value;
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
    public int|null $au_campgrp_inactive = 0 {
        get => $this->au_campgrp_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_campgrp_inactive', $value);
            $this->au_campgrp_inactive = $value;
        }
    }
}
