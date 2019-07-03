<?php

namespace BlackJack;

class ErrorHandler
{
    public function __construct()
    {
        if(DEBUG_MODE){
            error_reporting('E_ALL');
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e)
    {
        $this->logError($e->getMessage() ,$e->getFile() , $e->getLine());
        $this->displayError('Ошибка' ,$e->getMessage() ,$e->getFile() , $e->getLine(), $e->getCode());
    }
    protected function logError($message = '',$file = '', $line = '')
    {
        $date = '[' . date('Y-m-d H:i:s') . ']';
        $log_message = $date . $message . ' Файл:' . $file . ' строка:' . $line . "\n======\n";
        error_log($log_message,3,ROOT . '/tmp/errorLog.txt');
    }
    protected function displayError($errno, $message = '',$file = '', $line = '', $response_code = 404)
    {
        http_response_code($response_code);
        if($response_code == 404 && !DEBUG_MODE){
            require TPL_DIR . '/errors/404.php';
            die();
        }
        if(!DEBUG_MODE){
            require TPL_DIR . '/errors/prod.php';
            die();
        } else {
            require TPL_DIR . '/errors/dev.php';
            die();
        }
    }
}
