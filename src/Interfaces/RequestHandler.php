<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 11.10.16
 * Time: 16:39
 */
namespace Adjutants\Interfaces;

interface RequestHandler extends Handler
{

    /**
     * @return mixed
     */
    public function handleRequest();



}
