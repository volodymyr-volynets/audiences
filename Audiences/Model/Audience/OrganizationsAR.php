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

class OrganizationsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_audorg_tenant_id','au_audorg_au_audience_id','au_audorg_on_organization_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_audorg_tenant_id = null {
        get => $this->au_audorg_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_audorg_tenant_id', $value);
            $this->au_audorg_tenant_id = $value;
        }
    }

    /**
     * Timestamp
     *
     *
     *
     * {domain{timestamp_now}}
     *
     * @var string|null Domain: timestamp_now Type: timestamp
     */
    public string|null $au_audorg_timestamp = 'now()' {
        get => $this->au_audorg_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_audorg_timestamp', $value);
            $this->au_audorg_timestamp = $value;
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
    public int|null $au_audorg_au_audience_id = null {
        get => $this->au_audorg_au_audience_id;
        set {
            $this->setFullPkAndFilledColumn('au_audorg_au_audience_id', $value);
            $this->au_audorg_au_audience_id = $value;
        }
    }

    /**
     * Organization #
     *
     *
     *
     * {domain{organization_id}}
     *
     * @var int|null Domain: organization_id Type: integer
     */
    public int|null $au_audorg_on_organization_id = null {
        get => $this->au_audorg_on_organization_id;
        set {
            $this->setFullPkAndFilledColumn('au_audorg_on_organization_id', $value);
            $this->au_audorg_on_organization_id = $value;
        }
    }

    /**
     * Primary
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_audorg_primary = 0 {
        get => $this->au_audorg_primary;
        set {
            $this->setFullPkAndFilledColumn('au_audorg_primary', $value);
            $this->au_audorg_primary = $value;
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
    public int|null $au_audorg_inactive = 0 {
        get => $this->au_audorg_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_audorg_inactive', $value);
            $this->au_audorg_inactive = $value;
        }
    }
}
