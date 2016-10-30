<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 15.10.16
 * Time: 20:02
 */
namespace Adjutants\Interfaces;

interface ServiceResponseHandler
{

    /**
     * @return mixed
     */
    public function makeSuccessfulServiceResponse();

    /**
     * @return mixed
     */
    public function makeErrorServiceResponse();

}
