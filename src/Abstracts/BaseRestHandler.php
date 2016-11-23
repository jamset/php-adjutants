<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 23.11.16
 * Time: 17:28
 */
namespace Adjutants\Abstracts;

use Adjutants\Http\Inventory\Constants\HttpConstants;
use Adjutants\Http\ResponseHandling;
use Adjutants\Inventory\AdjutantsConstants;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class BaseRestHandler extends BaseRequestHandler
{

    /**
     * @var JsonResponse
     */
    protected $response;

    /**
     * @return JsonResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param JsonResponse $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    protected function initDefaultResponse()
    {
        $this->setResponse(ResponseHandling::getStandardJsonBadResponse());
    }

    /**
     * @return null
     */
    public function makeErrorResponse()
    {
        $this->getResponse()->setStatusCode($this->getStatusHttpCode());

        $this->getResponse()->setData(
            ResponseHandling::makeErrorContent($this->getStatusHttpCode(), $this->getErrorMessage()));

        return null;
    }

    /**
     * @return mixed
     */
    public function makeSuccessfulResponse()
    {
        $response = $this->getResponse();

        $response->setStatusCode(HttpConstants::OK_i);
        $response->setData([AdjutantsConstants::STATUS_l => true]);

        return null;
    }


}
