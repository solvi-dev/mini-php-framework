<?php

namespace Core\Classes\Base;

class Singleton 
{
    /**
     * Инстансы классов.
     */
    private static $instances = [];

    /**
     * Делаем синглтон.
     */
    protected function __construct() { }
    protected function __clone() { }
    public function __wakeup()
    {
        throw new \Exception(static::class . " is singleton.");
    }

    /**
     * Получения экземпляра синглтона.
     */
    public static function getInstance()
    {
        $subclass = static::class;

        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }

        return self::$instances[$subclass];
    }
}