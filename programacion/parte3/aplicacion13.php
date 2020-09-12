<?php

function chequea($palabra, $max){
    $retorno = 0;
    $lista = Array('Recuperatorio', 'Parcial', 'Programacion');
    if(strlen($palabra) <= $max && in_array($palabra, $lista)){
        $retorno = 1;
    }
    return $retorno;
}


echo chequea('Programacion', 13);