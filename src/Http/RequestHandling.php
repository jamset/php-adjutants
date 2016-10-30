<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 12.09.16
 * Time: 19:02
 */
namespace Adjutants\Http;

use Symfony\Component\HttpFoundation\Request;

class RequestHandling
{

    /**
     * @param Request $request
     * @return array|null
     */
    public static function getRequestParametersRegardlessOfMethod(Request $request)
    {
        $parameters = null;

        switch(true):
            case(!empty($request->query->all())):
                $parameters = $request->query->all();
                break;

            case(!empty($request->request->all())):
                $parameters = $request->request->all();
                break;
        endswitch;

        return $parameters;
    }

}
