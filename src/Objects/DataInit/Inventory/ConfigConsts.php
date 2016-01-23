<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 21.08.15
 * Time: 18:47
 */
namespace AdjutantHandlers\Objects\DataInit\Inventory;

class ConfigConsts
{
    const INI = 'ini';
    const XML = 'xml';
    const YML = 'yml';
    const YML_DIST = 'yml.dist';

    protected static $extensions;

    public static function getExtensions()
    {
        return [
            self::INI,
            self::XML,
            self::YML,
            self::YML_DIST
        ];
    }


}