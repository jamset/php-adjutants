<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 27.11.15
 * Time: 1:45
 */
namespace AdjutantHandlers\Arrays;

class Converts
{
    public static function convertToString(array $array)
    {
        $resultStr = "";

        foreach ($array as $item) {
            $resultStr .= $item . ", ";
        }

        $resultStr = substr($resultStr, 0, -2);

        return $resultStr;
    }


}