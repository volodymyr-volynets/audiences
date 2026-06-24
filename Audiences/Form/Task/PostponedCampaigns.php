<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Form\Task;

use Numbers\Users\TaskScheduler\Helper\CreateJob;
use Object\Content\Messages;
use Object\Form\Wrapper\Base;

class PostponedCampaigns extends Base
{
    public $form_link = 'au_tasks_postponed_campaigns';
    public $module_code = 'AU';
    public $title = 'A/U Postponed Campaigns Task';
    public $options = [
        'segment' => self::SEGMENT_TASK,
        'actions' => [
            'refresh' => true
        ],
        'no_ajax_form_reload' => true,
    ];
    public $containers = [
        'buttons' => ['default_row_type' => 'grid', 'order' => 900]
    ];
    public $rows = [];
    public $elements = [
        'buttons' => [
            self::BUTTONS => [
                self::BUTTON_SUBMIT_SAVE => self::BUTTON_SUBMIT_DATA,
                self::BUTTON_SUBMIT_POST => ['order' => 150, 'button_group' => 'left', 'value' => 'Create Job', 'type' => 'danger', 'method' => 'button2', 'accesskey' => 'p', 'process_submit' => 'other']
            ]
        ]
    ];

    public function validate(& $form)
    {
        if ($form->hasErrors()) {
            return;
        }
        // if we are creating a job
        if (!empty($form->values['__submit_post'])) {
            CreateJob::create('AU::POSTPONED_CAMPAIGNS', $form);
        }
        $model = new \Numbers\Audiences\Audiences\Task\PostponedCampaigns($form->values);
        $result = $model->process();
        if ($result['success']) {
            $form->error(SUCCESS, Messages::OPERATION_EXECUTED);
            if (!empty($result['data']['comments'])) {
                foreach ($result['data']['comments'] as $v) {
                    $form->error(SUCCESS, $v, null, ['skip_i18n' => true]);
                }
            }
        } else {
            $form->error(DANGER, $result['error']);
        }
    }
}
