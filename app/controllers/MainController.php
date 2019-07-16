<?php
namespace app\controllers;
use \RedBeanPHP\R as R;
class MainController extends AppController
{
    /*public function __construct($route){
        parent::__cunstruct($route);
        debug_arr($route);
    }*/
    public function defaultAction(){
        //echo "<h2>Привет, я МейнКонтроллер</h2>";,
        //echo $this->view;
        //\debug_arr($this->route);
        //echo __METHOD__;
        $this->setMetaData('МейнКонтроллер','описание','Ключевые слова');
        $this->setOutputData(['name' => 'Vasya']);
        $imperors = R::findAll('test');
        //\debug_arr($imperors);
        foreach ($imperors as  $imperor) {
            echo "<h4>{$imperor->id} {$imperor->name}</h4>";
        }
    /*    $cache = \BlackJack\Cache::getInstance();
        $cache->set('test',[1=>'bla',2=>'bla2']);
        $test_cache = $cache->get('test');
        debug_arr($test_cache);*/
        //$cache->clear('test');
    }
}
