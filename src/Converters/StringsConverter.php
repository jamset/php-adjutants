<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 09.10.16
 * Time: 20:17
 */
namespace K50\Adjutants\Converters;

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

}