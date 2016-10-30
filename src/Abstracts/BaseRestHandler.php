<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 10.10.16
 * Time: 21:40
 */
namespace Adjutants\Abstracts;

use Adjutants\Http\Inventory\Constants\HttpConstants;
use Adjutants\Http\Inventory\Exceptions\RequestInvalidArgumentException;
use Adjutants\Http\ResponseHandling;
use Adjutants\Inventory\AdjutantsConstants;

abstract class BaseRestHandler extends BaseRequestHandler
{

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


}
