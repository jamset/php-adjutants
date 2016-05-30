<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 25.10.15
 * Time: 10:34
 */
namespace AdjutantHandlers\Arrays;

use AdjutantHandlers\Arrays\Inventory\Exceptions\ArraysCommonInvalidArgument;

class ArraysCommon
{
    /**
     * @param $receivedParams
     * @param $requiredParams
     * @return bool
     */
    public static function checkRequiredParams($receivedParams, array $requiredParams, $checkSimilar = null)
    {
        $result = true;

        if ((is_array($receivedParams) === false) && (($receivedParams instanceof \StdClass) === false)) {
            throw new ArraysCommonInvalidArgument("Not correct \$receivedParams: " . serialize($receivedParams));
        }

        self::recursionCheckItemForRequired($receivedParams, $requiredParams, $checkSimilar);

        if (!empty($requiredParams)) {
            $result = false;
        }

        return $result;
    }

    protected static function recursionCheckItemForRequired($receivedParams, &$requiredParams, $checkSimilar = null)
    {
        foreach ($receivedParams as $key => $item) {

            self::unsetFromArrayByElementIfExist($key, $requiredParams, $checkSimilar);

            if (is_array($item) || is_object($item)) {
                self::recursionCheckItemForRequired($item, $requiredParams, $checkSimilar);
            }
        }

        return null;
    }

    /**
     * @param $element
     * @param $array
     * @param $checkSimilar
     * @return null
     */
    public static function unsetFromArrayByElementIfExist($element, &$array, $checkSimilar)
    {
        if (is_string($element)) {

            if (in_array($element, $array)) {

                $key = array_search($element, $array);

                if ($key !== false) {
                    unset($array[$key]);
                }

            } else {

                if ($checkSimilar) {
                    foreach ($array as $similarKey => $similarItem) {
                        if (strpos($similarItem, $element) !== false) {
                            unset($array[$similarKey]);
                            break;
                        }

                        if (strpos($element, $similarItem) !== false) {
                            unset($array[$similarKey]);
                            break;
                        }
                    }
                }
            }
        }

        return null;
    }

}
