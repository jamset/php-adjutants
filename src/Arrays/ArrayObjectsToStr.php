<?php
namespace Adjutants\Arrays;

class ArrayObjectsToStr
{
    public static function convert(array $arrayObjects, $propertyName = "user_id", $delimiter = ", ")
    {
        $strData = "";
        foreach ($arrayObjects as $object) {
            $strData .= $object->$propertyName . $delimiter;
        }

        $countCutSize = strlen(str_replace("\"", "", $delimiter));

        $strData = substr($strData, 0, -($countCutSize));

        return $strData;
    }

    public static function convertToArrStr(array $arrArraysObjects, $propertyName = "user_id", $delimiter = ", ")
    {
        $arrStr = [];

        foreach ($arrArraysObjects as $key => $arrayObjects) {
            $arrStr[$key] = self::convert($arrayObjects, $propertyName, $delimiter);
        }

        return $arrStr;
    }

} 
