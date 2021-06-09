<?php

interface Prototype
{
    /**
     * 浅拷贝
     *
     * @return mixed
     */
    public function shallowCopy();

    /**
     * 深拷贝
     *
     * @return mixed
     */
    public function deepCopy();
}

class ConcretePrototype implements Prototype
{
    /**
     * @var
     */
    private $name;

    /**
     * ConcretePrototype constructor.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return ConcretePrototype|mixed
     */
    public function shallowCopy()
    {
        return clone $this;
    }

    /**
     * @return mixed
     */
    public function deepCopy()
    {
        return unserialize(serialize($this));
    }
}

class Demo
{
    public $string;
}

$demo = new Demo();
$demo->string = '2222';

$obj1 = new ConcretePrototype($demo);
$obj2 = $obj1->shallowCopy();
$obj3 = $obj1->deepCopy();

$demo->string = '3333';

print_r($obj1->getName());
print_r($obj2->getName());
print_r($obj3->getName());
