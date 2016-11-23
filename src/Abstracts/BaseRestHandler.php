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
    protected $result;


    protected function initDefaultResult()
    {
        $this->setResult(ResponseHandling::getStandardJsonBadResponse());
    }

    /**
     * @return null
     */
    public function makeErrorResult()
    {
        $this->getResult()->setStatusCode($this->getStatusHttpCode());

        $this->getResult()->setData(
            ResponseHandling::makeErrorContent($this->getStatusHttpCode(), $this->getErrorMessage()));

        return null;
    }

    /**
     * @return mixed
     */
    public function makeSuccessfulResult()
    {
        $response = $this->getResult();

        $response->setStatusCode(HttpConstants::OK_i);
        $response->setData([AdjutantsConstants::STATUS_l => true]);

        return null;
    }

    /**
     * @return JsonResponse
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param JsonResponse $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }


}
