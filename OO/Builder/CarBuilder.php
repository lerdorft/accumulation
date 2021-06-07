<?php


namespace Builder;


use Builder\Parts\Car;
use Builder\Parts\Door;
use Builder\Parts\Engine;
use Builder\Parts\Wheel;

class CarBuilder implements BuilderInterface
{
    /**
     * @var Car
     */
    protected $car;

    /**
     * @return $this|mixed
     */
    public function createVehicle()
    {
        $this->car = new Car();
        return $this;
    }

    /**
     * @return $this|mixed
     */
    public function addDoor()
    {
        $this->car->setPart('right_door', new Door());
        $this->car->setPart('left_door', new Door());
        return $this;
    }

    /**
     * @return $this|mixed
     */
    public function addEngine()
    {
        $this->car->setPart('engine', new Engine());
        return $this;
    }

    /**
     * @return $this|mixed
     */
    public function addWheel()
    {
        $this->car->setPart('wheel_left_front', new Wheel());
        $this->car->setPart('wheel_left_rear', new Wheel());
        $this->car->setPart('wheel_right_front', new Wheel());
        $this->car->setPart('wheel_right_rear', new Wheel());
        return $this;
    }

    /**
     * @return Car|mixed
     */
    public function getVehicle()
    {
        return $this->car;
    }
}