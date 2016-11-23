<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 14.10.16
 * Time: 21:51
 */
namespace Adjutants\Abstracts;

use Adjutants\Interfaces\Handler;
use Adjutants\Interfaces\ServiceRequestHandler;
use Adjutants\Interfaces\ServiceResultHandler;

abstract class BaseService implements ServiceRequestHandler, ServiceResultHandler
{

    /**
     * @var Handler
     */
    protected $handler;

    /**
     * @var mixed
     */
    protected $result;

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @return Handler
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * @param Handler $handler
     */
    public function setHandler(Handler $handler)
    {
        $this->handler = $handler;
    }



}
