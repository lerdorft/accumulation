<?php


namespace Builder;


use Builder\Parts\Bike;
use Builder\Parts\Engine;
use Builder\Parts\Wheel;

class BikeBuilder implements BuilderInterface
{
    /**
     * @var Bike
     */
    protected $bike;

    /**
     * @return $this|mixed
     */
    public function createVehicle()
    {
        $this->bike = new Bike();

        return $this;
    }

    /**
     * @return $this|mixed
     */
    public function addDoor()
    {
        return $this;
    }

    /**
     * @return $this|mixed
     */
    public function addEngine()
    {
        $this->bike->setPart('engine', new Engine());
        return $this;
    }

    /**
     * @return $this|mixed
     */
    public function addWheel()
    {
        $this->bike->setPart('wheel_front', new Wheel());
        $this->bike->setPart('wheel_rear', new Wheel());
        return $this;
    }

    /**
     * @return Bike|mixed
     */
    public function getVehicle()
    {
        return $this->bike;
    }
}