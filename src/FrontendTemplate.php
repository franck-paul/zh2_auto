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

use dcCore;

class FrontendTemplate
{
    public static function IfPreviewIsNotMandatory($attr, $content)
    {
        $theme_ident = preg_replace('/[^a-zA-Z0-9_]/', '_', dcCore::app()->blog->settings->system->theme) . '_style';
        $s           = dcCore::app()->blog->settings->themes->get($theme_ident);
        if ($s !== null) {
            $s = @unserialize($s);
            if (is_array($s) && isset($s['preview_not_mandatory']) && $s['preview_not_mandatory']) {
                return $content;
            }
        }

        return '';
    }
}
