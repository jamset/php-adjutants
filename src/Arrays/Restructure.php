<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 11.04.15
 * Time: 17:48
 */
namespace Adjutants\Arrays;

use Adjutants\Arrays\Inventory\Exceptions\JsonException;
use Adjutants\Arrays\Inventory\Exceptions\RestructureException;

class Restructure
{
    /**Receive data and make first-level array
     * @param $multilevelData ; array || object
     */
    public static function makeFirstLevelArray($multilevelData)
    {
        $it = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($multilevelData));
        $keyValueArr = [];
        foreach ($it as $k => $v) {

            $decoded = json_decode($v);
            if (!$decoded || is_int($decoded)) {
                throw new JsonException('Not json.');
            }

            if (is_array($decoded) || is_object($decoded)) {
                $nestedIt = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($decoded));
                foreach ($nestedIt as $nK => $nV) {
                    $keyValueArr[$nK] = $nV;
                }

                continue;
            }

            $keyValueArr[$k] = $v;
        }

        return $keyValueArr;
    }

    /**Allow to detect arrays keys, that divide array into portions by delimiter number.
     *
     * @param array $data
     * @param $delimitersNumbers
     * @return array
     * @throws RestructureException
     */
    public static function getDelimitersKeys(array $data, $delimitersNumbers)
    {
        $delimiterKeys = [];

        $elementsNumbers = count($data);

        if ($elementsNumbers <= $delimitersNumbers) {
            throw new RestructureException("Elements number not bigger than delimiter.");
        }

        $portion = ($elementsNumbers - 1) / $delimitersNumbers;
        $portion = (int)$portion;
        $stablePortion = $portion;

        foreach ($data as $key => $value) {
            if (!is_int($key)) {
                throw new RestructureException("Associative array. Expect indexed.");
            }

            if ($key === $portion) {
                $delimiterKeys[] = $key;
                $portion += $stablePortion;
            }
        }

        return $delimiterKeys;
    }


} 
