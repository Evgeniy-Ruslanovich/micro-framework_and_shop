<?php

namespace BlackJack;

class Registry
{
    use tSingleton;//добавляет метод ::GetInstance() возвращающий единственный экземпляр класса

    public static $properties = [];
    public static function setProperty($name,$value)
    {
        self::$properties[$name] = $value;
    }
    public function getProperty($name)
    {
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
    }
}
