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

use Object\Import;

class System extends Import
{
    public $data = [
        'controllers' => [
            'options' => [
                'pk' => ['sm_resource_id'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Resources',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Settings',
                    'sm_resource_code' => '\Numbers\Audiences\Audiences\Controller\Settings',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'A/U Settings',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-cogs',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'AU::AUDIENCES',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'AllActions',
                            'sm_rsrcmp_action_id' => '::id::All_Actions',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_New',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Edit',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Inactivate',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Groups',
                    'sm_resource_code' => '\Numbers\Audiences\Audiences\Controller\Groups',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Settings',
                    'sm_resource_name' => 'A/U Groups',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-regular fa-object-group',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => 'Settings',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'AU::AUDIENCES',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'AllActions',
                            'sm_rsrcmp_action_id' => '::id::All_Actions',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_Export',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_New',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Edit',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Inactivate',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Delete',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Audiences',
                    'sm_resource_code' => '\Numbers\Audiences\Audiences\Controller\Audiences',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Global',
                    'sm_resource_name' => 'A/U Audiences',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-user-friends',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'AU::AUDIENCES',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'AllActions',
                            'sm_rsrcmp_action_id' => '::id::All_Actions',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_Export',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_New',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Edit',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Inactivate',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Delete',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Contacts',
                    'sm_resource_code' => '\Numbers\Audiences\Audiences\Controller\Contacts',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Global',
                    'sm_resource_name' => 'A/U Contacts',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-users',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'AU::AUDIENCES',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'AllActions',
                            'sm_rsrcmp_action_id' => '::id::All_Actions',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_Export',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_New',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Edit',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Inactivate',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Delete',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Segments',
                    'sm_resource_code' => '\Numbers\Audiences\Audiences\Controller\Segments',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Global',
                    'sm_resource_name' => 'A/U Segments',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-regular fa-object-ungroup',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'AU::AUDIENCES',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'AllActions',
                            'sm_rsrcmp_action_id' => '::id::All_Actions',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_Export',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_New',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Edit',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Inactivate',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Delete',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Senders',
                    'sm_resource_code' => '\Numbers\Audiences\Audiences\Controller\Senders',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Global',
                    'sm_resource_name' => 'A/U Senders',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-regular fa-envelope',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'AU::AUDIENCES',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'AllActions',
                            'sm_rsrcmp_action_id' => '::id::All_Actions',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_Export',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_New',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Edit',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Inactivate',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Delete',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Campaigns',
                    'sm_resource_code' => '\Numbers\Audiences\Audiences\Controller\Campaigns',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Global',
                    'sm_resource_name' => 'A/U Campaigns',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-window-restore',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'AU::AUDIENCES',
                            'sm_rsrcftr_inactive' => 0
                        ]
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'AllActions',
                            'sm_rsrcmp_action_id' => '::id::All_Actions',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Index',
                            'sm_rsrcmp_action_id' => '::id::List_Export',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_New',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Edit',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Inactivate',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Delete',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Import',
                            'sm_rsrcmp_action_id' => '::id::Import_Records',
                            'sm_rsrcmp_inactive' => 0
                        ]
                    ]
                ],
                [
                    'sm_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Task\PostponedCampaigns',
                    'sm_resource_code' => '\Numbers\Audiences\Audiences\Controller\Task\PostponedCampaigns',
                    'sm_resource_type' => 100,
                    'sm_resource_classification' => 'Tasks',
                    'sm_resource_name' => 'A/U Postponed Campaigns (Task)',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-regular fa-sun',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => 'Tasks',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 1,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Resource\Features' => [
                        [
                            'sm_rsrcftr_feature_code' => 'AU::AUDIENCES',
                            'sm_rsrcftr_inactive' => 0
                        ],
                        [
                            'sm_rsrcftr_feature_code' => 'TS::TASK_SCHEDULER',
                            'sm_rsrcftr_inactive' => 0
                        ],
                    ],
                    '\Numbers\Backend\System\Modules\Model\Resource\Map' => [
                        [
                            'sm_rsrcmp_method_code' => 'AllActions',
                            'sm_rsrcmp_action_id' => '::id::All_Actions',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_View',
                            'sm_rsrcmp_inactive' => 0
                        ],
                        [
                            'sm_rsrcmp_method_code' => 'Edit',
                            'sm_rsrcmp_action_id' => '::id::Record_Edit',
                            'sm_rsrcmp_inactive' => 0
                        ],
                    ]
                ],
            ]
        ],
        'menu' => [
            'options' => [
                'pk' => ['sm_resource_id'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Resources',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_resource_id' => '::id::\Menu\Operations\Audiences\Management',
                    'sm_resource_code' => '\Menu\Operations\Audiences\Management',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Audience Management',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-user-friends',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => null,
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_root_node' => 1,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Operations\Audiences\Management\Settings',
                    'sm_resource_code' => '\Menu\Operations\Audiences\Management\Settings',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Settings',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-cogs',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Audiences\Audiences\Controller\Settings',
                    'sm_resource_code' => '\Menu\Numbers\Audiences\Audiences\Controller\Settings',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Settings',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-cogs',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Settings',
                    'sm_resource_menu_acl_method_code' => 'Edit',
                    'sm_resource_menu_acl_action_id' => '::id::Record_View',
                    'sm_resource_menu_url' => '/Numbers/Audiences/Audiences/Controller/Settings/_Edit',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Audiences\Audiences\Controller\Groups',
                    'sm_resource_code' => '\Menu\Numbers\Audiences\Audiences\Controller\Groups',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Groups',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-regular fa-object-group',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => 'Settings',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Groups',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Audiences/Audiences/Controller/Groups',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Audiences\Audiences\Controller\Audiences',
                    'sm_resource_code' => '\Menu\Numbers\Audiences\Audiences\Controller\Audiences',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Audiences',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-user-friends',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Audiences',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Audiences/Audiences/Controller/Audiences',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Audiences\Audiences\Controller\Contacts',
                    'sm_resource_code' => '\Menu\Numbers\Audiences\Audiences\Controller\Contacts',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Contacts',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-users',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Contacts',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Audiences/Audiences/Controller/Contacts',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Audiences\Audiences\Controller\Segments',
                    'sm_resource_code' => '\Menu\Numbers\Audiences\Audiences\Controller\Segments',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Segments',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-regular fa-object-ungroup',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => 'Settings',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Segments',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Audiences/Audiences/Controller/Segments',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Audiences\Audiences\Controller\Senders',
                    'sm_resource_code' => '\Menu\Numbers\Audiences\Audiences\Controller\Senders',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Senders',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-regular fa-envelope',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => 'Settings',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Senders',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Audiences/Audiences/Controller/Senders',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Audiences\Audiences\Controller\Campaigns',
                    'sm_resource_code' => '\Menu\Numbers\Audiences\Audiences\Controller\Campaigns',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Campaigns',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-solid fa-window-restore',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Campaigns',
                    'sm_resource_menu_acl_method_code' => 'Index',
                    'sm_resource_menu_acl_action_id' => '::id::List_View',
                    'sm_resource_menu_url' => '/Numbers/Audiences/Audiences/Controller/Campaigns',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Operations\Audiences\Management\Tasks',
                    'sm_resource_code' => '\Menu\Operations\Audiences\Management\Tasks',
                    'sm_resource_type' => 299,
                    'sm_resource_name' => 'Tasks',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-regular fa-sun',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => null,
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 0,
                    'sm_resource_menu_acl_resource_id' => null,
                    'sm_resource_menu_acl_method_code' => null,
                    'sm_resource_menu_acl_action_id' => null,
                    'sm_resource_menu_url' => null,
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
                [
                    'sm_resource_id' => '::id::\Menu\Numbers\Audiences\Audiences\Controller\Task\PostponedCampaigns',
                    'sm_resource_code' => '\Menu\Numbers\Audiences\Audiences\Controller\Task\PostponedCampaigns',
                    'sm_resource_type' => 200,
                    'sm_resource_name' => 'Postponed Campaigns',
                    'sm_resource_description' => null,
                    'sm_resource_icon' => 'fa-regular fa-sun',
                    'sm_resource_module_code' => 'AU',
                    'sm_resource_group1_name' => 'Operations',
                    'sm_resource_group2_name' => 'Audience Management',
                    'sm_resource_group3_name' => 'Tasks',
                    'sm_resource_group4_name' => null,
                    'sm_resource_group5_name' => null,
                    'sm_resource_group6_name' => null,
                    'sm_resource_group7_name' => null,
                    'sm_resource_group8_name' => null,
                    'sm_resource_group9_name' => null,
                    'sm_resource_acl_public' => 0,
                    'sm_resource_acl_authorized' => 0,
                    'sm_resource_acl_permission' => 1,
                    'sm_resource_menu_acl_resource_id' => '::id::\Numbers\Audiences\Audiences\Controller\Task\PostponedCampaigns',
                    'sm_resource_menu_acl_method_code' => 'Edit',
                    'sm_resource_menu_acl_action_id' => '::id::Record_View',
                    'sm_resource_menu_url' => '/Numbers/Audiences/Audiences/Controller/Task/PostponedCampaigns/_Edit',
                    'sm_resource_menu_options_generator' => null,
                    'sm_resource_inactive' => 0
                ],
            ]
        ]
    ];
}
