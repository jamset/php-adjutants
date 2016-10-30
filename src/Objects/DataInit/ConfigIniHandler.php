<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 21.08.15
 * Time: 18:42
 */
namespace Adjutants\Objects\DataInit;

use Adjutants\Objects\DataInit\Interfaces\BasicConfigHandler;

class ConfigIniHandler implements BasicConfigHandler
{
    public function getConfigInfo($filePath)
    {
        return parse_ini_file($filePath);
    }


}
