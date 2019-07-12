<?php
namespace BlackJack\base;

class View
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
        if(!empty($metaData)){
            $this->metaData = $metaData;
        }
    }
    public function render($data)
    {
        if(is_array($data)){
            extract($data);
        }
        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->action}.php";
        //echo "<br> файл вида: " . $viewFile . "<br>";
        if(\is_file($viewFile)){
            ob_start();
            include $viewFile;
            $content = ob_get_clean();
        }else{
            throw new \Exception("Не найден файл вида {$viewFile}", 500);
        }
        if($this->layout !== false){
            $layoutFile = APP . "/views/layouts/" . $this->layout . ".php";
            if(is_file($layoutFile)){
                //echo "<br> файл лейаута: " . $layuotFile . "<br>";
                $metatags = $this->makeMetaTags();
                include $layoutFile;
            } else {
                throw new \Exception("Не найден файл Шаблона {$layoutFile}", 500);
            }
        }
    }
    protected function makeMetaTags(){
        $html = "<title>{$this->metaData['title']}</title>" . PHP_EOL .
        "<meta name=\"description\" content=\"{$this->metaData['description']}\">" . PHP_EOL .
        "<meta name=\"keywords\" content=\"{$this->metaData['keywords']}\">";
        return $html;
    }
}
