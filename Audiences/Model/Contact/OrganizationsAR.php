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

class OrganizationsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Organizations::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_contorg_tenant_id','au_contorg_au_contact_id','au_contorg_on_organization_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_contorg_tenant_id = null {
        get => $this->au_contorg_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_contorg_tenant_id', $value);
            $this->au_contorg_tenant_id = $value;
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
    public string|null $au_contorg_timestamp = 'now()' {
        get => $this->au_contorg_timestamp;
        set {
            $this->setFullPkAndFilledColumn('au_contorg_timestamp', $value);
            $this->au_contorg_timestamp = $value;
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
    public int|null $au_contorg_au_contact_id = null {
        get => $this->au_contorg_au_contact_id;
        set {
            $this->setFullPkAndFilledColumn('au_contorg_au_contact_id', $value);
            $this->au_contorg_au_contact_id = $value;
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
    public int|null $au_contorg_on_organization_id = null {
        get => $this->au_contorg_on_organization_id;
        set {
            $this->setFullPkAndFilledColumn('au_contorg_on_organization_id', $value);
            $this->au_contorg_on_organization_id = $value;
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
    public int|null $au_contorg_primary = 0 {
        get => $this->au_contorg_primary;
        set {
            $this->setFullPkAndFilledColumn('au_contorg_primary', $value);
            $this->au_contorg_primary = $value;
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
    public int|null $au_contorg_inactive = 0 {
        get => $this->au_contorg_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_contorg_inactive', $value);
            $this->au_contorg_inactive = $value;
        }
    }
}
