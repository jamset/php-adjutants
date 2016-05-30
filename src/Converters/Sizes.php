<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 12.01.16
 * Time: 21:14
 */
namespace AdjutantHandlers\Converters;

class Sizes
{
    public static function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = ['', 'k', 'M', 'G', 'T'];

        $suffix = $suffixes[floor($base)];
        $powResult = pow(1024, $base - floor($base));

        return round($powResult, $precision) . $suffix;
    }

}
