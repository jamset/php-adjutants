<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 21.08.15
 * Time: 18:37
 */
namespace Adjutants\Objects\DataInit\Abstr;

abstract class BasicDataKeeper
{
    /**
     * @var string
     */
    protected $configFileName;

    /**
     * @var string
     */
    protected $configFileDir;

    /**
     * @var string
     */
    protected $configFilePath;

    /**
     * @return mixed
     */
    public function getConfigFileDir()
    {
        return $this->configFileDir;
    }

    /**
     * @param string $configFileDir
     */
    public function setConfigFileDir($configFileDir)
    {
        $this->configFileDir = $configFileDir;
        $this->configFilePath = $this->configFileDir . "/" . $this->configFileName;
    }

    /**
     * @return string
     */
    public function getConfigFileName()
    {
        return $this->configFileName;
    }

    /**
     * @param string $configFileName
     */
    public function setConfigFileName($configFileName)
    {
        $this->configFileName = $configFileName;
        $this->configFilePath = ($this->configFileDir) ? $this->configFilePath : $configFileName;
    }

    /**
     * @return mixed
     */
    public function getConfigFilePath()
    {
        return $this->configFilePath;
    }

    /**
     * @param mixed $configFilePath
     */
    public function setConfigFilePath($configFilePath)
    {
        $this->configFilePath = $configFilePath;
    }


}
