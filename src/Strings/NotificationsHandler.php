<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 02.09.16
 * Time: 15:08
 */
namespace Adjutants\Strings;

class NotificationsHandler
{
    /**
     * @param string $scriptDesignation
     * @param null|string|int $notificationId
     * @param mixed $notificationData
     * @return string
     */
    public static function getNotificationString($scriptDesignation, $notificationId = null, $notificationData)
    {
        $notificationIdPart = '';

        if (!is_null($notificationId)) {
            $notificationIdPart = "id/number: $notificationId, ";
        }

        return $scriptDesignation . ", $notificationIdPart" . "data: " . serialize($notificationData);
    }

}
