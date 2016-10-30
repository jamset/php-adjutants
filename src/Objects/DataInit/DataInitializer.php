<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 21.08.15
 * Time: 16:59
 */
namespace Adjutants\Objects\DataInit;

use Adjutants\Objects\DataInit\Abstr\BasicDataKeeper;
use Adjutants\Objects\DataInit\Interfaces\BasicConfigHandler;
use Adjutants\Objects\DataInit\Inventory\Exceptions\DataInitializerException;

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
