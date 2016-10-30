<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 01.09.15
 * Time: 18:24
 */
namespace Adjutants\Arrays;

use Adjutants\Arrays\Inventory\Exceptions\ArraysException;

class Arrays
{

    /**Allow to detect arrays keys, that divide array into portions by delimiter number.
     *
     * @param array $data
     * @param $delimitersNumbers
     * @return array
     * @throws ArraysException
     */
    public static function getDelimitersKeys(array $data, $delimitersNumbers)
    {
        $delimiterKeys = [];

        $elementsNumbers = count($data);

        if ($elementsNumbers <= $delimitersNumbers) {
            throw new ArraysException("Elements number not bigger than delimiter.");
        }

        $portion = ($elementsNumbers - 1) / $delimitersNumbers;
        $portion = (int)$portion;
        $stablePortion = $portion;

        foreach ($data as $key => $value) {
            if (!is_int($key)) {
                throw new ArraysException("Associative array. Expect indexed.");
            }

            if ($key === $portion) {
                $delimiterKeys[] = $key;
                $portion += $stablePortion;
            }
        }

        return $delimiterKeys;
    }


}
