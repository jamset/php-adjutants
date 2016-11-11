<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 02.09.16
 * Time: 15:08
 */
namespace Adjutants\Strings;

use Adjutants\Inventory\AdjutantsConstants;

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

    /**
     * @param $parameterName
     * @return string
     */
    public static function parameterCanNotBeEmpty($parameterName)
    {
        return AdjutantsConstants::PARAMETER_ucf .'\''.$parameterName.'\''." ".AdjutantsConstants::CAN_NOT_BE_EMPTY_n;
    }
}
