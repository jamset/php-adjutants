<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 17.12.15
 * Time: 22:14
 */
namespace Adjutants\Mixed;

class CheckJson
{
    /**Check if json was correctly converted to array | object
     * @param $value
     * @return bool
     */
    public static function checkJsonDecode($value, $array = null)
    {
        $result = true;

        if ($value === false) {
            $result = false;
        } else {
            if (is_null($array)) {
                if (!($value instanceof \StdClass)) {
                    $result = false;
                }
            } else {
                if (!(is_array($value))) {
                    $result = false;
                }
            }
        }

        return $result;
    }


}
