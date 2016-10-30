<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 29.09.16
 * Time: 22:19
 */
namespace Adjutants\Interfaces;

use Adjutants\Abstracts\Inventory\BaseNonspecificHandlerDto;

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
