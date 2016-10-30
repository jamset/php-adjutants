<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 22.06.15
 * Time: 15:00
 */
namespace Adjutants\Arrays;

use Adjutants\Arrays\Inventory\SortData;

class Sort
{
    const ALLOCATION_PERIOD = 2191; //6 years
    const MOST_FREQUENT_QUANTITY = 3;

    /**Allow to sort array with SortData elements.
     *
     * @param array $data
     * @param null $mostFrequentQuantity
     * @return SortData|array
     * @throws \Exception
     */
    public static function getMostFrequentValues(array $data, $mostFrequentQuantity = NULL, $allocationPeriod = NULL)
    {
        $mostFrequentValues = [];

        $allocatedData = self::allocateInfo($data, $allocationPeriod);

        usort($allocatedData, function ($a, $b) {

            if ($a->getValueQuantity() === $b->getValueQuantity()) {
                if ($a->getValue() === $b->getValueQuantity()) {
                    return 0;
                }
                return ($a->getValue() < $b->getValue()) ? -1 : 1;
            } else {
                return ($a->getValueQuantity() > $b->getValueQuantity()) ? -1 : 1;
            }
        });

        if (!$mostFrequentQuantity) {
            $mostFrequentQuantity = self::MOST_FREQUENT_QUANTITY;
        }

        for ($i = 0; $i < $mostFrequentQuantity; $i++) {

            $frequentValue = new SortData();
            $frequentValue->setValue($allocatedData[$i]->getValue());
            $frequentValue->setValueQuantity($allocatedData[$i]->getValueQuantity());

            $valueExamples = ($allocatedData[$i]->getValueExamples() !== "")
                ? substr($allocatedData[$i]->getValueExamples(), 0, -2)
                : $allocatedData[$i]->getValueExamples();

            $frequentValue->setValueExamples($valueExamples);

            if ($mostFrequentQuantity === 1) {
                $mostFrequentValues = $frequentValue;
            } else {
                $mostFrequentValues[] = $frequentValue;
            }
        }

        return $mostFrequentValues;
    }

    public static function allocateInfo(array $data, $allocationPeriod = NULL)
    {

        if (!$allocationPeriod) {
            $allocationPeriod = self::ALLOCATION_PERIOD;
        }

        $allocationArr = [];
        for ($i = 0; $i < $allocationPeriod; $i++) {
            $allocationArr[$i] = new SortData();
        }

        foreach ($data as $item) {

            $itemValue = $item->getValue();

            if ($itemValue === NULL) {
                continue;
            }

            if (array_key_exists($itemValue, $allocationArr)) {

                $allocationArr[$itemValue]->setValue($itemValue);

                $allocationArr[$itemValue]->setValueQuantity(
                    ($allocationArr[$itemValue]->getValueQuantity()
                        + (($item->getValueQuantity()) ? $item->getValueQuantity() : 1))
                );

                $allocationArr[$itemValue]->setValueExamples(
                    $allocationArr[$itemValue]->getValueExamples() . $item->getValueExamples() . ", "
                );

            } else {
                throw new \Exception ("Allocation period too small.");
            }

        }

        return $allocationArr;
    }
}
