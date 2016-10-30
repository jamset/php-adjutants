<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 01.10.16
 * Time: 20:14
 */
namespace K50\Adjutants\Abstracts;

use K50\Adjutants\Abstracts\Inventory\BaseNonspecificHandlerDto;
use K50\Adjutants\Abstracts\Inventory\BaseNonspecificResolverDto;
use K50\Adjutants\Interfaces\NonspecificResolver;

abstract class BaseNonspecificResolver extends BaseScript implements NonspecificResolver
{
    /**
     * @var BaseNonspecificHandlerDto
     */
    protected $resolverDto;

    /**
     * @return BaseNonspecificHandlerDto
     */
    public function getResolverDto()
    {
        return $this->resolverDto;
    }

    /**
     * @param BaseNonspecificResolverDto $resolverDto
     */
    public function setResolverDto(BaseNonspecificHandlerDto $resolverDto)
    {
        $this->resolverDto = $resolverDto;
    }


}
