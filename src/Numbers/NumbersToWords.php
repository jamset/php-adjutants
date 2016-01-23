<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 26.07.15
 * Time: 6:16
 */
namespace AdjutantHandlers\Numbers;

class NumbersToWords
{

    public static function numberToNumberName($number)
    {
        $numbersNames = [
            'zero',
            'one',
            'two',
            'three',
            'four',
            'five',
            'six',
            'seven',
            'eight',
            'nine',
            'ten',
            'eleven',
            'twelve',
            'thirteen',
            'fourteen',
            'fifteen',
            'sixteen',
            'seventeen',
            'eighteen',
            'nineteen',
            'twenty',
            'twentyOne',
            'twentyTwo',
            'twentyThree',
            'twentyFour'
        ];

        return $numbersNames[$number];
    }


}