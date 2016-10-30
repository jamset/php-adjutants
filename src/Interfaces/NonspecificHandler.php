<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 29.09.16
 * Time: 22:19
 */
namespace K50\Adjutants\Interfaces;

use K50\Adjutants\Abstracts\Inventory\BaseNonspecificHandlerDto;

interface NonspecificHandler
{

    /**
     * @return BaseNonspecificHandlerDto
     */
    public function getHandlerDto();

    /**
     * @param BaseNonspecificHandlerDto $handlerDto
     * @return mixed
     */
    public function setHandlerDto(BaseNonspecificHandlerDto $handlerDto);


}