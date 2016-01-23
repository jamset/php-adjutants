<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 07.07.15
 * Time: 0:59
 */
namespace AdjutantHandlers\Arrays;

use AdjutantHandlers\Arrays\Inventory\Exceptions\GroupException;
use AdjutantHandlers\Arrays\Inventory\GroupConsts;
use AdjutantHandlers\Arrays\Inventory\GroupData;
use AdjutantHandlers\Arrays\Inventory\KeeperData;
use AdjutantHandlers\Arrays\Inventory\SortData;

class Group
{
    protected static $groupKeeper;

    protected static $data;
    protected static $groupProperties;
    protected static $groupCriteriaHigherLevel;
    protected static $quantityPropertyName;
    protected static $mostFrequentQuantity;
    protected static $examples;
    protected static $groupResultType;

    /**Allow to group data with same properties by properties names.
     *
     * @param GroupData $groupData
     * @return mixed
     * @throws GroupException
     */
    public static function groupByPropertiesNames(GroupData $groupData)
    {
        self::$data = $groupData->getData();
        self::$groupProperties = $groupData->getGroupProperties();
        self::$groupCriteriaHigherLevel = $groupData->getGroupCriteriaHigherLevel();
        self::$quantityPropertyName = $groupData->getQuantityPropertyName();
        self::$groupResultType = $groupData->getGroupResultType();

        if (!is_null($groupData->getMostFrequentQuantity())) {
            self::$mostFrequentQuantity = $groupData->getMostFrequentQuantity();
        }

        self::prepareKeeper();
        self::removeRedundantProperties();

        foreach (self::$data as $basicKey => $item) {
            if (!($item instanceof \StdClass)) {
                throw new GroupException("Can't group. Not StdClass in \$item");
            }
            self::group($basicKey, $item);
        }

        switch (self::$groupResultType):
            case(GroupConsts::RESULT_GROUP_SORT_DATA):
                $result = self::getMostFrequentValuesForGrouped(self::$groupKeeper);
                break;
            case(GroupConsts::RESULT_GROUP_STRING):
                $result = self::$groupKeeper;
                break;
        endswitch;

        return $result;
    }

    protected function group($basicKey, $item)
    {
        foreach ($item as $itemPropertyName => $itemPropertyValue) {

            if (is_object(self::$groupKeeper)) {
                self::$groupKeeper = self::groupDirect(self::$groupKeeper, $itemPropertyName, $itemPropertyValue, NULL, $basicKey);
            } elseif (is_array(self::$groupKeeper)) {
                foreach (self::$groupKeeper as &$keeper) {
                    if ($item->{self::$groupCriteriaHigherLevel} === $keeper->{self::$groupCriteriaHigherLevel}) {
                        $keeper = self::groupDirect($keeper, $itemPropertyName, $itemPropertyValue,
                            self::$groupCriteriaHigherLevel, $basicKey, $item
                        );
                    }
                }
            }
        }

        return NULL;
    }

    protected function groupDirect(
        $groupKeeper, $itemPropertyName, $itemPropertyValue, $groupCriteria = NULL, $basicKey, $item = NULL
    )
    {
        foreach ($groupKeeper as $groupedKeeperPropertyName => &$groupedKeeperPropertyValue) {

            if ($groupCriteria) {
                if ($item->$groupCriteria !== $groupKeeper->$groupCriteria) {
                    continue;
                }
            }

            if (($groupedKeeperPropertyName === $itemPropertyName)
                && ($itemPropertyName !== self::$groupCriteriaHigherLevel)
            ) {

                switch (self::$groupResultType):
                    case(GroupConsts::RESULT_GROUP_SORT_DATA):
                        $keepData = new SortData();
                        $keepData->setValue($itemPropertyValue);

                        $quantityPropertyName = $groupedKeeperPropertyName . self::$quantityPropertyName;
                        $keepData->setValueQuantity(
                            self::$data[$basicKey]->$quantityPropertyName
                        );

                        $groupedKeeperPropertyValue[] = $keepData;
                        break;
                    case(GroupConsts::RESULT_GROUP_STRING):
                        $groupedKeeperPropertyValue .= $itemPropertyValue . ",";
                        break;
                endswitch;

            }
        }

        return $groupKeeper;
    }

    protected function getMostFrequentValuesForGrouped($data)
    {
        foreach ($data as &$item) {
            if ($item instanceof \StdClass) {
                foreach ($item as $groupPropertyName => &$groupPropertyValue) {

                    if ($groupPropertyName === self::$groupCriteriaHigherLevel) {

                        unset($item->$groupPropertyName);
                        continue;
                    }

                    $groupPropertyValue = Sort::getMostFrequentValues($groupPropertyValue, self::$mostFrequentQuantity);
                }
            } else {
                $item = Sort::getMostFrequentValues($item, self::$mostFrequentQuantity);
            }
        }

        return $data;
    }

    protected function removeRedundantProperties()
    {
        $dataArr = self::$data;

        $groupKeeper = self::$groupKeeper;
        if (is_array($groupKeeper)) {
            foreach ($groupKeeper as $keeperKey => $keeperInstance) {
                $keeper = $keeperInstance;
                break;
            }
        } elseif (is_object($groupKeeper)) {
            $keeper = $groupKeeper;
        }

        $keepersPropertiesQuantities = self::prepareKeepersAdditionalProperties($keeper, self::$quantityPropertyName);

        foreach ($dataArr as $basicKey => &$item) {
            foreach ($item as $propertyName => &$propertyValue) {
                if ((!property_exists($keeper, $propertyName)) &&
                    (!property_exists($keepersPropertiesQuantities, $propertyName))
                ) {
                    unset($item->$propertyName);
                }
            }
        }

        self::$data = $dataArr;

        return NULL;
    }

    protected function prepareKeepersAdditionalProperties($keeper, $additionalPropertyPart)
    {
        $keepersPropertiesQuantities = new \StdClass();

        foreach ($keeper as $propertyName => $propertyValue) {
            $keepersPropertiesQuantities->{$propertyName . $additionalPropertyPart} = NULL;
        }

        return $keepersPropertiesQuantities;
    }

    protected function prepareKeeper()
    {
        $keeper = new \StdClass();

        foreach (self::$groupProperties as $propertyName => $propertyValue) {
            $keeper->$propertyName = NULL;
        }

        if (!is_null(self::$groupCriteriaHigherLevel)) {

            $keeperData = new KeeperData();
            $keeperData->setData(self::$data);
            $keeperData->setKeeper($keeper);
            $keeperData->setGroupCriteria(self::$groupCriteriaHigherLevel);

            $keeper = Keeper::makeGroupedKeepersArr($keeperData);
        }

        self::$groupKeeper = $keeper;

        return NULL;
    }


}