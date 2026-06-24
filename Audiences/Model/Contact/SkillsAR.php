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

class SkillsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Skills::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_contskill_tenant_id','au_contskill_au_contact_id','au_contskill_name'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_contskill_tenant_id = null {
        get => $this->au_contskill_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_contskill_tenant_id', $value);
            $this->au_contskill_tenant_id = $value;
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
    public int|null $au_contskill_au_contact_id = null {
        get => $this->au_contskill_au_contact_id;
        set {
            $this->setFullPkAndFilledColumn('au_contskill_au_contact_id', $value);
            $this->au_contskill_au_contact_id = $value;
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
    public string|null $au_contskill_name = null {
        get => $this->au_contskill_name;
        set {
            $this->setFullPkAndFilledColumn('au_contskill_name', $value);
            $this->au_contskill_name = $value;
        }
    }

    /**
     * Proficiency
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIISkillProficiencies}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contskill_um_usrskillprof_code = null {
        get => $this->au_contskill_um_usrskillprof_code;
        set {
            $this->setFullPkAndFilledColumn('au_contskill_um_usrskillprof_code', $value);
            $this->au_contskill_um_usrskillprof_code = $value;
        }
    }

    /**
     * Years In Practice
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $au_contskill_years_in_practice = null {
        get => $this->au_contskill_years_in_practice;
        set {
            $this->setFullPkAndFilledColumn('au_contskill_years_in_practice', $value);
            $this->au_contskill_years_in_practice = $value;
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
    public int|null $au_contskill_inactive = 0 {
        get => $this->au_contskill_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_contskill_inactive', $value);
            $this->au_contskill_inactive = $value;
        }
    }
}
