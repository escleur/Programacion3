<?php

function agregar($auto){
    $archivo = fopen('archivo.txt', 'a+');
    $fwrite = fwrite($archivo, $auto->__toString().PHP_EOL);
    $close = fclose($archivo);
}

function leerTodo(){
    $archivo = fopen('archivo.txt', 'r');
    $listaDeAutos = array();
    
    while(!feof($archivo)){
        $linea = fgets($archivo);
        $datos = explode('*', $linea);
        if(count($datos) == 5){
            $autoNuevo = new Auto($datos[0],$datos[1],$datos[2],$datos[3],$datos[4] );
            array_push($listaDeAutos, $autoNuevo);
        } 
    }
    $close = fclose($archivo);
  
    
    return $listaDeAutos;
}

/*
echo fread($archivo, filesize('archivo.txt'));


$fwhite = fwrite($archivo, 'fwrite'.PHP_EOL);



echo "fclose $close";
*/

