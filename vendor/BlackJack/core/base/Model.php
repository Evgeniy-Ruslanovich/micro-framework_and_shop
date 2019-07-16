<?php

namespace BlackJack\base;

abstract class Model
{
    public $attributes = [];
    public $rules = [];
    public $errors = [];

    public function __construct(){
        $Db = \BlackJack\Db::getInstance();
    }
}
