<?php
namespace BlackJack\base;

abstract class Controller
{
    public $route;
    public $controller;
    public $action;
    public $prefix;
    public $view;
    public $model;
    public $outputData = [];//данные, которые мы передаем из контроллера в видъ
    public $metaData = ['title' => '', 'description' => '', 'keywords' => ''];//метаданные страницы - title, description, keywords

    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->action = $route['action'];
        $this->prefix = $route['prefix'];
        $this->view = $route['action'];//на каждый экшон свой файлик с вьюшкой
        $this->model = $route['controller'];//модель по умолчанию называется также, как и котроллер
    }

    public function setOutputData($outputData)
    {
        $this->outputData = $data;
    }
    public function setMetaData($title = '', $description = '', $keywords = '')
    {
        $this->metaData['title'] = $title;
        $this->metaData['description'] = $description;
        $this->metaData['keywords'] = $keywords;
    }
}
