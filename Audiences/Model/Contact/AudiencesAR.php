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

class AudiencesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Audiences::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_contaud_tenant_id','au_contaud_au_contact_id','au_contaud_au_audience_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_contaud_tenant_id = null {
        get => $this->au_contaud_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_contaud_tenant_id', $value);
            $this->au_contaud_tenant_id = $value;
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
    public int|null $au_contaud_au_contact_id = null {
        get => $this->au_contaud_au_contact_id;
        set {
            $this->setFullPkAndFilledColumn('au_contaud_au_contact_id', $value);
            $this->au_contaud_au_contact_id = $value;
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
    public int|null $au_contaud_au_audience_id = null {
        get => $this->au_contaud_au_audience_id;
        set {
            $this->setFullPkAndFilledColumn('au_contaud_au_audience_id', $value);
            $this->au_contaud_au_audience_id = $value;
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
    public int|null $au_contaud_inactive = 0 {
        get => $this->au_contaud_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_contaud_inactive', $value);
            $this->au_contaud_inactive = $value;
        }
    }
}
