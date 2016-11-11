<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 15.10.16
 * Time: 20:02
 */
namespace Adjutants\Interfaces;

use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @return Response
     */
    public function getResponse();

}
