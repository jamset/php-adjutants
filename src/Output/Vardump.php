<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 08.04.15
 * Time: 20:52
 */
namespace AdjutantHandlers\Output;


class Vardump
{
    public static function getVardump($var)
    {
        ob_start();
        var_dump($var);
        $var = ob_get_clean();

        return str_replace(['\n', '\r'], '', $var);
    }

} 