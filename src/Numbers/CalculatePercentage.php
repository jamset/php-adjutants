<?php
namespace Adjutants\Numbers;


class CalculatePercentage
{

    public static function calculateArray($array, $commonQuantity = NULL, $decimal = 1)
    {
        if (isset($commonQuantity) && $commonQuantity !== 0) {
            foreach ($array as &$value) {
                $value = number_format($value / $commonQuantity * 100, $decimal, '.', '');
            }
        }

        return $array;
    }

    public static function calculateDirect($quantity, $commonQuantity, $decimal = 1, $float = NULL)
    {
        if ((int)$commonQuantity === 0) {
            return 0;
        }

        $result = (float)$quantity / (float)$commonQuantity * 100;

        if ($float === NULL) {
            $result = number_format($result, $decimal, '.', '');
        }

        return $result;
    }

} 
