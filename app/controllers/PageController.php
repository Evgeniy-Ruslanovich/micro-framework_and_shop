<?php
namespace app\controllers;

class PageController extends AppController
{
    public function defaultAction(){
        echo "<h2>Привет, я Контроллер просмотра страниц</h2>";
    }
    public function viewAction(){
        echo "<h2>Привет, я Страница</h2>";
    }
}
