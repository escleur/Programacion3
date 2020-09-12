<?php

function esPar($n){
    return $n % 2 == 0;
}

function esImpar($n){
    return !esPar($n);
}


var_dump(esPar(2));
var_dump(esPar(3));
var_dump(esImpar(2));
var_dump(esImpar(3));