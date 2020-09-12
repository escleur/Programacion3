<?php

$array = Array('h', 'o', 'l', 'a');


function invierte($array){
    $arrayInvertido = Array();
    $j = 0;
    for($i = count($array); $i > 0; $i--){
        $arrayInvertido[$j++] = $array[$i-1];
    }
    return $arrayInvertido;
}

$array = invierte($array);

var_dump($array);
