<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Helper;

use Helper\Ob;

class Notifications
{
    /**
     * Render email template
     *
     * @param string $template_model
     * @param string $template_path
     * @param array $options
     *      array input
     *      string title
     * @return string
     */
    public static function renderEmailTemplate(string $template_model, string $template_path, array $options): string
    {
        $form = \Factory::model($template_model, false, [$options]);
        $template = Ob::require($template_path);
        $body = str_replace([
            '<!-- [numbers: document title] -->',
            '<!-- [numbers: document body] -->'
        ], [
            '<title>' . ($options['title'] ?? '') . '</title>',
            $form->render()
        ], $template);
        return $body;
    }
}
