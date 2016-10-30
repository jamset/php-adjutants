<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 01.10.16
 * Time: 20:14
 */
namespace Adjutants\Abstracts;

use Adjutants\Abstracts\Inventory\BaseNonspecificHandlerDto;
use Adjutants\Abstracts\Inventory\BaseNonspecificResolverDto;
use Adjutants\Interfaces\NonspecificResolver;

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
