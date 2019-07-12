<?php
namespace app\controllers;

class MainController extends AppController
{
    /*public function __construct($route){
        parent::__cunstruct($route);
        debug_arr($route);
    }*/
    public function defaultAction(){
        //echo "<h2>Привет, я МейнКонтроллер</h2>";
        //echo $this->view;
        //\debug_arr($this->route);
        //echo __METHOD__;
        $this->setMetaData('МейнКонтроллер','описание','Ключевые слова');
        $this->setOutputData(['name' => 'Vasya']);
    }
}
