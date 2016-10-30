<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 29.09.16
 * Time: 22:14
 */
namespace Adjutants\Interfaces;

use Adjutants\Abstracts\Inventory\BaseNonspecificHandlerDto;
use Adjutants\Abstracts\Inventory\BaseNonspecificResolverDto;

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
