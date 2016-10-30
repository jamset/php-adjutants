<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 17.01.16
 * Time: 20:06
 */
namespace Adjutants\Processes;

use Adjutants\Inventory\AdjutantConstants;
use Adjutants\Processes\Interfaces\PortsModelInterface;
use Adjutants\Processes\Inventory\Exceptions\ProcessesException;
use Adjutants\Processes\Inventory\Models\LaravelPortsModel;
use Adjutants\Processes\Inventory\ProcessesConstants;
use FractalBasic\Inventory\CommonConstants;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Monolog\Logger;

class Ports
{
    /**
     * @var PortsModelInterface
     */
    protected static $portsModel;

    /**
     * @var bool
     */
    protected static $portFound = false;

    /**
     * @var Logger
     */
    protected static $logger;

    /**
     * @param $requiredPortsNumber
     * @param null $portsModelPath
     * @param Logger $logger
     * @return array
     * @throws \Exception
     */
    public static function getFreePorts($requiredPortsNumber, $portsModelPath = null, Logger $logger = null)
    {
        if (is_null($requiredPortsNumber) || !(is_numeric($requiredPortsNumber))) {
            throw new \Exception("Ports number is in incorrect format: " . serialize($requiredPortsNumber));
        }

        if ($portsModelPath) {
            self::initPortsModel($portsModelPath);
        }

        if ($logger) {
            self::initLogger($logger);
        }

        $freePorts = [];

        for ($i = 0; $i < $requiredPortsNumber; $i++) {
            $attempts = 0;
            self::$portFound = false;

            do {

                $putativelyFreePort = mt_rand(ProcessesConstants::MIN_PORT, ProcessesConstants::MAX_PORT);
                $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

                try {

                    $bindRes = socket_bind($socket, AdjutantConstants::LOCALHOST_ADDRESS_ONLY_NUMBERS, $putativelyFreePort);

                    if ($bindRes) {

                        if (self::$portsModel) {
                            self::savePortStatus($portsModelPath, $putativelyFreePort);

                            if (self::$logger) {
                                self::$logger->info("Port set IN_USE: $putativelyFreePort");
                            }
                        }

                        $freePorts[] = $putativelyFreePort;
                    }

                } catch (\Exception $e) {

                    $attempts++;

                    if ($logger) {
                        $logger->error("Port address: $putativelyFreePort" . "|"
                            . $e->getMessage() . "|" . $e->getFile() . "|" . $e->getLine());
                    }
                }

                socket_close($socket);

            } while (!self::$portFound && ($attempts < ProcessesConstants::MAX_ATTEMPT_TO_GET_FREE_PORT));
        }

        return $freePorts;
    }

    /**
     * @param $portsModelPath
     * @param $putativelyFreePort
     * @return null
     * @throws ProcessesException
     */
    protected static function savePortStatus($portsModelPath, $putativelyFreePort)
    {
        switch (true) {
            case(self::$portsModel instanceof LaravelPortsModel):

                /**
                 * @var LaravelPortsModel $portsModel
                 */
                $portsModel = new $portsModelPath();
                $portsModel->getConnection()->beginTransaction();

                /**
                 * @var Collection $result
                 */
                $result = $portsModel::select(AdjutantConstants::STATUS_LC)
                    ->where(AdjutantConstants::PORT_NUMBER_LC, '=', $putativelyFreePort)
                    ->get();

                $portStatus = $result->first();
                $portIsFree = false;

                if (is_null($portStatus)) {
                    $portIsFree = true;
                } elseif (isset($portStatus->{AdjutantConstants::STATUS_LC})) {
                    if ($portStatus->{AdjutantConstants::STATUS_LC} === AdjutantConstants::FREE) {
                        $portIsFree = true;
                    }
                }

                if (!$portIsFree) {
                    throw new ProcessesException("Found putatively free port is already in use.");
                }

                /**
                 * @var LaravelPortsModel $saveResult
                 */
                $saveResult = $portsModel::updateOrCreate(
                    [CommonConstants::PORT_NUMBER_LC => $putativelyFreePort],
                    [CommonConstants::PORT_NUMBER_LC => $putativelyFreePort,
                        CommonConstants::STATUS => CommonConstants::IN_USE]
                );

                $status = $saveResult->getStatus();

                if ($status === CommonConstants::IN_USE) {
                    self::$portFound = true;
                }

                $portsModel->getConnection()->commit();
                break;
            default:
                throw new ProcessesException("Unknown model type.");
        }

        return null;
    }

    /**
     * @param $portsModelPath
     * @return null
     */
    protected static function initPortsModel($portsModelPath)
    {
        try {
            self::$portsModel = new $portsModelPath();
        } catch (\Exception $e) {
            if (self::$logger) {
                self::$logger->error($e->getMessage() . "|" . $e->getFile() . "|" . $e->getLine());
            }
        }

        return null;
    }

    /**
     * @param Logger $logger
     * @return null
     */
    protected static function initLogger(Logger $logger)
    {
        self::$logger = $logger;

        return null;
    }

    /**
     * @param array $usedPorts
     * @param $portsModelPath
     * @param Logger $logger
     * @return bool
     * @throws ProcessesException
     */
    public static function makeUsedPortsFree(array $usedPorts, $portsModelPath, Logger $logger = null)
    {
        $freeResult = [];

        if ($logger) {
            self::initLogger($logger);
        }

        self::initPortsModel($portsModelPath);

        $portsModelForRead = self::$portsModel;

        foreach ($usedPorts as $usedPort) {

            switch (true) {
                case($portsModelForRead instanceof LaravelPortsModel):

                    /**
                     * @var Collection $portInfo
                     */
                    $portInfo = $portsModelForRead::select()
                        ->where(AdjutantConstants::PORT_NUMBER_LC, '=', $usedPort)
                        ->get();

                    /**
                     * @var LaravelPortsModel $portsModel
                     */
                    $portsModel = $portInfo->first();

                    $portsModel->getConnection()->beginTransaction();

                    $portsModel->setPortNumber($usedPort);
                    $portsModel->setStatus(AdjutantConstants::FREE);

                    $freeResult[] = $portsModel->save();

                    $portsModel->getConnection()->commit();

                    break;
                default:
                    throw new ProcessesException("Unknown model.");
            }
        }

        return (in_array(false, $freeResult, true)) ? false : true;
    }

}
