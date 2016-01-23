<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 06.07.15
 * Time: 17:51
 */
namespace AdjutantHandlers\Arrays\Inventory;

class AddUpData
{

    /**
     *$var array for adding up data
     */
    protected $data;

    /**
     * @var \StdClass for properties names, that mustn't be adding up
     */
    protected $notAddUp;

    /**
     * @var string for property name, that contain group value; for ex. category id.
     * We have 5 categories and 20 arrays with data for this 5 categories (4 arrays for each category), that
     * should be adding up, grouping it by this value
     */
    protected $groupCriteriaPropertyName;

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
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return \StdClass
     */
    public function getNotAddUp()
    {
        return $this->notAddUp;
    }

    /**
     * @param \StdClass $notAddUp
     */
    public function setNotAddUp(\StdClass $notAddUp)
    {
        $this->notAddUp = $notAddUp;
    }

    /**
     * @return string
     */
    public function getGroupCriteriaPropertyName()
    {
        return $this->groupCriteriaPropertyName;
    }

    /**
     * @param string $groupCriteriaPropertyName
     */
    public function setGroupCriteriaPropertyName($groupCriteriaPropertyName)
    {
        $this->groupCriteriaPropertyName = $groupCriteriaPropertyName;
    }


}