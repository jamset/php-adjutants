<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 14.10.16
 * Time: 21:26
 */
namespace Adjutants\Interfaces;

interface ResponseHandler
{

    /**
     * @return mixed
     */
    public function makeSuccessfulResponse();

    /**
     * @return mixed
     */
    public function makeErrorResponse();


}
