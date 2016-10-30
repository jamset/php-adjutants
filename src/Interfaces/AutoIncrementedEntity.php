<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 19.10.16
 * Time: 23:11
 */
namespace K50\Adjutants\Interfaces;

interface AutoIncrementedEntity
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function setId($id);

}
