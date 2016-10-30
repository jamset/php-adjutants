<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 10.11.15
 * Time: 21:44
 */
namespace Adjutants\Processes;

use Adjutants\Processes\Interfaces\SignalsExecutor;

class PcntlSignalsRegistrator
{
    /**
     * @var SignalsExecutor
     */
    protected $signalExecutor;

    public function registerPcntlSignals()
    {
        pcntl_signal(SIGTERM, [$this, "sigHandler"]);
        //pcntl_signal(SIGHUP,  [$this, "sigHandler"]);
        //pcntl_signal(SIGUSR1, [$this, "sigHandler"]);

        return null;
    }

    public function sigHandler($signo)
    {
        switch ($signo) {
            case (SIGTERM):
                $this->signalExecutor->shutDown();
                die();
            default:
                die();
        }
    }

    /**
     * @return SignalsExecutor
     */
    public function getSignalExecutor()
    {
        return $this->signalExecutor;
    }

    /**
     * @param SignalsExecutor $signalExecutor
     */
    public function setSignalExecutor($signalExecutor)
    {
        $this->signalExecutor = $signalExecutor;
    }
}
