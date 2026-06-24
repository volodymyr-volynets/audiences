<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Audience;

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
    public array $object_table_pk = ['au_audgrp_tenant_id','au_audgrp_au_audience_id','au_audgrp_au_group_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_audgrp_tenant_id = null {
        get => $this->au_audgrp_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_audgrp_tenant_id', $value);
            $this->au_audgrp_tenant_id = $value;
        }
    }

    /**
     * Audience #
     *
     *
     *
     * {domain{audience_id}}
     *
     * @var int|null Domain: audience_id Type: integer
     */
    public int|null $au_audgrp_au_audience_id = null {
        get => $this->au_audgrp_au_audience_id;
        set {
            $this->setFullPkAndFilledColumn('au_audgrp_au_audience_id', $value);
            $this->au_audgrp_au_audience_id = $value;
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
    public int|null $au_audgrp_au_group_id = null {
        get => $this->au_audgrp_au_group_id;
        set {
            $this->setFullPkAndFilledColumn('au_audgrp_au_group_id', $value);
            $this->au_audgrp_au_group_id = $value;
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
    public int|null $au_audgrp_inactive = 0 {
        get => $this->au_audgrp_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_audgrp_inactive', $value);
            $this->au_audgrp_inactive = $value;
        }
    }
}
