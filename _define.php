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
$this->registerModule(
    'zh2_auto',
    'Zen habits (based on eponym Wordpress theme designed by Leo Babuta)',
    'Franck Paul',
    '6.2',
    [
        'requires'           => [['core', '2.30']],
        'type'               => 'theme',
        'information_config' => true,

        'details'    => 'https://open-time.net/?q=zh2_auto',
        'support'    => 'https://github.com/franck-paul/zh2_auto',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/zh2_auto/main/dcstore.xml',
    ]
);
