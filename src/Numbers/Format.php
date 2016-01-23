<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 09.07.15
 * Time: 18:12
 */
namespace AdjutantHandlers\Numbers;

class Format
{
    public static function standardFormat($number, $decimal = 2, $decSep = ".", $thousandsSep = ",")
    {
        return number_format($number, $decimal, $decSep, $thousandsSep);
    }

}