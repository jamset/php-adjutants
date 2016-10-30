<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 07.07.15
 * Time: 2:25
 */
namespace Adjutants\Arrays\Inventory;

class KeeperData
{

    protected $data;
    protected $keeper;
    protected $groupCriteria;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getKeeper()
    {
        return $this->keeper;
    }

    /**
     * @param mixed $keeper
     */
    public function setKeeper(\StdClass $keeper)
    {
        $this->keeper = $keeper;
    }

    /**
     * @return mixed
     */
    public function getGroupCriteria()
    {
        return $this->groupCriteria;
    }

    /**
     * @param mixed $groupCriteria
     */
    public function setGroupCriteria($groupCriteria)
    {
        $this->groupCriteria = $groupCriteria;
    }

}
