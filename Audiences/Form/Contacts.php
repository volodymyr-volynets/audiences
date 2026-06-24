<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Form;

use Object\Content\Messages;
use Object\Form\Wrapper\Base;
use Object\Validator\Phone;
use Numbers\Tenants\Tenants\Helper\Sequence;
use Numbers\Frontend\HTML\Renderers\Common\Helper\Colors;

class Contacts extends Base
{
    public $form_link = 'au_contacts';
    public $module_code = 'AU';
    public $title = 'A/U Contacts Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'new' => true,
            'back' => true,
            'import' => true
        ],
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        // child containers
        'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'operating_container' => ['default_row_type' => 'grid', 'order' => 32100],
        'optin_container' => ['default_row_type' => 'grid', 'order' => 32200],
        'audiences_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Audiences\Audiences\Model\Contact\Audiences',
            'details_pk' => ['au_contaud_au_audience_id'],
            'required' => true,
            'order' => 35000,
        ],
        'organizations_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => '\Numbers\Audiences\Audiences\Model\Contact\Organizations',
            'details_pk' => ['au_contorg_on_organization_id'],
            'required' => true,
            'order' => 35001,
        ],
        'demographics_container' => [
            'type' => 'details',
            'details_11' => true,
            'details_rendering_type' => 'grid_with_label',
            'details_key' => '\Numbers\Audiences\Audiences\Model\Contact\PIIs',
            'details_pk' => ['au_contpii_au_contact_id'],
            'order' => 35001
        ],
        'languages_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_key' => '\Numbers\Audiences\Audiences\Model\Contact\Languages',
            'details_pk' => ['au_contsplang_language_code'],
            'details_new_rows' => 1,
            'order' => 35001
        ],
        'skills_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_key' => '\Numbers\Audiences\Audiences\Model\Contact\Skills',
            'details_pk' => ['au_contskill_name'],
            'details_new_rows' => 1,
            'order' => 35001
        ]
    ];
    public $rows = [
        'top' => [
            'au_contact_id' => ['order' => 100],
            'au_contact_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'audiences' => ['order' => 200, 'label_name' => 'Audiences'],
            'organizations' => ['order' => 300, 'label_name' => 'Organizations'],
            'operating' => ['order' => 500, 'label_name' => 'Operating'],
            'optin' => ['order' => 600, 'label_name' => 'Opt In'],
            'demographics' => ['order' => 800, 'label_name' => 'Demographics'],
            \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA,
            \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES => \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES_DATA,
        ],
    ];
    public $elements = [
        'top' => [
            'au_contact_id' => [
                'au_contact_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Contact #', 'domain' => 'contact_id_sequence', 'percent' => 50, 'navigation' => true],
                'au_contact_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => 'c', 'navigation' => true]
            ],
            'au_contact_name' => [
                'au_contact_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 95, 'required' => 'c', 'autocomplete' => 'off'],
                '__avatar' => ['order' => 2, 'label_name' => 'Avatar', 'type' => 'text', 'percent' => 5, 'custom_renderer' => 'self::renderAvatar'],
            ]
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
            ],
            'audiences' => [
                'audiences' => ['container' => 'audiences_container', 'order' => 100],
            ],
            'organizations' => [
                'organizations' => ['container' => 'organizations_container', 'order' => 100],
            ],
            'operating' => [
                'operating' => ['container' => 'operating_container', 'order' => 100],
            ],
            'optin' => [
                'optin' => ['container' => 'optin_container', 'order' => 100],
            ],
            'demographics' => [
                'demographics' => ['container' => 'demographics_container', 'order' => 100],
                'languages_separator' => ['container' => 'languages_separator', 'order' => 200],
                'languages' => ['container' => 'languages_container', 'order' => 300],
                'skills_separator' => ['container' => 'skills_separator', 'order' => 400],
                'skills' => ['container' => 'skills_container', 'order' => 500],
            ]
        ],
        'general_container' => [
            'au_contact_um_usrtype_id' => [
                'au_contact_um_usrtype_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 200, 'percent' => 20, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Types'],
                '\Numbers\Audiences\Audiences\Model\Contact\Groups' => ['order' => 2, 'label_name' => 'Groups', 'domain' => 'group_id', 'multiple_column' => 'au_contgrp_au_group_id', 'percent' => 70, 'method' => 'multiselect', 'options_model' => '\Numbers\Audiences\Audiences\Model\Groups::optionsActive'],
                'au_contact_hold' => ['order' => 3, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 5],
                'au_contact_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'au_contact_title' => [
                'au_contact_title' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'personal_title', 'null' => true, 'percent' => 20, 'required' => false, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Titles::optionsActive'],
                'au_contact_first_name' => ['order' => 2, 'label_name' => 'First Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
                'au_contact_last_name' => ['order' => 3, 'label_name' => 'Last Name', 'domain' => 'personal_name', 'null' => true, 'percent' => 40, 'required' => 'c'],
            ],
            'au_contact_company' => [
                'au_contact_company' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Company', 'domain' => 'name', 'null' => true, 'percent' => 100, 'required' => 'c'],
            ],
            'separator_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 1, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'fa-regular fa-envelope', 'percent' => 100],
            ],
            'au_contact_email' => [
                'au_contact_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false, 'validator_method' => '\Object\Validator\EmailPublic::validate'],
                'au_contact_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false, 'validator_method' => '\Object\Validator\EmailPublic::validate'],
            ],
            'au_contact_phone' => [
                'au_contact_phone' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
                'au_contact_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 25, 'required' => false],
                'au_contact_whatsapp' => ['order' => 3, 'label_name' => 'WhatsApp', 'domain' => 'whatsapp', 'null' => true, 'percent' => 25, 'required' => false],
            ],
            'au_contact_cell' => [
                'au_contact_cell' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
                'au_contact_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
            ],
            'au_contact_alternative_contact' => [
                'au_contact_alternative_contact' => ['order' => 1, 'row_order' => 800, 'label_name' => 'Alternative Contact', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
            ],
            self::HIDDEN => [
                'au_contact_numeric_phone' => ['label_name' => 'Primary Phone (Numeric)', 'domain' => 'numeric_phone', 'null' => true],
            ]
        ],
        'operating_container' => [
            'au_contact_operating_country_code' => [
                'au_contact_operating_country_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Operating Country', 'domain' => 'country_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Countries::optionsActive', 'options_options' => ['skip_acl' => true], 'onchange' => 'this.form.submit();'],
                'au_contact_operating_province_code' => ['order' => 2, 'label_name' => 'Operating Province', 'domain' => 'province_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Provinces::optionsActive', 'options_depends' => ['cm_province_country_code' => 'au_contact_operating_country_code'], 'options_options' => ['skip_acl' => true]],
            ],
            'au_contact_operating_currency_code' => [
                'au_contact_operating_currency_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Operating Currency Code', 'domain' => 'currency_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Currencies\Model\Currencies::optionsActive', 'options_options' => ['skip_acl' => true]],
                'au_contact_operating_currency_type' => ['order' => 2, 'label_name' => 'Operating Currency Type', 'domain' => 'currency_type', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Currencies\Model\Types::optionsActive', 'options_options' => ['skip_acl' => true]],
            ],
            'operating_separator_1' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 300, 'label_name' => 'Users', 'icon' => 'fa-solid fa-users', 'percent' => 100],
            ],
            'au_contact_um_user_id' => [
                'au_contact_um_user_id' => ['order' => 1, 'row_order' => 400, 'label_name' => 'U/M User #', 'domain' => 'user_id', 'null' => true, 'method' => 'input', 'method_renderer' => 'self::renderUMUserIDRenderer'],
                'au_contact_um_usrgrp_id' => ['order' => 2, 'label_name' => 'U/M Group #', 'domain' => 'group_id', 'null' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Groups'],
            ],
            'au_contact_ip' => [
                'au_contact_ip' => ['order' => 1, 'row_order' => 500, 'label_name' => 'IP', 'domain' => 'ip', 'null' => true],
            ],
        ],
        'organizations_container' => [
            'row1' => [
                'au_contorg_on_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 80, 'method' => 'select', 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
                'au_contorg_primary' => ['order' => 2, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 15],
                'au_contorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'audiences_container' => [
            'row1' => [
                'au_contaud_au_audience_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Audience', 'domain' => 'audience_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Audiences\Audiences\Model\Audiences::optionsActive', 'onchange' => 'this.form.submit();'],
                'au_contaud_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'optin_container' => [
            'au_contact_send_emails' => [
                'au_contact_send_emails' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Send Emails', 'type' => 'boolean', 'default' => 1, 'percent' => 25],
                'au_contact_send_sms' => ['order' => 2, 'label_name' => 'Send SMS', 'type' => 'boolean', 'percent' => 25],
                'au_contact_send_whatsapp' => ['order' => 3, 'label_name' => 'Send WhatsApp', 'type' => 'boolean', 'percent' => 25],
                'au_contact_send_postal' => ['order' => 4, 'label_name' => 'Send Postal Mail', 'type' => 'boolean', 'percent' => 25],
            ],
            'au_contact_email_confirmed' => [
                'au_contact_email_confirmed' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Email Confirmed', 'type' => 'boolean', 'percent' => 25],
                'au_contact_phone_confirmed' => ['order' => 2, 'label_name' => 'Phone Confirmed', 'type' => 'boolean', 'percent' => 25],
                'au_contact_whatsapp_confirmed' => ['order' => 3, 'label_name' => 'WhatsApp Confirmed', 'type' => 'boolean', 'percent' => 25],
                'au_contact_postal_confirmed' => ['order' => 4, 'label_name' => 'Postal Confirmed', 'type' => 'boolean', 'percent' => 25],
            ]
        ],
        'demographics_container' => [
            'separator_demographics_1' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 50, 'label_name' => 'Dates And Ages', 'icon' => 'fa-regular fa-calendar-alt', 'percent' => 100],
            ],
            'au_contpii_date_of_birth' => [
                'au_contpii_date_of_birth' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Date Of Birth', 'type' => 'date', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'au_contpii_age_in_years' => ['order' => 2, 'label_name' => 'Age In Years', 'domain' => 'age_counter', 'default' => null, 'null' => true, 'computed' => true, 'percent' => 25],
                'au_contpii_date_of_seniority' => ['order' => 3, 'label_name' => 'Date Of Seniority', 'type' => 'date', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'au_contpii_seniority_in_years' => ['order' => 4, 'label_name' => 'Seniority In Years', 'domain' => 'age_counter', 'default' => null, 'null' => true, 'computed' => true, 'percent' => 25],
            ],
            'au_contpii_date_of_joining' => [
                'au_contpii_datetime_of_joining' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Date Of Joining', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'au_contpii_joining_in_days' => ['order' => 2, 'label_name' => 'Joining In Days', 'domain' => 'age_counter', 'default' => null, 'null' => true, 'computed' => true, 'percent' => 25],
                'au_contpii_datetime_of_last_purchase' => ['order' => 3, 'label_name' => 'Datetime Of Last Purchase', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'au_contpii_last_purchase_in_days' => ['order' => 4, 'label_name' => 'Days Since Last Purchase', 'domain' => 'age_counter', 'default' => null, 'null' => true, 'computed' => true, 'percent' => 25],
            ],
            'au_contpii_datetime_of_last_login' => [
                'au_contpii_datetime_of_last_login' => ['order' => 1, 'row_order' => 250, 'label_name' => 'Datetime Of Last Login', 'type' => 'datetime', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'au_contpii_last_login_in_days' => ['order' => 2, 'label_name' => 'Days Since Last Login', 'domain' => 'age_counter', 'null' => true, 'computed' => true, 'percent' => 25],
            ],
            'separator_demographics_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 300, 'label_name' => 'Race / Gender / Veteran', 'icon' => 'fa-regular fa-user-circle', 'percent' => 100],
            ],
            'au_contpii_um_usrpiigender_code' => [
                'au_contpii_um_usrpiigender_code' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Gender', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIGenders', 'options_options' => ['i18n' => 'skip_sorting']],
                'au_contpii_um_usrpiirace_code' => ['order' => 2, 'label_name' => 'Race', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIRaces', 'options_options' => ['i18n' => 'skip_sorting']],
            ],
            'au_contpii_um_usrpiidisability_code' => [
                'au_contpii_um_usrpiidisability_code' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Disability', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIDisability', 'options_options' => ['i18n' => 'skip_sorting']],
                'au_contpii_um_um_usrpiiveteran_code' => ['order' => 2, 'label_name' => 'Veteran Status', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIVeteranStatuses', 'options_options' => ['i18n' => 'skip_sorting']],
            ],
            'au_contpii_um_usrpiisexorient_code' => [
                'au_contpii_um_usrpiisexorient_code' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Sexual Orientation', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIISexualOrientations', 'options_options' => ['i18n' => 'skip_sorting']],
                'au_contpii_um_usrpiihighedu_code' => ['order' => 2, 'label_name' => 'Highest Education', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIHighestEducations', 'options_options' => ['i18n' => 'skip_sorting']],
            ],
            'au_contpii_birth_cm_country_code' => [
                'au_contpii_birth_cm_country_code' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Birth Country', 'domain' => 'country_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Countries'],
                'au_contpii_living_cm_country_code' => ['order' => 2, 'label_name' => 'Living Country', 'domain' => 'country_code', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Countries'],
            ],
            'separator_demographics_3' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 800, 'label_name' => 'SIN And Visa', 'icon' => 'fa-regular fa-surprise', 'percent' => 100],
            ],
            'au_contpii_sin_number' => [
                'au_contpii_sin_number' => ['order' => 1, 'row_order' => 900, 'label_name' => 'Social Insurance Number (SIN)', 'domain' => 'sin', 'null' => true, 'percent' => 25],
                'au_contpii_sin_expires' => ['order' => 2, 'label_name' => 'SIN Expires', 'type' => 'date', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
                'au_contpii_on_visa' => ['order' => 3, 'label_name' => 'On Visa', 'type' => 'boolean', 'percent' => 25],
                'au_contpii_vulnerable_person' => ['order' => 4, 'label_name' => 'Vulnerable Person', 'type' => 'boolean', 'percent' => 25],
            ]
        ],
        'languages_separator' => [
            'languages_separator_1' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 800, 'label_name' => 'Languages', 'icon' => 'fa-regular fa-flag', 'percent' => 100],
            ],
        ],
        'languages_container' => [
            'row1' => [
                'au_contsplang_language_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Language Code', 'domain' => 'language_code', 'null' => true, 'required' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Internalization\Internalization\Model\Language\Codes', 'onchange' => 'this.form.submit();'],
                'au_contsplang_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'row2' => [
                'au_contsplang_listening_um_usrpiiprof_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Listening Proficiencies', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 30, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies', 'options_options' => ['i18n' => 'skip_sorting']],
                'au_contsplang_speaking_um_usrpiiprof_code' => ['order' => 2, 'label_name' => 'Speaking Proficiencies', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 30, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies', 'options_options' => ['i18n' => 'skip_sorting']],
                'au_contsplang_writing_um_usrpiiprof_code' => ['order' => 3, 'label_name' => 'Writing Proficiencies', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 40, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIIProficiencies', 'options_options' => ['i18n' => 'skip_sorting']],
            ]
        ],
        'skills_separator' => [
            'skills_separator_1' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 800, 'label_name' => 'Skills', 'icon' => 'fa-regular fa-hand-spock', 'percent' => 100],
            ],
        ],
        'skills_container' => [
            'row1' => [
                'au_contskill_name' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 65],
                'au_contskill_um_usrskillprof_code' => ['order' => 2, 'label_name' => 'Proficiency', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 15, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\PII\UserPIISkillProficiencies', 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'au_contskill_years_in_practice' => ['order' => 3, 'label_name' => 'Years In Practice', 'domain' => 'age_counter', 'null' => true, 'percent' => 15],
                'au_contskill_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'AU Contacts',
        'model' => '\Numbers\Audiences\Audiences\Model\Contacts',
        'details' => [
            '\Numbers\Audiences\Audiences\Model\Contact\Audiences' => [
                'name' => 'AU Contact Audiences',
                'pk' => ['au_contaud_tenant_id', 'au_contaud_au_contact_id', 'au_contaud_au_audience_id'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'au_contaud_tenant_id', 'au_contact_id' => 'au_contaud_au_contact_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Groups' => [
                'name' => 'AU Contact Groups',
                'pk' => ['au_contgrp_tenant_id', 'au_contgrp_au_contact_id', 'au_contgrp_au_group_id'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'au_contgrp_tenant_id', 'au_contact_id' => 'au_contgrp_au_contact_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Organizations' => [
                'name' => 'AU Contact Organizations',
                'pk' => ['au_contorg_tenant_id', 'au_contorg_au_contact_id', 'au_contorg_on_organization_id'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'au_contorg_tenant_id', 'au_contact_id' => 'au_contorg_au_contact_id'],
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\PIIs' => [
                'name' => 'AU Contact Demographics',
                'pk' => ['au_contpii_tenant_id', 'au_contpii_au_contact_id'],
                'type' => '11',
                'map' => ['au_contact_tenant_id' => 'au_contpii_tenant_id', 'au_contact_id' => 'au_contpii_au_contact_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Languages' => [
                'name' => 'AU Contact Languages',
                'pk' => ['au_contsplang_tenant_id', 'au_contsplang_au_contact_id', 'au_contsplang_language_code'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'au_contsplang_tenant_id', 'au_contact_id' => 'au_contsplang_au_contact_id']
            ],
            '\Numbers\Audiences\Audiences\Model\Contact\Skills' => [
                'name' => 'AU Contact Skills',
                'pk' => ['au_contskill_tenant_id', 'au_contskill_au_contact_id', 'au_contskill_name'],
                'type' => '1M',
                'map' => ['au_contact_tenant_id' => 'au_contskill_tenant_id', 'au_contact_id' => 'au_contskill_au_contact_id']
            ],
        ]
    ];
    public $notification = [];

    public function validate(& $form)
    {
        // personal type
        if ($form->values['au_contact_type_id'] == 10) {
            if (empty($form->values['au_contact_first_name'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'au_contact_first_name');
            }
            if (empty($form->values['au_contact_last_name'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'au_contact_last_name');
            }
            $name = concat_ws(' ', $form->values['au_contact_title'], $form->values['au_contact_first_name'], $form->values['au_contact_last_name']);
        } elseif ($form->values['au_contact_type_id'] == 20) { // business
            if (empty($form->values['au_contact_company'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'au_contact_company');
            }
            $name = $form->values['au_contact_company'];
        } elseif ($form->values['au_contact_type_id'] == 30) { // API
            if (empty($form->values['au_contact_company'])) {
                $form->error('danger', Messages::REQUIRED_FIELD, 'au_contact_company');
            }
            $name = $form->values['au_contact_company'];
        } elseif ($form->values['au_contact_type_id'] == 200) {
            if ($form->values['au_contact_first_name'] && $form->values['au_contact_last_name']) {
                $name = concat_ws(' ', $form->values['au_contact_title'], $form->values['au_contact_first_name'], $form->values['au_contact_last_name']);
            } elseif ($form->values['au_contact_company']) {
                $name = $form->values['au_contact_company'];
            } else {
                $form->error('danger', Messages::REQUIRED_FIELD, 'au_contact_first_name');
                $form->error('danger', Messages::REQUIRED_FIELD, 'au_contact_last_name');
            }
        }
        // set name
        if (!$form->hasErrors() && empty($form->values['au_contact_name'])) {
            $form->values['au_contact_name'] = $name;
        }
        // primary organizations
        $primary_organization_id = $form->validateDetailsPrimaryColumn(
            '\Numbers\Audiences\Audiences\Model\Contact\Organizations',
            'au_contorg_primary',
            'au_contorg_inactive',
            'au_contorg_on_organization_id'
        );
        // primary address
        if (!$form->hasErrors()) {
            if (!empty($form->values['\Numbers\Audiences\Audiences\Model\Contacts\0Virtual0\Widgets\Addresses'])) {
                // primary address
                $primary_first_key = null;
                $primary_address_type = $form->validateDetailsPrimaryColumn(
                    '\Numbers\Audiences\Audiences\Model\Contacts\0Virtual0\Widgets\Addresses',
                    'wg_address_primary',
                    'wg_address_inactive',
                    'wg_address_type_code',
                    $primary_first_key
                );
            }
        }
        // numeric phone
        if (!empty($form->values['au_contact_phone'])) {
            $form->values['au_contact_numeric_phone'] = Phone::plainNumber($form->values['au_contact_phone']);
        } else {
            $form->values['au_contact_numeric_phone'] = null;
        }
        // generate new sequence
        if (empty($form->values['au_contact_code'])) {
            $form->values['au_contact_code'] = Sequence::nextval('DEFAULT', 'CON', 'AU', \Tenant::id(), true);
        }
    }

    public function renderUMUserIDRenderer(& $form, & $options, & $value, & $neighbouring_values)
    {
        $result = [
            'left' => '',
            'value' => $value,
            'right' => [],
        ];
        if ($form->values['au_contact_um_user_id']) {
            $result['right'][] = \HTML::a(['value' => loc('NF.Form.View', 'View'), 'href' => '/Numbers/Users/Users/Controller/Users/_Edit?um_user_id=' . $form->values['au_contact_um_user_id']]);
        }
        return \HTML::inputGroup($result);
    }

    public function renderAvatar(& $form, & $options, & $value, & $neighbouring_values)
    {
        // check if we have permissions
        if (!empty($form->values['au_contact_name'])) {
            return Colors::renderAvatar($form->values['au_contact_name'], 'user', false) . ' ' . Colors::renderAvatar($form->values['au_contact_name'], 'user', true);
        } else {
            return '';
        }
    }
}
