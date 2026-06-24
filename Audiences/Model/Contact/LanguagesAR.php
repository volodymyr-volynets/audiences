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

class LanguagesAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Languages::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['au_contsplang_tenant_id','au_contsplang_au_contact_id','au_contsplang_language_code'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $au_contsplang_tenant_id = null {
        get => $this->au_contsplang_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('au_contsplang_tenant_id', $value);
            $this->au_contsplang_tenant_id = $value;
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
    public int|null $au_contsplang_au_contact_id = null {
        get => $this->au_contsplang_au_contact_id;
        set {
            $this->setFullPkAndFilledColumn('au_contsplang_au_contact_id', $value);
            $this->au_contsplang_au_contact_id = $value;
        }
    }

    /**
     * Language Code
     *
     *
     *
     * {domain{language_code}}
     *
     * @var string|null Domain: language_code Type: char
     */
    public string|null $au_contsplang_language_code = null {
        get => $this->au_contsplang_language_code;
        set {
            $this->setFullPkAndFilledColumn('au_contsplang_language_code', $value);
            $this->au_contsplang_language_code = $value;
        }
    }

    /**
     * Listening Proficiencies
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contsplang_listening_um_usrpiiprof_code = null {
        get => $this->au_contsplang_listening_um_usrpiiprof_code;
        set {
            $this->setFullPkAndFilledColumn('au_contsplang_listening_um_usrpiiprof_code', $value);
            $this->au_contsplang_listening_um_usrpiiprof_code = $value;
        }
    }

    /**
     * Speaking Proficiencies
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contsplang_speaking_um_usrpiiprof_code = null {
        get => $this->au_contsplang_speaking_um_usrpiiprof_code;
        set {
            $this->setFullPkAndFilledColumn('au_contsplang_speaking_um_usrpiiprof_code', $value);
            $this->au_contsplang_speaking_um_usrpiiprof_code = $value;
        }
    }

    /**
     * Writing Proficiencies
     *
     *
     * {options_model{\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies}}
     * {domain{group_code}}
     *
     * @var string|null Domain: group_code Type: varchar
     */
    public string|null $au_contsplang_writing_um_usrpiiprof_code = null {
        get => $this->au_contsplang_writing_um_usrpiiprof_code;
        set {
            $this->setFullPkAndFilledColumn('au_contsplang_writing_um_usrpiiprof_code', $value);
            $this->au_contsplang_writing_um_usrpiiprof_code = $value;
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
    public int|null $au_contsplang_inactive = 0 {
        get => $this->au_contsplang_inactive;
        set {
            $this->setFullPkAndFilledColumn('au_contsplang_inactive', $value);
            $this->au_contsplang_inactive = $value;
        }
    }
}
