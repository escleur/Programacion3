<?php

require_once './auto.php';


$method = $_SERVER['REQUEST_METHOD'];
$path_info = $_SERVER['PATH_INFO'] ?? '';

switch($path_info){
    case '/auto':
        switch($method){
            case 'POST': // AGREGA RECURSOS
                $id = $_POST['id'] ?? 1;
                $marca = $_POST['marca'] ?? '';
                $color = $_POST['color'] ?? '';
                $precio = $_POST['precio'] ?? 0;
                $fecha = $_POST['fecha'] ?? null;      
                $auto = new Auto($id, $marca, $color, $precio, $fecha);
                /*--------------------------*/
                //$auto->saveAuto();
                /*--------------------------*/
                //$lista = Auto::readAutoJson();
                //array_push($lista, $auto);
                //Auto::saveAutoJson($lista);
                /*--------------------------*/
                $lista = Auto::readAutoSerialize();
                array_push($lista, $auto);
                Auto::saveAutoSerialize($lista);
                /*--------------------------*/


                //echo $auto->__toString();
            break;
            case 'GET': // LISTA RECURSOS
                /*--------------------------*/
                //$lista = Auto::readAuto();
                /*--------------------------*/
                //$lista = Auto::readAutoJson();
                /*--------------------------*/
                $lista = Auto::readAutoSerialize();
                /*--------------------------*/
                foreach($lista as $item){
                    echo $item->__toString()."<br/>";
                }
            break;
        }
    break;
}




/*
$auto = new Auto("Fiat", "rojo", 1000)


$auto->agregarImpuesto(100);

var_dump($auto);

if(isset($_GET['marca'])){
    $marca = $_GET['marca'];

}
$precio = $_GET['precio'] ?? 0;

echo "Metodo" . $_SERVER['REQUEST_METHOD'];
$method $_SERVER['PATH_INFO'];
*/