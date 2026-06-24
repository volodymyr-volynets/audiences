<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Form\Collection;

use Object\Form\Parent2;
use Object\Form\Wrapper\Collection;

class ContactsCollection extends Collection
{
    public $collection_link = 'um_contact_collection';
    public const BYPASS = ['au_contact_id'];
    public $data = [
        self::MAIN_SCREEN => [
            'order' => 1000,
            self::ROWS => [
                self::MAIN_ROW => [
                    'order' => 100,
                    self::FORMS => [
                        'um_users' => [
                            'model' => '\Numbers\Audiences\Audiences\Form\Contacts',
                            'bypass_values' => [
                                'au_contact_id',
                            ],
                            'flag_main_form' => true,
                            'options' => [
                                'segment' => Parent2::SEGMENT_FORM,
                                'percent' => 100,
                            ],
                            'order' => 1
                        ]
                    ]
                ],
                self::WIDGETS_ROW => [
                    'options' => [
                        'type' => 'tabs',
                        'segment' => Parent2::SEGMENT_ADDITIONAL_INFORMATION,
                        'its_own_segment' => true
                    ],
                    'order' => PHP_INT_MAX - 1000,
                    self::FORMS => [
                        'wg_comments' => [
                            'model' => '\Numbers\Users\Widgets\Comments\Form\List2\Comments',
                            'submodule' => 'Numbers.Users.Widgets.Comments',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'label_name' => 'Comments',
                                'bypass_hidden_from_input' => self::BYPASS,
                                'model_table' => '\Numbers\Audiences\Audiences\Model\Contacts',
                            ],
                            'order' => 1
                        ],
                        'wg_documents' => [
                            'model' => '\Numbers\Users\Widgets\Documents\Form\List2\Documents',
                            'submodule' => 'Numbers.Users.Widgets.Documents',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'label_name' => 'Documents',
                                'bypass_hidden_from_input' => self::BYPASS,
                                'model_table' => '\Numbers\Audiences\Audiences\Model\Contacts',
                            ],
                            'order' => 2
                        ],
                        'wg_tags' => [
                            'model' => '\Numbers\Users\Widgets\Tags\Form\List2\Tags',
                            'submodule' => 'Numbers.Users.Widgets.Tags',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'label_name' => 'Tags',
                                'bypass_hidden_from_input' => self::BYPASS,
                                'model_table' => '\Numbers\Audiences\Audiences\Model\Contacts',
                            ],
                            'order' => 3
                        ],
                        'wg_batches' => [
                            'model' => '\Numbers\Tenants\Widgets\Batches\Form\List2\Batches',
                            'submodule' => 'Numbers.Tenants.Widgets.Batches',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'label_name' => 'Batches',
                                'bypass_hidden_from_input' => self::BYPASS,
                                'model_table' => '\Numbers\Audiences\Audiences\Model\Contacts',
                            ],
                            'order' => 4
                        ],
                        'wg_contact_messages' => [
                            'model' => '\Numbers\Audiences\Audiences\Form\List2\Widgets\ContactMessages',
                            'submodule' => 'Numbers.Audiences.Audiences',
                            'bypass_input' => self::BYPASS,
                            'options' => [
                                'label_name' => 'Contact Messages',
                                'bypass_hidden_from_input' => self::BYPASS,
                                'model_table' => '\Numbers\Audiences\Audiences\Model\Contacts',
                            ],
                            'order' => 5
                        ],
                    ]
                ]
            ]
        ]
    ];

    public function distribute()
    {
        if (empty($this->values['au_contact_id'])) {
            unset($this->data[self::MAIN_SCREEN][self::ROWS][self::WIDGETS_ROW]);
        }
    }
}
