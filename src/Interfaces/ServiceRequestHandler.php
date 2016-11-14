<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 12.11.16
 * Time: 14:25
 */
namespace Adjutants\Interfaces;

interface ServiceRequestHandler
{

    /**
     * @return mixed
     */
    public function handle();

    /**
     * @return null
     */
    public function initializeServiceDto();

}
