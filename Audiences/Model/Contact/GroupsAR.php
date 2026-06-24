<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Model\Contact;

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
    public array $object_table_pk = ['au_contgrp_tenant_id','au_contgrp_au_contact_id','au_contgrp_au_group_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_contgrp_tenant_id = null {
        get => $this->au_contgrp_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_contgrp_tenant_id', $value);
            $this->au_contgrp_tenant_id = $value;
        }
    }

    /**
     * Contact #
     *
     *
     *
     * {domain{contact_id}}
     *
     * @var int|null Domain: contact_id Type: bigint
     */
    public int|null $au_contgrp_au_contact_id = null {
        get => $this->au_contgrp_au_contact_id;
        set {
            $this->setFullPkAndFilledColumn('au_contgrp_au_contact_id', $value);
            $this->au_contgrp_au_contact_id = $value;
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
    public int|null $au_contgrp_au_group_id = null {
        get => $this->au_contgrp_au_group_id;
        set {
            $this->setFullPkAndFilledColumn('au_contgrp_au_group_id', $value);
            $this->au_contgrp_au_group_id = $value;
        }
    }
}
