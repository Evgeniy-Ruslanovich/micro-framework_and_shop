<?php

namespace BlackJack;

Class App
{
    public $properties;
    public function __construct()
    {
        $this->properties = Registry::getInstance();
        $this->properties->setPropertiesFromArray(include CONFIG_DIR . '/params.php');
    }
}
