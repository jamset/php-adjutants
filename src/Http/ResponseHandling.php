<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 12.09.16
 * Time: 19:51
 */
namespace K50\Adjutants\Http;

use K50\Adjutants\Http\Inventory\Constants\HttpConstants;
use K50\Adjutants\Inventory\AdjutantsConstants;
use Symfony\Component\HttpFoundation\Response;

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
     * @return Response
     */
    public static function getStandardJsonBadResponse()
    {
        return new Response(
            json_encode(
                [
                    AdjutantsConstants::STATUS_l => false,
                    AdjutantsConstants::MESSAGE_l => AdjutantsConstants::NOT_FOUND_n
                ]), HttpConstants::NOT_FOUND_i
        );
    }

    /**
     * @return string
     */
    public static function formErrorContent()
    {
        $errorContent = [
            AdjutantsConstants::STATUS_l => false,
            AdjutantsConstants::CODE_l => self::getErrorHttpCode(),
            AdjutantsConstants::MESSAGE_l => self::getErrorMessage()
        ];

       return json_encode($errorContent);
    }

    /**
     * @param Response $response
     * @param $message
     * @return array
     */
    public static function setResponseMessageArrayElement(Response $response, $message)
    {
        $responseContent = self::verifyResponseContentType($response->getContent());

        self::checkResponseSettingElementArgumentType(AdjutantsConstants::STRING_l, $message);

        $responseContent[AdjutantsConstants::MESSAGE_l] = $message;

        return $responseContent;
    }

    /**
     * @param Response $response
     * @param $status
     * @return array
     */
    public static function setResponseStatusArrayElement(Response $response, $status)
    {
        $responseContent = self::verifyResponseContentType($response->getContent());

        self::checkResponseSettingElementArgumentType(AdjutantsConstants::BOOL_l, $status);

        $responseContent[AdjutantsConstants::STATUS_l] = $status;

        return $responseContent;
    }

    /**
     * @param $responseContent
     * @return array
     */
    protected static function verifyResponseContentType($responseContent)
    {
        if(!is_array(json_decode($responseContent))){
            $responseContent = [];
        }

        return $responseContent;
    }

    /**
     * @param $type
     * @param $argument
     * @return null
     */
    protected static function checkResponseSettingElementArgumentType($type, $argument)
    {
        $typeFunction = "is_$type";

        if(!$typeFunction($argument)){
            throw new \InvalidArgumentException(serialize($argument));
        }

        return null;
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
