<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 23.11.16
 * Time: 17:57
 */
namespace Adjutants\Interfaces;

interface ResultHandler
{

    /**
     * @return mixed
     */
    public function makeSuccessfulResult();

    /**
     * @return mixed
     */
    public function makeErrorResult();


}
