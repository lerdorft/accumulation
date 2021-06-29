<?php

interface Component
{
	/**
	 * @return mixed
	 */
    public function operation();
}

class ConcreteComponent implements Component
{
	/**
	 *
	 */
    public function operation()
    {
        echo 'I\' m a face.' . PHP_EOL;
    }
}

abstract class Decorator implements Component
{
	/**
	 * @var Component
	 */
	protected $component;

	/**
	 * Decorator constructor.
	 *
	 * @param Component $component
	 */
	public function __construct(Component $component)
	{
		$this->component = $component;
	}
}

class ConcreteDecoratorA extends Decorator
{
	/**
	 * @var int
	 */
	protected $addedState = 1;

	/**
	 * @return mixed|void
	 */
	public function operation()
	{
		echo $this->component->operation() . 'Push ' . $this->addedState . ' cream！' . PHP_EOL;
	}
}

class ConcreteDecoratorB extends Decorator
{
	/**
	 * @var int
	 */
	protected $addedState = 2;

	/**
	 * @return mixed|void
	 */
	public function operation()
	{
		echo $this->component->operation() . 'Push ' . $this->addedState . ' cream！' . PHP_EOL;
	}
}


$component = new ConcreteComponent();
$component->operation();

echo '======================' . PHP_EOL;

$component = new ConcreteDecoratorA($component);
$component->operation();

echo '======================' . PHP_EOL;

$component = new ConcreteDecoratorB($component);
$component->operation();
