<?php
/*
function debug_arr($array,$level = 0){
    //echo "<br><b>Дебаг массива</b><br>";
    $indent = '';
    for ($i=0; $i < $level; $i++) {
        $indent .= "&nbsp&nbsp&nbsp&nbsp";
    }
    foreach ($array as $key => $value) {
        echo "{$indent}[{$key}] => {$value}<br>";
        if(is_array($value)){
            debug_arr($value,$level + 1);
        }
    }
    if($level === 0){echo "<br>";}
}*/
function debug_arr($array){
    echo "<pre>" . print_r($array, true) . "</pre>";
}
