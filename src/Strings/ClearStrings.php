<?php
namespace Adjutants\Strings;

class ClearStrings
{
    /**Deprecated
     *
     * @param $str
     * @return string
     */
    public static function cleanLastComma($str)
    {
        return substr($str, 0, -2);
    }

    /**
     * @param $str
     * @return string
     */
    public static function cleanLastChar($str)
    {
        return substr($str, 0, -2);
    }



}
