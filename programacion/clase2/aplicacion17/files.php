<?php
$archivo = fopen('archivo.txt', 'a+');

echo fread($archivo, filesize('archivo.txt'));

$listaDeAutos = array();
while(feof($archivo)){
    $linea = fgets($archivo);
    $datos = explode('*', $line);
    if(count($datos) == 3){
        $autoNuevo = new Auto($datos[0],$datos[1],$datos[2] );
        array_push($listaDeAutos, $autoNuevo);
    } 
}

$fwhite = fwrite($archivo, 'fwrite'.PHP_EOL);


$close = fclose($archivo);

echo "fclose $close";