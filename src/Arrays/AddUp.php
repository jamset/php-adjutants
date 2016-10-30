<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 04.07.15
 * Time: 21:30
 */
namespace Adjutants\Arrays;

use Adjutants\Arrays\Inventory\AddUpData;
use Adjutants\Arrays\Inventory\KeeperData;

class AddUp
{
    protected static $data;
    protected static $addUpKeeper;
    protected static $notAddUp;
    protected static $groupCriteria;

    public static function addUpByPropertiesNames(AddUpData $data)
    {
        self::$data = $data->getData();

        if (is_null($data->getNotAddUp())) {
            self::$notAddUp = new \StdClass();
        } else {
            self::$notAddUp = $data->getNotAddUp();
        }

        self::$groupCriteria = $data->getGroupCriteriaPropertyName();

        self::prepareAddUpKeeper();

        foreach (self::$data as $item) {
            self::addUp($item);
        }

        self::cleanAddUpKeeperStr();

        return self::$addUpKeeper;
    }

    protected function cleanAddUpKeeperStr()
    {
        foreach (self::$addUpKeeper as &$value) {
            if (is_string($value)) {
                $value = substr($value, 0, -2);
            }
        }

        return NULL;
    }

    protected function addUp($item)
    {

        foreach ($item as $itemPropertyName => $itemPropertyValue) {

            if (is_object(self::$addUpKeeper)) {

                self::$addUpKeeper = self::addUpDirect(self::$addUpKeeper, $itemPropertyName, $itemPropertyValue);

            } elseif (is_array(self::$addUpKeeper)) {

                foreach (self::$addUpKeeper as &$keeper) {
                    $keeper = self::addUpDirect($keeper, $itemPropertyName, $itemPropertyValue, self::$groupCriteria, $item);
                }
            }
        }

        return NULL;
    }

    protected function addUpDirect($keeper, $itemPropertyName, $itemPropertyValue, $groupCriteria = NULL, $item = NULL)
    {

        foreach ($keeper as $keeperPropertyName => &$keeperPropertyValue) {

            if ($groupCriteria) {
                if ($item->$groupCriteria !== $keeper->$groupCriteria) {
                    continue;
                }
            }

            if ($itemPropertyName === $keeperPropertyName) {

                if ($keeperPropertyName === $groupCriteria) {
                    continue;
                }

                if (property_exists(self::$notAddUp, $keeperPropertyName)) {
                    continue;
                } else {
                    $keeperPropertyValue = self::resolveAddUpType($itemPropertyValue, $keeperPropertyValue);
                }
            }
        }

        return $keeper;
    }

    protected function resolveAddUpType($itemPropertyValue, $keeperPropertyValue)
    {
        if (is_string($itemPropertyValue)) {
            $keeperPropertyValue .= $itemPropertyValue . ", ";
        } elseif (is_int($itemPropertyValue) || is_float($itemPropertyValue)) {
            $keeperPropertyValue += $itemPropertyValue;
        }

        return $keeperPropertyValue;
    }

    protected function prepareAddUpKeeper()
    {
        $keeper = new \StdClass();

        foreach (self::$data as $item) {
            foreach ($item as $key => $value) {
                $keeper->$key = NULL;
            }

            break;
        }

        if (!is_null(self::$groupCriteria)) {

            $keeperData = new KeeperData();
            $keeperData->setData(self::$data);
            $keeperData->setKeeper($keeper);
            $keeperData->setGroupCriteria(self::$groupCriteria);

            $keeper = Keeper::makeGroupedKeepersArr($keeperData);
        }

        self::$addUpKeeper = $keeper;

        return NULL;
    }


}
