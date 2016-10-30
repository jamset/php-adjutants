<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 11.10.16
 * Time: 16:44
 */
namespace K50\Adjutants\Abstracts;

use AdjutantHandlers\Strings\HandleString;
use K50\Adjutants\Strings\NotificationsHandler;
use Monolog\Logger;

class BaseScript
{
    /**
     * @var string
     */
    protected $scriptDesignation;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @param \Exception $e
     * @param null $notificationId
     * @return string
     */
    public function getExceptionNotificationMessage(\Exception $e, $notificationId = null)
    {
        return NotificationsHandler::getNotificationString($this->getScriptDesignation(), $notificationId,
            HandleString::getMainExceptionInfoAsString($e));
    }

    /**
     * @return string
     */
    public function getScriptDesignation()
    {
        return $this->scriptDesignation;
    }

    /**
     * @param string $scriptDesignation
     */
    public function setScriptDesignation($scriptDesignation)
    {
        $this->scriptDesignation = $scriptDesignation;
    }

    /**
     * @return Logger
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param Logger $logger
     */
    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }

}