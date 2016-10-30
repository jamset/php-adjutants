<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 11.10.16
 * Time: 16:39
 */
namespace Adjutants\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface RequestHandler
{

    /**
     * @return mixed
     */
    public function handleRequest();

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
