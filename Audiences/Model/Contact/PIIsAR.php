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

class PIIsAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = PIIs::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_contpii_tenant_id','au_contpii_au_contact_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_contpii_tenant_id = null {
        get => $this->au_contpii_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_tenant_id', $value);
            $this->au_contpii_tenant_id = $value;
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
    public int|null $au_contpii_au_contact_id = null {
        get => $this->au_contpii_au_contact_id;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_au_contact_id', $value);
            $this->au_contpii_au_contact_id = $value;
        }
    }

    /**
     * Gender
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIGenders}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contpii_um_usrpiigender_code = null {
        get => $this->au_contpii_um_usrpiigender_code;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_um_usrpiigender_code', $value);
            $this->au_contpii_um_usrpiigender_code = $value;
        }
    }

    /**
     * Race
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIRaces}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contpii_um_usrpiirace_code = null {
        get => $this->au_contpii_um_usrpiirace_code;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_um_usrpiirace_code', $value);
            $this->au_contpii_um_usrpiirace_code = $value;
        }
    }

    /**
     * Disability
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIDisability}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contpii_um_usrpiidisability_code = null {
        get => $this->au_contpii_um_usrpiidisability_code;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_um_usrpiidisability_code', $value);
            $this->au_contpii_um_usrpiidisability_code = $value;
        }
    }

    /**
     * Veteran Status
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIVeteranStatuses}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contpii_um_um_usrpiiveteran_code = null {
        get => $this->au_contpii_um_um_usrpiiveteran_code;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_um_um_usrpiiveteran_code', $value);
            $this->au_contpii_um_um_usrpiiveteran_code = $value;
        }
    }

    /**
     * Sexual Orientation
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIISexualOrientations}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contpii_um_usrpiisexorient_code = null {
        get => $this->au_contpii_um_usrpiisexorient_code;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_um_usrpiisexorient_code', $value);
            $this->au_contpii_um_usrpiisexorient_code = $value;
        }
    }

    /**
     * Highest Education
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIHighestEducations}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contpii_um_usrpiihighedu_code = null {
        get => $this->au_contpii_um_usrpiihighedu_code;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_um_usrpiihighedu_code', $value);
            $this->au_contpii_um_usrpiihighedu_code = $value;
        }
    }

    /**
     * Birth Country Code
     *
     *
     *
     * {domain{country_code}}
     *
     * @var string|null Domain: country_code Type: char
     */
    public string|null $au_contpii_birth_cm_country_code = null {
        get => $this->au_contpii_birth_cm_country_code;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_birth_cm_country_code', $value);
            $this->au_contpii_birth_cm_country_code = $value;
        }
    }

    /**
     * Living Country Code
     *
     *
     *
     * {domain{country_code}}
     *
     * @var string|null Domain: country_code Type: char
     */
    public string|null $au_contpii_living_cm_country_code = null {
        get => $this->au_contpii_living_cm_country_code;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_living_cm_country_code', $value);
            $this->au_contpii_living_cm_country_code = $value;
        }
    }

    /**
     * Date Of Birth
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $au_contpii_date_of_birth = null {
        get => $this->au_contpii_date_of_birth;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_date_of_birth', $value);
            $this->au_contpii_date_of_birth = $value;
        }
    }

    /**
     * Age In Years
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $au_contpii_age_in_years = null {
        get => $this->au_contpii_age_in_years;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_age_in_years', $value);
            $this->au_contpii_age_in_years = $value;
        }
    }

    /**
     * Date Of Seniority
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $au_contpii_date_of_seniority = null {
        get => $this->au_contpii_date_of_seniority;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_date_of_seniority', $value);
            $this->au_contpii_date_of_seniority = $value;
        }
    }

    /**
     * Seniority In Years
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $au_contpii_seniority_in_years = null {
        get => $this->au_contpii_seniority_in_years;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_seniority_in_years', $value);
            $this->au_contpii_seniority_in_years = $value;
        }
    }

    /**
     * Datetime Of Joining
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $au_contpii_datetime_of_joining = null {
        get => $this->au_contpii_datetime_of_joining;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_datetime_of_joining', $value);
            $this->au_contpii_datetime_of_joining = $value;
        }
    }

    /**
     * Joining In Days
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $au_contpii_joining_in_days = null {
        get => $this->au_contpii_joining_in_days;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_joining_in_days', $value);
            $this->au_contpii_joining_in_days = $value;
        }
    }

    /**
     * Datetime Of Last Purchase
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $au_contpii_datetime_of_last_purchase = null {
        get => $this->au_contpii_datetime_of_last_purchase;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_datetime_of_last_purchase', $value);
            $this->au_contpii_datetime_of_last_purchase = $value;
        }
    }

    /**
     * Days Since Last Purchase
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $au_contpii_last_purchase_in_days = null {
        get => $this->au_contpii_last_purchase_in_days;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_last_purchase_in_days', $value);
            $this->au_contpii_last_purchase_in_days = $value;
        }
    }

    /**
     * Datetime Of Last Login
     *
     *
     *
     *
     *
     * @var string|null Type: datetime
     */
    public string|null $au_contpii_datetime_of_last_login = null {
        get => $this->au_contpii_datetime_of_last_login;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_datetime_of_last_login', $value);
            $this->au_contpii_datetime_of_last_login = $value;
        }
    }

    /**
     * Days Since Last Login
     *
     *
     *
     * {domain{age_counter}}
     *
     * @var mixed Domain: age_counter Type: bcnumeric
     */
    public mixed $au_contpii_last_login_in_days = null {
        get => $this->au_contpii_last_login_in_days;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_last_login_in_days', $value);
            $this->au_contpii_last_login_in_days = $value;
        }
    }

    /**
     * Social Insurance Number (SIN)
     *
     *
     *
     * {domain{sin}}
     *
     * @var string|null Domain: sin Type: varchar
     */
    public string|null $au_contpii_sin_number = null {
        get => $this->au_contpii_sin_number;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_sin_number', $value);
            $this->au_contpii_sin_number = $value;
        }
    }

    /**
     * SIN Expires
     *
     *
     *
     *
     *
     * @var string|null Type: date
     */
    public string|null $au_contpii_sin_expires = null {
        get => $this->au_contpii_sin_expires;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_sin_expires', $value);
            $this->au_contpii_sin_expires = $value;
        }
    }

    /**
     * On Visa
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_contpii_on_visa = 0 {
        get => $this->au_contpii_on_visa;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_on_visa', $value);
            $this->au_contpii_on_visa = $value;
        }
    }

    /**
     * Vulnerable Person
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $au_contpii_vulnerable_person = 0 {
        get => $this->au_contpii_vulnerable_person;
        set {
            $this->setFullPkAndFilledColumn('au_contpii_vulnerable_person', $value);
            $this->au_contpii_vulnerable_person = $value;
        }
    }
}
