<?php

namespace Builder\Parts;

abstract class Vehicle
{
    /**
     * @var
     */
    protected $data;

    /**
     * @param $key
     * @param $value
     */
    public function setPart($key, $value)
    {
        $this->data[$key] = $value;
    }
}