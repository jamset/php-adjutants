<?php
/**
 * Created by PhpStorm.
 * User: nms
 * Date: 14.10.16
 * Time: 17:57
 */
namespace K50\Adjutants\Collections;

use Doctrine\Common\Collections\Collection;

class CollectionHandler
{

    /**
     * @param Collection $collection
     * @return int|string
     */
    public static function getKeyOfAddedCollectionElement(Collection $collection)
    {
        return ($collection->count() - 1);
    }

}
