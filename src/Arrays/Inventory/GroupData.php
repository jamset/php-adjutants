<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 07.07.15
 * Time: 0:48
 */
namespace AdjutantHandlers\Arrays\Inventory;

class GroupData
{
    const QUANTITY = "_quantity";
    const EXAMPLES = "_examples";

    /**
     * @var array with \StdClass objects
     */
    protected $data;

    /**
     * @var \StdClass properties, for which script groups data
     */
    protected $groupProperties;

    /**
     * @var string with name of higher level grouping, when each item will contain element
     * with $properties and array of grouped values inside each.
     */
    protected $groupCriteriaHigherLevel;

    /**
     * @var string
     */
    protected $quantityPropertyName = self::QUANTITY;

    /**
     * @var int
     */
    protected $mostFrequentQuantity;

    /**
     * @var string
     */
    protected $groupResultType = GroupConsts::RESULT_GROUP_SORT_DATA;

    /**
     * @return string
     */
    public function getGroupResultType()
    {
        return $this->groupResultType;
    }

    /**
     * @param string $groupResultType
     */
    public function setGroupResultType($groupResultType)
    {
        $this->groupResultType = $groupResultType;
    }

    /**
     * @return int
     */
    public function getMostFrequentQuantity()
    {
        return $this->mostFrequentQuantity;
    }

    /**
     * @param int $mostFrequentQuantity
     */
    public function setMostFrequentQuantity($mostFrequentQuantity)
    {
        $this->mostFrequentQuantity = $mostFrequentQuantity;
    }

    /**
     * @return string
     */
    public function getQuantityPropertyName()
    {
        return $this->quantityPropertyName;
    }

    /**
     * @param string $quantityPropertyName
     */
    public function setQuantityPropertyName($quantityPropertyName)
    {
        $this->quantityPropertyName = $quantityPropertyName;
    }


    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return \StdClass
     */
    public function getGroupProperties()
    {
        return $this->groupProperties;
    }

    /**
     * @param \StdClass $groupProperties
     */
    public function setGroupProperties($groupProperties)
    {
        $this->groupProperties = $groupProperties;
    }

    /**
     * @return string
     */
    public function getGroupCriteriaHigherLevel()
    {
        return $this->groupCriteriaHigherLevel;
    }

    /**
     * @param string $groupCriteriaHigherLevel
     */
    public function setGroupCriteriaHigherLevel($groupCriteriaHigherLevel)
    {
        $this->groupCriteriaHigherLevel = $groupCriteriaHigherLevel;
    }


}