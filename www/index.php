<?php
require_once('../config/init.php');
require_once(CORE . '/libs/functions.php');
/*echo "<h2>Главная страница</h2>";
var_dump($_SERVER['QUERY_STRING']);
echo "<br>";
var_dump($_GET);
echo "<br>";*/

$app = new BlackJack\App();
debug_arr($app->properties->properties);
