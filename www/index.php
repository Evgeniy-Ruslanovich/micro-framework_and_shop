<?php
require_once('../config/init.php');
echo "<h2>Главная страница</h2>";
var_dump($_SERVER['QUERY_STRING']);
echo "<br>";
var_dump($_GET);
echo "<br>";

$app = new BlackJack\App();
