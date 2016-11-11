<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 11.10.16
 * Time: 16:28
 */
namespace Adjutants\Abstracts;

use Adjutants\Http\Inventory\Constants\HttpConstants;
use Adjutants\Http\Inventory\Exceptions\RequestInvalidArgumentException;
use Adjutants\Http\ResponseHandling;
use Adjutants\Interfaces\RequestHandler;
use Adjutants\Interfaces\ResponseHandler;
use Adjutants\Inventory\AdjutantsConstants;
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
     * @return mixed
     */
    public abstract function handle();

    /**
     * {@inheritDoc}
     * @return null
     */
    public function handleRequest()
    {
        $this->setResponse(ResponseHandling::getStandardJsonBadResponse());

        try {

            static::handle();

        } catch (RequestInvalidArgumentException $e) {

            $this->setIsExceptionExist(true);
            $this->getLogger()->notice($this->getExceptionNotificationMessage($e));
            $this->setErrorMessage($e->getMessage());

        } catch (\Exception $e) {

            $this->setIsExceptionExist(true);
            $this->getLogger()->error($this->getExceptionNotificationMessage($e));
            $this->setErrorMessage(AdjutantsConstants::SOMETHING_GOES_WRONG_n);

        } finally {

            if (!$this->isExceptionExist()) {
                static::makeSuccessfulResponse();
            } else {
                $this->makeErrorResponse();
            }

        }

        return null;
    }

    /**
     * @return null
     */
    public function makeErrorResponse()
    {
        $this->getResponse()->setStatusCode($this->getStatusHttpCode());

        ResponseHandling::setErrorHttpCode($this->getStatusHttpCode());
        ResponseHandling::setErrorMessage($this->getErrorMessage());
        $this->getResponse()->setContent(ResponseHandling::formErrorContent());

        return null;
    }

    /**
     * @return mixed
     */
    public function makeSuccessfulResponse()
    {
        $response = $this->getResponse();

        $response->setStatusCode(HttpConstants::OK_i);
        $response->setContent(json_encode([AdjutantsConstants::STATUS_l => true]));

        return null;
    }


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
