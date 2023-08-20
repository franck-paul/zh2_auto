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

use dcCore;
use Dotclear\Core\Process;

class Frontend extends Process
{
    public static function init(): bool
    {
        return self::status(My::checkContext(My::FRONTEND));
    }

    public static function process(): bool
    {
        if (!self::status()) {
            return false;
        }

        // Templates
        dcCore::app()->tpl->addBlock('IfPreviewIsNotMandatory', FrontendTemplate::IfPreviewIsNotMandatory(...));

        // Behaviors
        dcCore::app()->addBehaviors([
            'tplIfConditions' => FrontendBehaviors::tplIfConditions(...),
        ]);

        return true;
    }
}
