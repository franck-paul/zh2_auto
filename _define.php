<?php
/**
 * @brief zh2 auto, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Themes
 *
 * @copyright Franck Paul (carnet.franck.paul@gmail.com)
 * @copyright GPL-2.0
 */
if (!defined('DC_RC_PATH')) {
    return;
}

$this->registerModule(
    'zh2-auto',
    'Zen habits (based on eponym Wordpress theme designed by Leo Babuta)',
    'Franck Paul',
    '2.0',
    [
        'requires' => [['core', '2.24']],
        'type'     => 'theme',

        'details'    => 'https://open-time.net/?q=zh2-auto',
        'support'    => 'https://github.com/franck-paul/zh2-auto',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/zh2-auto/master/dcstore.xml',
    ]
);
