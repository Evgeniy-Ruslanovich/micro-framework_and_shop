<?php

namespace BlackJack;

Class App
{
    public static $app;//это будет типа контейнер свойств.. ну мало ли какие-то параметры записать
    public function __construct()
    {

        echo trim($_SERVER['QUERY_STRING'],'/') . '<br>';
        self::$app = Registry::GetInstance();
        //$reg2 = Registry::GetInstance();

    }
}
