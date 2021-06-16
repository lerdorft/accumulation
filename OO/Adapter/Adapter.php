<?php

class Target
{
    /**
     * @return string
     */
    public function request(): string
    {
        return 'Target: The default target\'s behavior.';
    }
}

class Adaptee
{
    /**
     * @return string
     */
    public function specificRequest(): string
    {
        return '.eetpadA eht fo roivaheb laicepS';
    }
}

class TargetAdapter extends Target
{
    /**
     * @var Adaptee
     */
    private $adaptee;

    /**
     * Adapter constructor.
     * @param Adaptee $adaptee
     */
    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    /**
     * @return string
     */
    public function request(): string
    {
        return strrev($this->adaptee->specificRequest());
    }
}

/**
 * The client code supports all classes that follow the Target interface.
 */
function clientCode(Target $target)
{
    echo $target->request();
}

clientCode(new Target());
echo PHP_EOL;
clientCode(new TargetAdapter(new Adaptee()));
echo PHP_EOL;