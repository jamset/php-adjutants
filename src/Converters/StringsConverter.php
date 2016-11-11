<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 09.10.16
 * Time: 20:17
 */
namespace Adjutants\Converters;

class StringsConverter
{
    /**
     * @param $string
     * @return bool
     */
    public static function convertStringToBooleanStrict($string)
    {
        return ($string === 'true') ? true : false;
    }

    /**
     * @param $string
     * @return bool|null
     */
    public static function convertStringToBooleanIfNotTrueThanNull($string)
    {
        return ($string === 'true') ? true : null;
    }

    /**
     * @param $string
     * @param $delimiterToReplace
     * @return float
     */
    public static function convertStringToFloat($string, $delimiterToReplace)
    {
        return (float) str_replace($delimiterToReplace, ".", $string);
    }
}
