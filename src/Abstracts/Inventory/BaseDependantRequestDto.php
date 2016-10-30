<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 29.09.16
 * Time: 22:20
 */
namespace K50\Adjutants\Abstracts\Inventory;

use Symfony\Component\HttpFoundation\Request;

abstract class BaseDependantRequestDto extends BaseNonspecificResolverDto
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

}