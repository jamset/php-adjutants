<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 21.08.15
 * Time: 18:44
 */
namespace AdjutantHandlers\Objects\DataInit;

use AdjutantHandlers\Objects\DataInit\Inventory\Exceptions\ConfigException;
use AdjutantHandlers\Objects\DataInit\Inventory\ConfigConsts;

class ConfigResolver
{

    /**Resolve config handler by file extension.
     *
     * @param $fileName
     * @return ConfigIniHandler|null
     * @throws ConfigException
     */
    public static function resolveConfigHandler($fileName)
    {
        $configHandler = NULL;

        preg_match("/(\.)([a-z]{3,})/", $fileName, $matches);

        $fileExtension = $matches[2];

        if (!in_array($fileExtension, ConfigConsts::getExtensions())) {
            throw new ConfigException("Not correct config file extension.");
        }

        switch ($fileExtension) {
            case(ConfigConsts::INI):
                $configHandler = new ConfigIniHandler();
                break;
            default:
                throw new ConfigException("Config handler wasn't set.");
        }

        return $configHandler;
    }


}