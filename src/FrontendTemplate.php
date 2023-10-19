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

use Dotclear\App;

class FrontendTemplate
{
    public static function IfPreviewIsNotMandatory($attr, $content)
    {
        $theme_ident = preg_replace('/[^a-zA-Z0-9_]/', '_', App::blog()->settings()->system->theme) . '_style';
        $s           = App::blog()->settings()->themes->get($theme_ident);
        if ($s !== null) {
            if (is_array($s) && isset($s['preview_not_mandatory']) && $s['preview_not_mandatory']) {
                return $content;
            }
        }

        return '';
    }
}
