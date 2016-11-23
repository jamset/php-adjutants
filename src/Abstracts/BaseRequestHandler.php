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
use Adjutants\Interfaces\RequestHandler;
use Adjutants\Interfaces\ResultHandler;
use Adjutants\Inventory\AdjutantsConstants;
use Doctrine\Common\Collections\ArrayCollection;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;

abstract class BaseRequestHandler extends BaseScript implements RequestHandler, ResultHandler
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ArrayCollection
     */
    protected $result;

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
     * BaseRequestHandler constructor.
     */
    public function __construct()
    {
        $this->setLogger(new Logger("Without streams"));
    }

    /**
     * {@inheritDoc}
     * @return null
     */
    public function handleRequest()
    {
        static::initDefaultResult();

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
                static::makeSuccessfulResult();
            } else {
                static::makeErrorResult();
            }

        }

        return null;
    }

    /**
     * @return null
     */
    protected function initDefaultResult()
    {
        $defaultResult = new ArrayCollection();
        $defaultResult->set(AdjutantsConstants::STATUS_l, false);
        $defaultResult->set(HttpConstants::HTTP_CODE_l, HttpConstants::NOT_FOUND_i);

        $this->setResult($defaultResult);

        return null;
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

    /**
     * @return ArrayCollection
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param ArrayCollection $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }


}
