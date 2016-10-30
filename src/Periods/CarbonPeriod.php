<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 30.10.15
 * Time: 23:49
 */
namespace Adjutants\Periods;

use Carbon\Carbon;

class Period
{

    /**
     * @param $dateStart
     * @param $defaultPeriod
     * @return static
     */
    public static function getDateStart($dateStart, $defaultPeriod)
    {
        if (!(is_null($dateStart))) {
            $dateStartCarbon = Carbon::createFromFormat("Y-m-d", $dateStart);
        } else {
            $dateStartCarbon = Carbon::today()->subDays($defaultPeriod);
        }

        return $dateStartCarbon;
    }

    /**
     * @param $dateEnd
     * @return static
     */
    public static function getDateEnd($dateEnd)
    {
        if (!(is_null($dateEnd))) {
            $dateEndCarbon = Carbon::createFromFormat("Y-m-d", $dateEnd);
        } else {
            $dateEndCarbon = Carbon::yesterday();
        }


        return $dateEndCarbon;
    }


}
