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
if (!defined('DC_CONTEXT_ADMIN')) {
    return;
}

l10n::set(__DIR__ . '/locales/' . dcCore::app()->lang . '/admin');

$theme_ident = preg_replace('/[^a-zA-Z0-9_]/', '_', dcCore::app()->blog->settings->system->theme) . '_style';

$zh2_base = [
    // Options
    'preview_not_mandatory' => false,
];

$zh2_user = dcCore::app()->blog->settings->themes->get($theme_ident);
$zh2_user = @unserialize($zh2_user);
if (!is_array($zh2_user)) {
    $zh2_user = [];
}
$zh2_user = array_merge($zh2_base, $zh2_user);

if (!empty($_POST)) {
    try {
        # HTML
        $zh2_user['preview_not_mandatory'] = (int) !empty($_POST['preview_not_mandatory']);

        dcCore::app()->blog->settings->addNamespace('themes');
        dcCore::app()->blog->settings->themes->put($theme_ident, serialize($zh2_user));

        dcPage::addSuccessNotice(__('Theme configuration has been successfully updated.'));

        // Blog refresh
        dcCore::app()->blog->triggerBlog();

        // Template cache reset
        dcCore::app()->emptyTemplatesCache();
    } catch (Exception $e) {
        dcCore::app()->error->add($e->getMessage());
    }
}

echo '<h4>' . __('Instructions') . '</h4>';

echo __('<p>This theme is designed to display the last post on home page, using a single column.<br />
It doesn\'t use categories, nor tags, nor widgets, nor pictures and adapts the layout on various devices.</p>');

echo '<h5>' . __('header') . '</h5>';

echo __('<p>The blog description is used as second part of the title, after the blog\'s name, with a link to a static page (URL: about).<br />
You can modify this link by editing the <code>_top.html</code> template file (see <a href="blog_theme.php">Blog apparence</a> > <a href="plugin.php?p=themeEditor">Theme editor</a>).</p>');

echo '<h5>' . __('Subscribe links') . '</h5>';

echo __('<p>The subcribe links may be modified by editing the <code>_footer.html</code> template file, inside the first <code>&lt;div&gt;</code>, (see <a href="blog_theme.php">Blog apparence</a> > <a href="plugin.php?p=themeEditor">Theme editor</a>).<br />
By default you will find here the Atom Feed link of the blog, a link to the contact page (using the <strong>ContactMe</strong> plugin), a link to Twitter and Mastodon.</p>');

echo '<h5>' . __('Footer') . '</h5>';

echo __('<p>The footer\'s links may be modified by editing the <code>_footer.html</code> template file, inside the second <code>&lt;div&gt;</code>, (see <a href="blog_theme.php">Blog apparence</a> > <a href="plugin.php?p=themeEditor">Theme editor</a>).<br />
By default you will find here a link to a static page (URL: about), a link to the archives, a link to the official Dotclear web site and a link to the author of this theme.</p>');

echo '<h4>' . __('Options') . '</h4>';

echo '<p>' . form::checkbox('preview_not_mandatory', 1, $zh2_user['preview_not_mandatory']) .
'<label for="preview_not_mandatory" class="classic">' . __('Comment preview is not mandatory') . '</label></p>';

echo '<p class="form-note">' .
__('This theme cope with comments and trackbacks, if they are allowed (see <a href="blog_pref.php">blog parameters</a>).') . '</p>';
