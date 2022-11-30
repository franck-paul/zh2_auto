<?php
/**
 * @brief zh2, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Themes
 *
 * @copyright Franck Paul (carnet.franck.paul@gmail.com)
 * @copyright GPL-2.0
 */

namespace themes\zh2_auto;

if (!defined('DC_RC_PATH')) {
    return;
}

\l10n::set(__DIR__ . '/locales/' . \dcCore::app()->lang . '/main');

# Templates
\dcCore::app()->tpl->addBlock('IfPreviewIsNotMandatory', [__NAMESPACE__ . '\tplZh2Theme', 'IfPreviewIsNotMandatory']);

# Behaviors
\dcCore::app()->addBehavior('tplIfConditions', [__NAMESPACE__ . '\tplZh2Theme', 'tplIfConditions']);

class tplZh2Theme
{
    public static function tplIfConditions($tag, $attr, $content, $if)
    {
        if ($tag == 'SysIf' && isset($attr['has_blog_descr'])) {
            $sign = (bool) $attr['has_blog_descr'] ? '' : '!';
            $if[] = $sign . '(strlen(dcCore::app()->blog->desc) !== 0)';
        }
    }

    public static function IfPreviewIsNotMandatory($attr, $content)
    {
        $theme_ident = preg_replace('/[^a-zA-Z0-9_]/', '_', \dcCore::app()->blog->settings->system->theme) . '_style';
        $s           = \dcCore::app()->blog->settings->themes->get($theme_ident);
        if ($s !== null) {
            $s = @unserialize($s);
            if (is_array($s) && isset($s['preview_not_mandatory']) && $s['preview_not_mandatory']) {
                return $content;
            }
        }

        return '';
    }
}
