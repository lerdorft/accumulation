<?php

namespace Builder;

interface BuilderInterface
{
    /**
     * @return $this
     */
    public function createVehicle();

    /**
     * @return $this
     */
    public function addDoor();

    /**
     * @return $this
     */
    public function addEngine();

    /**
     * @return $this
     */
    public function addWheel();

    /**
     * @return BuilderInterface
     */
    public function getVehicle();
}