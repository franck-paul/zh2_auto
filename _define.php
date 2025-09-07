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
    '7.1',
    [
        'date'               => '2025-06-30T11:08:22+0200',
        'requires'           => [['core', '2.36']],
        'type'               => 'theme',
        'information_config' => true,
        'overload'           => true,

        'details'    => 'https://open-time.net/?q=zh2_auto',
        'support'    => 'https://github.com/franck-paul/zh2_auto',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/zh2_auto/main/dcstore.xml',
        'license'    => 'gpl2',
    ]
);
