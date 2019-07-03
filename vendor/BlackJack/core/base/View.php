<?php
namespace BlackJack\base;

abstract class View
{
    public $route;
    public $controller;
    public $action;
    public $prefix;
    public $view;
    public $layout;
    public $outputData = [];//данные, которые мы передаем из контроллера в видъ
    public $metaData = ['title' => '', 'description' => '', 'keywords' => ''];//метаданные страницы - title, description, keywords

    public function __construct($route, $metaData, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->action = $route['action'];
        $this->prefix = $route['prefix'];
        $this->view = !empty($view) ? $view : $route['action'];
        if($layuot === false){//случай, когда мы вообще не хотим использовать никакой лейаут
            $this->layout = false;
        } else {
            $this->layout = !empty($layout) ? $layout : LAYOUT;//если не передан шаблон, то шаблон по умолчанию
        }
    }

}
