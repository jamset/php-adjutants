<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 01.10.16
 * Time: 20:14
 */
namespace K50\Adjutants\Abstracts;

use K50\Adjutants\Abstracts\Inventory\BaseNonspecificHandlerDto;
use K50\Adjutants\Interfaces\NonspecificHandler;

abstract class BaseNonspecificHandler extends BaseScript implements NonspecificHandler
{
    /**
     * @var BaseNonspecificHandlerDto
     */
    protected $handlerDto;

    /**
     * @return BaseNonspecificHandlerDto
     */
    public function getHandlerDto()
    {
        return $this->handlerDto;
    }

    /**
     * @param BaseNonspecificHandlerDto $handlerDto
     */
    public function setHandlerDto(BaseNonspecificHandlerDto $handlerDto)
    {
        $this->handlerDto = $handlerDto;
    }


}