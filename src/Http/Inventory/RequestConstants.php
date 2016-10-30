<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 12.09.16
 * Time: 19:29
 */
namespace K50\Adjutants\Http\Inventory;

class RequestConstants
{
    const REQUEST_DOES_NOT_CONTAIN_n = 'Request does not contain';
    const PARAMETERS_l = 'parameters';

    /**
     * @return string
     */
    public static function getRequestDoesNotContainAnyParameters()
    {
        return self::REQUEST_DOES_NOT_CONTAIN_n." any ".self::PARAMETERS_l;
    }

    /**
     * @return string
     */
    public static function getRequestDoesNotContainNeededParameters()
    {
        return self::REQUEST_DOES_NOT_CONTAIN_n." needed ".self::PARAMETERS_l;
    }


}