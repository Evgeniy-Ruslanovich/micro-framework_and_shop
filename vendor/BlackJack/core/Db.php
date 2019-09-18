<?php

namespace BlackJack;

use \RedBeanPHP\R as R;
class Db
{
    use tSingleton;

    protected function __construct(){
        $config = require_once CONFIG_DIR . '/db_settings.php';

        /*\RedBeanPHP\*/R::setup($config['dsn'],$config['user'],$config['password']);
        $connect = /*\RedBeanPHP\*/R::testConnection();
        if($connect){
            //echo "<b>Соединились!</b>";
            /*\RedBeanPHP\*/R::freeze(true);
            if(DEBUG_MODE){
                /*\RedBeanPHP\*/R::debug(true,1);
            }
        } else {
            throw new \Exception("Нет соединения с БД", 500);
        }
    }
}
