<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 12.10.16
 * Time: 20:59
 */
namespace K50\Adjutants\Abstracts;

abstract class BaseConstants
{

    /**
     * @return string
     */
    public static function getClassPath()
    {
        return static::class;
    }

    /**
     * @return array
     */
    public static function getClassConstants()
    {
        $reflectionClass = new \ReflectionClass(static::getClassPath());

        return $reflectionClass->getConstants();
    }


}
