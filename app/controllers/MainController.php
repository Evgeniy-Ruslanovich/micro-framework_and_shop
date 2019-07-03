<?php
namespace app\controllers;

class MainController
{
    public function __construct($route){
        debug_arr($route);
    }
    public function defaultAction(){
        echo "<h2>Привет, я МейнКонтроллер</h2>";
    }
}
