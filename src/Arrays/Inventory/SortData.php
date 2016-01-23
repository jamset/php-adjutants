<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 29.06.15
 * Time: 6:07
 */
namespace AdjutantHandlers\Arrays\Inventory;

class SortData
{

    protected $value;
    protected $valueQuantity;
    protected $valueExamples = "";

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValueQuantity()
    {
        return $this->valueQuantity;
    }

    /**
     * @param mixed $valueQuantity
     */
    public function setValueQuantity($valueQuantity)
    {
        $this->valueQuantity = $valueQuantity;
    }

    /**
     * @return mixed
     */
    public function getValueExamples()
    {
        return $this->valueExamples;
    }

    /**
     * @param mixed $valueExamples
     */
    public function setValueExamples($valueExamples)
    {
        $this->valueExamples = $valueExamples;
    }

}