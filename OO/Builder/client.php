<?php

define('BASE_DIR', dirname(__DIR__));

spl_autoload_register('loader');

/**
 * @param $class
 */
function loader($class)
{
    require BASE_DIR . '/' . str_replace('\\', '/', $class) . '.php';
}

$director = new Builder\Director();

print_r($director->build(new Builder\BikeBuilder()));
print_r($director->build(new Builder\CarBuilder()));