<?php

namespace BlackJack;

class Registry
{
    use tSingleton;//добавляет метод ::getInstance() возвращающий единственный экземпляр класса

    public $properties = [];

    public function setProperty($name,$value)
    {
        $this->properties[$name] = $value;
    }
    public function getProperty($name)
    {
        if(isset($this->properties[$name])){
            return $this->properties[$name];
        }
    }
    //Получает массив параметров, и доавляет их к себе. Пригодится, чтоб взять настройки из файла
    public function setPropertiesFromArray($array)
    {
        $this->properties = array_merge($this->properties,$array);
    }
}
