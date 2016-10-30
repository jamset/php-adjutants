<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 11.10.16
 * Time: 16:28
 */
namespace Adjutants\Abstracts;

use Adjutants\Http\Inventory\Constants\HttpConstants;
use Adjutants\Interfaces\RequestHandler;
use Adjutants\Interfaces\ResponseHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseRequestHandler extends BaseScript implements RequestHandler, ResponseHandler
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var bool
     */
    protected $isExceptionExist = false;

    /**
     * @var int|string
     */
    protected $statusHttpCode = HttpConstants::BAD_REQUEST_i;

    /**
     * @var string
     */
    protected $errorMessage;

    /**
     * {@inheritDoc}
     */
    public abstract function handleRequest();

    /**
     * {@inheritdoc}
     */
    public abstract function makeSuccessfulResponse();

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

    /**
     * @return boolean
     */
    public function isExceptionExist()
    {
        return $this->isExceptionExist;
    }

    /**
     * @param boolean $isExceptionExist
     */
    public function setIsExceptionExist($isExceptionExist)
    {
        $this->isExceptionExist = $isExceptionExist;
    }


    /**
     * @return int|string
     */
    public function getStatusHttpCode()
    {
        return $this->statusHttpCode;
    }

    /**
     * @param int|string $statusHttpCode
     */
    public function setStatusHttpCode($statusHttpCode)
    {
        $this->statusHttpCode = $statusHttpCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }


}
