<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 12.09.16
 * Time: 19:51
 */
namespace Adjutants\Http;

use Adjutants\Http\Inventory\Constants\HttpConstants;
use Adjutants\Inventory\AdjutantsConstants;
use Symfony\Component\HttpFoundation\JsonResponse;

class ResponseHandling
{
    /**
     * @var int|string
     */
    protected static $errorHttpCode;

    /**
     * @var string
     */
    protected static $errorMessage;

    /**
     * @return JsonResponse
     */
    public static function getStandardJsonBadResponse()
    {
        return new JsonResponse(
                [
                    AdjutantsConstants::STATUS_l => false,
                    AdjutantsConstants::MESSAGE_l => AdjutantsConstants::NOT_FOUND_n
                ], HttpConstants::NOT_FOUND_i
        );
    }

    /**
     * @return array
     */
    public static function makeErrorContent($httpCode, $errorMessage)
    {
        $errorContent = [
            AdjutantsConstants::STATUS_l => false,
            AdjutantsConstants::CODE_l => self::getErrorHttpCode(),
            AdjutantsConstants::MESSAGE_l => self::getErrorMessage()
        ];

       return $errorContent;
    }

    /**
     * @return string
     */
    public static function getErrorMessage()
    {
        return self::$errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public static function setErrorMessage($errorMessage)
    {
        self::$errorMessage = $errorMessage;
    }

    /**
     * @return int|string
     */
    public static function getErrorHttpCode()
    {
        return self::$errorHttpCode;
    }

    /**
     * @param int|string $errorHttpCode
     */
    public static function setErrorHttpCode($errorHttpCode)
    {
        self::$errorHttpCode = $errorHttpCode;
    }

}
