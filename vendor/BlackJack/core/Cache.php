<?php

namespace BlackJack;

class Cache
{
    use tSingleton;
     /*
     *записать в кеш
     */
    public function set($key, $data, $time_to_store = 3600)//время в секундах, на которое должен храниться кеш
    {
        if($time_to_store){//в качестве времени может быть передан ноль или отрицательное значение, это будет означать, что кешировать не надо (может пригодиться в тестировании или разработке)
            $content['data'] = $data;
            $content['expiring'] = time() + $time_to_store;//время вообще нужно, чтобы когда мы получим кеш, мы узнали, устарел он или нет, если устарел, то лучше заново запросить изфу из базы
            if(\file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))){
                return true;
            }
        }
    }

    /*
    *Достать из кеша
    */
    public function get($key)
    {
        $fileName = CACHE . '/' . md5($key) . '.txt';
        if(\file_exists($fileName)){
            $content = \unserialize(\file_get_contents($fileName) );
            if($content['expiring'] < time()){//Если срок годности прошел
                @\unlink($fileName);
                return false;
            } else {
                return $content['data'];
            }
        } else {
            return false;
        }
    }

    /*
    *Очистить
    */
    public function clear($key)
    {
        $fileName = CACHE . '/' . md5($key) . '.txt';
        @\unlink($fileName);
    }
}
