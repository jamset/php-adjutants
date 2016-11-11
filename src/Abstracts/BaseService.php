<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 14.10.16
 * Time: 21:51
 */
namespace Adjutants\Abstracts;

use Adjutants\Interfaces\EntitiesHandler;
use Adjutants\Interfaces\Handler;
use Adjutants\Interfaces\RequestHandler;
use Adjutants\Interfaces\ServiceResponseHandler;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseService implements RequestHandler, ServiceResponseHandler
{

    /**
     * @var Handler
     */
    protected $handler;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
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
