<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 31.07.15
 * Time: 1:09
 */

namespace AdjutantHandlers\Converters;

class ToBoolean
{
    public static function dataToBool($data)
    {
        return (!empty($data)) ? true : false;
    }


}