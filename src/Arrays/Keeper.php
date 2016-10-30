<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 07.07.15
 * Time: 2:25
 */
namespace Adjutants\Arrays;

use Adjutants\Arrays\Inventory\KeeperData;

class Keeper
{
    protected static $data;
    protected static $groupCriteria;
    protected static $keeper;

    public static function makeGroupedKeepersArr(KeeperData $keeperData)
    {
        self::$data = $keeperData->getData();
        self::$groupCriteria = $keeperData->getGroupCriteria();
        self::$keeper = $keeperData->getKeeper();

        $groupCriteriaUniqueValues = [];
        foreach (self::$data as $item) {
            foreach ($item as $key => $value) {
                if ($key === self::$groupCriteria) {
                    if (!in_array($value, $groupCriteriaUniqueValues, TRUE)) {
                        $groupCriteriaUniqueValues[] = $value;
                    }
                }
            }
        }

        $keepersArr = [];
        foreach ($groupCriteriaUniqueValues as $criteriaValue) {

            $groupKeeper = clone self::$keeper;
            $groupKeeper->{self::$groupCriteria} = $criteriaValue;

            $keepersArr[$criteriaValue] = $groupKeeper;
        }

        return $keepersArr;
    }


}
