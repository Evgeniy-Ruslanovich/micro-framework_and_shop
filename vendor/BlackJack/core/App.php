<?php

namespace BlackJack;

Class App
{
    public $properties;
    public function __construct()
    {
        session_start();
        //new ErrorHandler();
        $this->properties = Registry::getInstance();
        $this->properties->setPropertiesFromArray(include CONFIG_DIR . '/params.php');
        new ErrorHandler();
        $query = trim($_SERVER['QUERY_STRING'],'/');
        /*echo 'Запрос УРЛ: ' . $query . '<br>';
        \var_dump($query);
        echo "|Регул: " . \preg_match('#^([a-z]+)(/[a-z]+)?$#',$query);*/
        Router::dispatch($query);
    }
}
