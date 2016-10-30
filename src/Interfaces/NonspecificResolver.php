<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 29.09.16
 * Time: 22:14
 */
namespace K50\Adjutants\Interfaces;

use K50\Adjutants\Abstracts\Inventory\BaseNonspecificHandlerDto;
use K50\Adjutants\Abstracts\Inventory\BaseNonspecificResolverDto;

interface NonspecificResolver
{
    /**
     * @return BaseNonspecificResolverDto
     */
    public function getResolverDto();

    /**
     * @param BaseNonspecificResolverDto $resolverDto
     * @return mixed
     */
    public function setResolverDto(BaseNonspecificHandlerDto $resolverDto);
}