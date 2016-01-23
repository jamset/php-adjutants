<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 13.09.15
 * Time: 19:34
 */
namespace AdjutantHandlers\Strings;

class ReformatString
{
    public static function convertToSnakeCase($string, $prefix = NULL)
    {
        $columnName = preg_replace_callback(
            '/([0-9A-Z])/',
            function ($matches) {
                return '_' . strtolower($matches[0]);
            },
            $string
        );

        if (isset($prefix)) {
            $columnName = str_replace($prefix, '', $columnName);
        }
        return $columnName;
    }

    public static function replaceSpecialChars($string)
    {
        $columnName = preg_replace_callback(
            '/([$\/\\\])/',
            function ($matches) {
                return 'z' . substr($matches[0], 1);
            },
            $string
        );
        return $columnName;
    }


}