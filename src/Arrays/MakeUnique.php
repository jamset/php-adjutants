<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 28.07.15
 * Time: 10:02
 */
namespace Adjutants\Arrays;

class MakeUnique
{

    public static function uniqueByPropertyName(array $data, $propertyName)
    {
        $alreadyUsedValues = [];

        foreach ($data as $key => $item) {

            if (!in_array($item->$propertyName, $alreadyUsedValues)) {
                $uniqueItems[] = $item;
            }

            $alreadyUsedValues[] = $item->$propertyName;
        }

        return $uniqueItems;
    }


}
