<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 13.09.16
 * Time: 20:47
 */
namespace K50\Adjutants\Arrays;

class ArraysHandling
{

    /**
     * @param array $arrayWithKeys
     * @param array $arrayWithValues
     * @return array
     */
    public static function getIntersectionOfArrayKeysAndArrayValues(array $arrayWithKeys, array $arrayWithValues)
    {
        $intersection = [];

        $arrayKeys = array_keys($arrayWithKeys);

        foreach($arrayKeys as $keyValue){

            if(in_array($keyValue, $arrayWithValues)){
                $intersection[$keyValue] = $arrayWithKeys[$keyValue];
            }

        }

        return $intersection;
    }


}