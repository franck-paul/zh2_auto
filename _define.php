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
        'type'     => 'theme'            // Type
    ]
);
