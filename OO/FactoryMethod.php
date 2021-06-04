<?php

/**
 * Interface People
 *
 * 抽象产品
 */
interface People
{
    public function say();
}

/**
 * Class Man
 *
 * 具体产品-男人
 */
class Man implements People
{
    /**
     *
     */
    public function say()
    {
        echo 'Hi, I\'m a man.' . PHP_EOL;
    }
}

/**
 * Class Woman
 *
 * 具体产品-女人
 */
class Woman implements People
{
    /**
     *
     */
    public function say()
    {
        echo 'Hi, I\'m a woman.' . PHP_EOL;
    }
}

/**
 * Interface Factory
 *
 * 抽象工厂
 */
interface Factory
{
    public function create();
}

/**
 * Class ManFactory
 *
 * 具体工厂-男人工厂
 */
class ManFactory implements Factory
{
    /**
     * @return Man
     */
    public function create()
    {
        return new Man;
    }
}

/**
 * Class WomanFactory
 *
 * 具体工厂-女人工厂
 */
class WomanFactory implements Factory
{
    /**
     * @return Woman
     */
    public function create()
    {
        return new Woman;
    }
}

(new ManFactory())->create()->say();
(new WomanFactory())->create()->say();

