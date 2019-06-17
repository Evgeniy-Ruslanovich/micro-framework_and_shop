<?php

define('DEBUG_MODE', 1);
define('ROOT',dirname(__DIR__));
define('WWW',ROOT . DIRECTORY_SEPARATOR . 'www');
define('APP',ROOT . DIRECTORY_SEPARATOR . 'app');
define('CORE',ROOT . DIRECTORY_SEPARATOR . 'vendor/BlackJack/core');
define('CACHE',ROOT . DIRECTORY_SEPARATOR . 'tmp/cache');
define('CONFIG_DIR',ROOT . DIRECTORY_SEPARATOR . 'config');
define('LAYOUT','default');//типа шаблон по умолчанию

$www_url = "http://" . $_SERVER['HTTP_HOST'] ; //$_SERVER['PHP_SELF'];
define('WEB_PATH',$www_url);

require_once(ROOT . '/vendor/autoload.php');
