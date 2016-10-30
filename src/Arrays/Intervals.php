<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 05.11.15
 * Time: 1:56
 */
namespace Adjutants\Arrays;

use Adjutants\Arrays\Inventory\Exceptions\IntervalsInvalidArgument;
use Adjutants\Arrays\Inventory\IntervalsDto;

class Intervals
{
    /**
     * @param $rangeMin
     * @param $rangeMax
     * @param $portion
     * @return array
     */
    public static function getRangeIntervals($rangeMin, $rangeMax, $portion)
    {
        if ($rangeMin > $rangeMax || ($rangeMin + $portion) > $rangeMax || $rangeMax < $portion) {
            throw new IntervalsInvalidArgument("Not correct args size. Check ratio. RangeMin:"
                . serialize($rangeMin) . " RangeMax: " . serialize($rangeMax) . " Portion: " . serialize($portion));
        }

        $range = range($rangeMin, $rangeMax, $portion);

        $intervals = [];

        foreach ($range as $key => $item) {

            $intervalsDto = new IntervalsDto();

            if ($key === 0) {
                $intervalsDto->setFrom($item);
            } else {
                $intervalsDto->setFrom($item + 1);
            }

            $intervalsDto->setTo($item + $portion);

            $intervals[] = $intervalsDto;
        }

        return $intervals;
    }


}
