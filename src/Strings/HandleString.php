<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 15.08.16
 * Time: 16:26
 */
namespace AdjutantHandlers\Strings;

class HandleString
{
    /**
     * @param \Exception $e
     * @return string
     */
    public static function getMainExceptionInfoAsString(\Exception $e)
    {
        return $e->getMessage() . "|" . $e->getFile() . "|" . $e->getLine();
    }

}