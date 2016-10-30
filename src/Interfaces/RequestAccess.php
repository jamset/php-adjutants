<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 30.10.16
 * Time: 19:19
 */
namespace Adjutants\Interfaces;

interface RequestAccess
{
    /**
     * @return Response
     */
    public function getResponse();

    /**
     * @param Response $response
     */
    public function setResponse(Response $response);

    /**
     * @return Request
     */
    public function getRequest();

    /**
     * @param Request $request
     */
    public function setRequest(Request $request);

}
