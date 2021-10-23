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
    'zh2-auto',                                                            // Name
    'Zen habits (based on eponym Wordpress theme designed by Leo Babuta)', // Description
    'Franck Paul',                                                         // Author
    '1.2',                                                                 // Version
    [
        'requires' => [['core', '2.16']], // Dependencies
        'type'     => 'theme',            // Type

        'details'    => 'https://open-time.net/?q=zh2-auto',       // Details URL
        'support'    => 'https://github.com/franck-paul/zh2-auto', // Support URL
        'repository' => 'https://raw.githubusercontent.com/franck-paul/zh2-auto/main/dcstore.xml'
    ]
);
