<?php

/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/11/15
 * Time: 13:56
 */
class Singleton
{
    /**
     * 实例
     *
     * @var
     */
    private static $instance;

    /**
     * 私有化构造方法
     *
     * Singleton constructor.
     */
    private function __construct()
    {

    }

    /**
     * 私有化克隆方法
     */
    private function __clone()
    {

    }

    /**
     * 提供对外获取实例方法
     *
     * @return Singleton
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 测试方法
     */
    public function sayHello()
    {
        echo 'hello world';
    }
}

$instance = Singleton::getInstance();
$instance->sayHello();