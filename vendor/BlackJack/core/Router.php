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
                } else {
                    echo "Метод {$controller}->{$action} не найден";
                }
            } else {
                echo "Класс контроллера $controller не найден";
                //throw new \Exception("Страница не найдена", 404);
            }
        } else {
            //echo "NO";
            throw new \Exception("Страница не найдена", 404);
        }
    }
    public static function matchRoute($url)
    {
        /*echo $url;
        return true;*/
        //debug_arr(self::$routes);
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
    protected static function upperCamelCase($string){
        $string = str_replace(' ','',ucwords(str_replace('-',' ',$string)));
        return $string;
    }
    //camelCase
    protected static function lowerCamelCase($string){
        $string = \lcfirst(self::upperCamelCase($string));
        return $string;
    }
}
