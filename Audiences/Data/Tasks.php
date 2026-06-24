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

class Tasks extends Import
{
    public $data = [
        'tasks' => [
            'options' => [
                'pk' => ['ts_task_code'],
                'model' => '\Numbers\Users\TaskScheduler\Model\Collection\Tasks',
                'method' => 'save'
            ],
            'data' => [
                [
                    'ts_task_code' => 'AU::POSTPONED_CAMPAIGNS',
                    'ts_task_name' => 'A/U Postponed Campaigns',
                    'ts_task_model' => '\Numbers\Audiences\Audiences\Task\PostponedCampaigns',
                    'ts_task_inactive' => 0,
                ],
            ],
        ],
    ];
}
