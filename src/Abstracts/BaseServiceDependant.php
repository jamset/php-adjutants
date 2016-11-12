<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 11.11.16
 * Time: 18:20
 */
namespace Adjutants\Abstracts;


abstract class BaseServiceDependant
{
    /**
     * @var BaseService
     */
    protected $service;

    /**
     * BaseServiceDependant constructor.
     * @param BaseService $service
     */
    public function __construct(BaseService $service)
    {
        $this->setService($service);
    }

    /**
     * @return BaseService
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param BaseService $service
     */
    public function setService(BaseService $service)
    {
        $this->service = $service;
    }




}
