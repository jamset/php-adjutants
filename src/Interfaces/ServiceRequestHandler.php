<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 12.11.16
 * Time: 14:25
 */
namespace Adjutants\Interfaces;

use Symfony\Component\HttpFoundation\Request;

interface ServiceRequestHandler
{

    /**
     * @return mixed
     */
    public function handle();

    /**
     * @return null
     */
    public function initializeServiceDto(Request $request);

}
