<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 21.08.15
 * Time: 16:59
 */
namespace AdjutantHandlers\Objects\DataInit;

use AdjutantHandlers\Objects\DataInit\Abstr\BasicDataKeeper;
use AdjutantHandlers\Objects\DataInit\Interfaces\BasicConfigHandler;
use AdjutantHandlers\Objects\DataInit\Inventory\Exceptions\DataInitializerException;

class DataInitializer
{
    public function initData(BasicDataKeeper $dataKeeper)
    {
        $configGetter = ConfigResolver::resolveConfigHandler($dataKeeper->getConfigFileName());

        if (!($configGetter instanceof BasicConfigHandler)) {
            throw new DataInitializerException("Config getter not implements correct interface.");
        }

        $configInfo = $configGetter->getConfigInfo($dataKeeper->getConfigFilePath());

        $reflection = new \ReflectionClass($dataKeeper);

        $configInfo = (object)$configInfo;
        foreach ($configInfo as $configPropertyName => $configPropertyValue) {
            $method = $reflection->getMethod("set" . ucfirst($configPropertyName));
            if ($method) {
                $method->invoke($dataKeeper, $configPropertyValue);
            }
        }

        return $dataKeeper;
    }


}