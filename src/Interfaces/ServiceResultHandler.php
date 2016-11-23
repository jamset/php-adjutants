<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 23.11.16
 * Time: 17:54
 */
namespace Adjutants\Interfaces;

interface ServiceResultHandler
{

    /**
     * @return mixed
     */
    public function makeSuccessfulServiceResult();

    /**
     * @return mixed
     */
    public function makeErrorServiceResult();

    /**
     * @return mixed
     */
    public function getResult();

}
