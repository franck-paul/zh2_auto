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

\l10n::set(dirname(__FILE__) . '/locales/' . $_lang . '/main');

# Templates
$core->tpl->addBlock('IfPreviewIsNotMandatory', [__NAMESPACE__ . '\tplZh2Theme', 'IfPreviewIsNotMandatory']);

# Behaviors
$core->addBehavior('tplIfConditions', [__NAMESPACE__ . '\tplZh2Theme', 'tplIfConditions']);

class tplZh2Theme
{
    public static function tplIfConditions($tag, $attr, $content, $if)
    {
        if ($tag == 'SysIf' && isset($attr['has_blog_descr'])) {
            $sign = (boolean) $attr['has_blog_descr'] ? '' : '!';
            $if[] = $sign . '(strlen($core->blog->desc) !== 0)';
        }
    }

    public static function IfPreviewIsNotMandatory($attr, $content)
    {
        $theme_ident = preg_replace('/[^a-zA-Z0-9_]/', '_', $GLOBALS['core']->blog->settings->system->theme) . '_style';
        $s           = $GLOBALS['core']->blog->settings->themes->get($theme_ident);
        if ($s !== null) {
            $s = @unserialize($s);
            if (is_array($s)) {
                if (isset($s['preview_not_mandatory'])) {
                    if ($s['preview_not_mandatory']) {
                        return $content;
                    }
                }
            }
        }

        return '';
    }
}
