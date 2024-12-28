<?php

/**
 * @brief zh2_auto, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul and contributors
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Theme\zh2_auto;

use ArrayObject;

class FrontendBehaviors
{
    public static function tplIfConditions(string $tag, array $attr, string $content, ArrayObject $if): string
    {
        if ($tag === 'SysIf' && isset($attr['has_blog_descr'])) {
            $sign = (bool) $attr['has_blog_descr'] ? '' : '!';
            $if[] = $sign . '(strlen(App::blog()->desc()) !== 0)';
        }

        return '';
    }
}
