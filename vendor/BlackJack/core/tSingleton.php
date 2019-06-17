<?php

namespace BlackJack;

trait tSingleton
{
    private static $instance;

    public static function GetInstance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
}
