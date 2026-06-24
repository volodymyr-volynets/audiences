<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Data;

class Import extends \Object\Import
{
    public $data = [
        'modules' => [
            'options' => [
                'pk' => ['sm_module_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Modules',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_module_code' => 'AU',
                    'sm_module_type' => 20,
                    'sm_module_name' => 'A/U Audience Management',
                    'sm_module_abbreviation' => 'A/U',
                    'sm_module_icon' => 'fa-solid fa-user-friends',
                    'sm_module_transactions' => 0,
                    'sm_module_multiple' => 0,
                    'sm_module_activation_model' => null,
                    'sm_module_custom_activation' => false,
                    'sm_module_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
                ]
            ]
        ],
        'features' => [
            'options' => [
                'pk' => ['sm_feature_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Module\Features',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_feature_module_code' => 'AU',
                    'sm_feature_code' => 'AU::AUDIENCES',
                    'sm_feature_type' => 10,
                    'sm_feature_name' => 'A/U Audience Management',
                    'sm_feature_icon' => 'fa-solid fa-user-friends',
                    'sm_feature_activation_model' => null,
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Module\Dependencies' => [
                        [
                            'sm_mdldep_child_module_code' => 'ON',
                            'sm_mdldep_child_feature_code' => 'ON::ORGANIZATIONS',
                        ],
                        [
                            'sm_mdldep_child_module_code' => 'UM',
                            'sm_mdldep_child_feature_code' => 'UM::USERS',
                        ],
                        [
                            'sm_mdldep_child_module_code' => 'FT',
                            'sm_mdldep_child_feature_code' => 'FT::FLOW_TRACKER',
                        ]
                    ]
                ],
                [
                    'sm_feature_module_code' => 'AU',
                    'sm_feature_code' => 'AU::SMS_NOTIFICATION_SIMPLE',
                    'sm_feature_type' => 26,
                    'sm_feature_name' => 'A/U SMS Notification (Simple)',
                    'sm_feature_icon' => 'fa-solid fa-sms',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'AU',
                    'sm_feature_code' => 'AU::WHATSAPP_NOTI_SIMPLE',
                    'sm_feature_type' => 26,
                    'sm_feature_name' => 'A/U WhatsApp Notification (Simple)',
                    'sm_feature_icon' => 'fa-solid fa-sms',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ],
                [
                    'sm_feature_module_code' => 'AU',
                    'sm_feature_code' => 'AU::EMAIL_NOTIFICATION_SIMPLE',
                    'sm_feature_type' => 26,
                    'sm_feature_name' => 'A/U Email Notification (Simple)',
                    'sm_feature_icon' => 'fa-solid fa-mail-bulk',
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_activation_model' => null,
                    'sm_feature_inactive' => 0
                ]
            ]
        ],
    ];
}
