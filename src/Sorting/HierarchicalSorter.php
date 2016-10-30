<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 08.09.16
 * Time: 20:12
 */
namespace K50\Adjutants\Sorting;

use K50\Adjutants\Inventory\AdjutantsConstants;
use K50\Adjutants\Sorting\Inventory\Exceptions\SorterException;
use K50\Adjutants\Sorting\Inventory\Exceptions\SorterInvalidArgumentException;

class HierarchicalSorter
{
    /**
     * @var int
     */
    protected static $hierarchyElementsNumber;

    /**
     * @var int
     */
    protected static $subsetOfHierarchyElementsNumber;

    /**
     * @var array
     */
    protected static $hierarchy;

    /**
     * @var array
     */
    protected static $subsetOfHierarchy;

    /**
     * @var string
     */
    protected static $hierarchyOrder = AdjutantsConstants::ASC;

    /**
     * @param array $subsetOfHierarchy
     * @param array $hierarchy
     * @param null $hierarchyOrder
     * @return null
     * @throws SorterException
     */
    public static function chooseSeniorElementInSubsetOfHierarchyByHierarchyKeys(array $subsetOfHierarchy,
                                                                                 array $hierarchy,
                                                                                 $hierarchyOrder = null)
    {
        $seniorElement = null;

        self::initPropertiesOfSortingByHierarchyKeys($subsetOfHierarchy, $hierarchy, $hierarchyOrder);

        if (!(self::isValidSubsetOfHierarchySize($subsetOfHierarchy, $hierarchy))) {
            throw new SorterInvalidArgumentException("Subset of hierarchy (" .
                self::$subsetOfHierarchyElementsNumber . ") larger then hierarchy (" .
                self::$hierarchyElementsNumber . ").");
        }

        $subsetCollatedWithHierarchyKeys = self::getSubsetCollatedWithHierarchyKeys();

        $seniorElement = self::getFirstElementOfSortedSubset($subsetCollatedWithHierarchyKeys, self::getHierarchyOrder());

        return $seniorElement;
    }

    /**
     * @return string
     */
    protected static function getHierarchyOrder()
    {
        return self::$hierarchyOrder;
    }

    /**
     * @param array $subset
     * @param $order
     * @return null
     * @throws SorterException
     */
    public static function getFirstElementOfSortedSubset(array $subset, $order)
    {
        $firstElementOfSortedSubset = null;

        switch (true):
            case($order === AdjutantsConstants::ASC):
                krsort($subset, SORT_NUMERIC);
                break;
            case($order === AdjutantsConstants::DESC):
                ksort($subset, SORT_NUMERIC);
                break;
            default:
                throw new SorterException("Unknown sort order: " . serialize(self::$hierarchyOrder));
        endswitch;

        foreach ($subset as $element) {
            $firstElementOfSortedSubset = $element;
            break;
        }

        return $firstElementOfSortedSubset;
    }

    /**
     * @param array $subsetOfHierarchy
     * @param array $hierarchy
     * @param $hierarchyOrder
     * @return null
     */
    protected static function initPropertiesOfSortingByHierarchyKeys(array $subsetOfHierarchy, array $hierarchy, $hierarchyOrder)
    {
        self::$hierarchy = $hierarchy;
        self::$subsetOfHierarchy = array_unique($subsetOfHierarchy);

        if ($hierarchyOrder) {
            self::$hierarchyOrder = $hierarchyOrder;
        }

        return null;
    }

    /**
     * @return array
     */
    protected static function getSubsetCollatedWithHierarchyKeys()
    {
        $subsetWithHierarchyKeys = [];

        $hierarchyKeys = self::getHierarchyKeys();

        foreach (self::$subsetOfHierarchy as $subsetElement) {

            $hierarchyKey = array_search($subsetElement, $hierarchyKeys, true);

            if ($hierarchyKey !== false) {
                $subsetWithHierarchyKeys[$hierarchyKey] = $subsetElement;
            }
        }

        return $subsetWithHierarchyKeys;
    }

    /**
     * @return array
     */
    protected static function getHierarchyKeys()
    {
        return array_keys(self::$hierarchy);
    }

    /**
     * @param array $subsetOfHierarchy
     * @param array $hierarchy
     * @return bool
     */
    public static function isValidSubsetOfHierarchySize(array $subsetOfHierarchy, array $hierarchy)
    {
        $result = true;

        self::$subsetOfHierarchyElementsNumber = count($subsetOfHierarchy);
        self::$hierarchyElementsNumber = count($hierarchy);

        if (self::$subsetOfHierarchyElementsNumber > self::$hierarchyElementsNumber) {
            $result = false;
        }

        return $result;
    }

}