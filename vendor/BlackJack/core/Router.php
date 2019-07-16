<?php

namespace BlackJack;

class Router
{
    protected static $routes = [];//все правила маршрутов
    protected static $route = [];//текущий маршрут

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }
    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function getRoute()
    {
        return self::$route;
    }
    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            $controller = '\app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if(\class_exists($controller)){
                $objectController = new $controller(self::$route);
                $action = self::$route['action'] . 'Action';
                if(\method_exists($objectController,$action)){
                    $objectController->$action();
                    $objectController->getView();//Все, вызываем вьюшку, финита ля комедия
                } else {
                    throw new \Exception("Метод {$controller}->{$action} не найден", 500);
                }
            } else {
                throw new \Exception("Контроллер {$controller} не найден", 500);
            }
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }
    public static function matchRoute($url)
    {
        $url = self::removeGetParams($url);
        foreach (self::$routes as $regexp => $route) {//роут это то, что мы передали в правиле изначально. Там либо что-то есть, либо пустой пассив
            //echo "<br>ПРоверка строки \"" . $url . "\" на парттерн \"" . $pattern . "\"<br>";
            if(\preg_match("#{$regexp}#", $url, $matches)){
                //debug_arr($matches);
                //если похдодит какому-то правилу, то дальнейшую проверку прекращаем,
                //и записываем в роут полученные результаты
                foreach ($matches as $key => $value) {
                    if(\is_string($key)){
                        $route[$key] = $value;
                    }
                }
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }
                if(!isset($route['action'])){
                    $route['action'] = 'default';
                } else {
                    $route['action'] = self::lowerCamelCase($route['action']);
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                //\debug_arr($route);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    //CamelCase
    protected static function upperCamelCase($string)
    {
        $string = str_replace(' ','',ucwords(str_replace('-',' ',$string)));
        return $string;
    }
    //camelCase
    protected static function lowerCamelCase($string)
    {
        $string = \lcfirst(self::upperCamelCase($string));
        return $string;
    }
    //убирает гет-параметры из строки запроса, которая передается в роутинг. Сами параметры никуда не денутся, и будут доступны в $_GET
    protected static function removeGetParams($url)
    {
        //echo "<br>До обработки<br>"; var_dump($url);
        if($url){
            $url = trim(\stristr($url,'&',true),'/');
            //echo "<br>после стрстр<br>"; var_dump($url);
            if( strpos($url,'=') ){
                //echo "<br>Сработало<br>";
                $url = '';
            }
        }
        //echo "<br>После обработки<br>"; var_dump($url);
        return $url;
    }
}
