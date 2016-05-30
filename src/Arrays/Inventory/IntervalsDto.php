<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 05.11.15
 * Time: 1:57
 */
namespace AdjutantHandlers\Arrays\Inventory;

class IntervalsDto
{
    protected $from;
    protected $to;

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }


}