<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 24.10.15
 * Time: 13:48
 */
namespace AdjutantHandlers\Objects;

use Monolog\Logger;

class Logging
{
    public static function resolveMonologLogger($logger, $moduleName)
    {
        return ($logger instanceof Logger) ? $logger : new Logger("$moduleName empty logger.");
    }


}