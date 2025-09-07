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
use Dotclear\Helper\Html\Form\Para;
use Dotclear\Helper\Html\Form\Set;
use Dotclear\Helper\Html\Form\Text;
use Dotclear\Helper\Process\TraitProcess;

class Config
{
    use TraitProcess;

    public static function init(): bool
    {
        return self::status(My::checkContext(My::CONFIG));
    }

    public static function process(): bool
    {
        if (!self::status()) {
            return false;
        }

        My::l10n('admin');

        return true;
    }

    public static function render(): void
    {
        if (!self::status()) {
            return;
        }

        // Form
        echo
        (new Set())
        ->items([
            (new Text('h4', __('Instructions'))),
            (new Para())
            ->items([
                (new Text(null, __('This theme is designed to display the last post on home page, using a single column.<br>It doesn\'t use categories, nor tags, nor widgets, nor pictures and adapts the layout on various devices.'))),
            ]),
            (new Text('h5', __('header'))),
            (new Para())
            ->items([
                (new Text(
                    null,
                    sprintf(
                        __('The blog description is used as second part of the title, after the blog\'s name, with a link to a static page (URL: about).<br>You can modify this link by editing the <code>_top.html</code> template file (see <a href="%s">Blog apparence</a> > <a href="%s">Theme editor</a>).'),
                        App::backend()->url()->get('admin.blog.theme'),
                        App::backend()->url()->get('admin.plugin.themeEditor')
                    )
                )),
            ]),
            (new Text('h5', __('Subscribe links'))),
            (new Para())
            ->items([
                (new Text(
                    null,
                    sprintf(
                        __('The subcribe links may be modified by editing the <code>_footer.html</code> template file, inside the first <code>&lt;div&gt;</code>, (see <a href="%s">Blog apparence</a> > <a href="%s">Theme editor</a>).<br>By default you will find here the Atom Feed link of the blog, a link to the contact page (using the <strong>ContactMe</strong> plugin), a link to Twitter and Mastodon.'),
                        App::backend()->url()->get('admin.blog.theme'),
                        App::backend()->url()->get('admin.plugin.themeEditor')
                    )
                )),
            ]),
            (new Text('h5', __('Footer'))),
            (new Para())
            ->items([
                (new Text(
                    null,
                    sprintf(
                        __('The footer\'s links may be modified by editing the <code>_footer.html</code> template file, inside the second <code>&lt;div&gt;</code>, (see <a href="%s">Blog apparence</a> > <a href="%s">Theme editor</a>).<br>By default you will find here a link to a static page (URL: about), a link to the archives, a link to the official Dotclear web site and a link to the author of this theme.'),
                        App::backend()->url()->get('admin.blog.theme'),
                        App::backend()->url()->get('admin.plugin.themeEditor')
                    )
                )),
            ]),
            (new Text('h4', __('Options'))),
            (new Para())
            ->items([
                (new Text(
                    null,
                    sprintf(
                        __('This theme cope with comments and trackbacks, if they are allowed (see <a href="%s">blog parameters</a>).'),
                        App::backend()->url()->get('admin.blog.pref')
                    )
                )),
            ]),
        ])
        ->render();
    }
}
