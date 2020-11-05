<?php
//composer require firebase/php-jwt
//require_once './materia.php';
//require_once './usuario.php';
//require_once './profesor.php';
//require_once './asignacion.php';
//require_once './modelpdo/AccesoDatos.php';
require __DIR__.'/vendor/autoload.php';

use \Firebase\JWT\JWT;
use ModelPDO\AccesoDatos;
use ModelPDO\DatosController;
use Entidades\Materia;

$method = $_SERVER['REQUEST_METHOD'];
$path_info = $_SERVER['PATH_INFO'] ?? '';

$token = $_SERVER['HTTP_TOKEN'] ?? '';
$key = 'clave';
$status = 'no logueado';
try{
    $status = 'logged';
    $decoded = JWT::decode($token, $key, array('HS256'));
    //print_r($decoded);
    $status = $decoded->data->status ?? '';

}catch(Throwable $th){
    echo 'No logueado<br/>';
}
 
switch($path_info){
    case '/materia':
        if($status == 'logged'){
            switch($method){
                case 'POST': // AGREGA RECURSOS
                    $nombre = $_POST['nombre'] ?? '';
                    $cuatrimestre = $_POST['cuatrimestre'] ?? '';
                    $materia = new Materia(0, $nombre, $cuatrimestre);
                    /*--------------------------*/
                    //$auto->saveAuto();
                    /*--------------------------*/
                    //$lista = Materia::readMateriaJson();
                    //$materia->_id = Materia::autoId($lista);
                    //array_push($lista, $materia);
                    //Materia::saveMateriaJson($lista);
                    $materia->write();
                    /*--------------------------*/
                    //$lista = Auto::readAutoSerialize();
                    //array_push($lista, $auto);
                    //Auto::saveAutoSerialize($lista);
                    /*--------------------------*/


                    //echo $auto->__toString();
                break;
                case 'GET': // LISTA RECURSOS
                     
                   
                    /*--------------------------*/
                    //$lista = Auto::readAuto();
                    /*--------------------------*/
                    //$lista = Materia::readMateriaJson();
                    /*--------------------------*/
                    //$lista = Auto::readAutoSerialize();
                    /*--------------------------*/
                    $lista = Materia::read();
                
                    if($lista != null){
                        foreach($lista as $item){
                            echo $item->__toString()."<br/>";
                        }
                    }
                break;
            }
        }
    break;
    case '/asignacion':
       // (POST) asignacion: Recibe legajo del profesor, id de la materia y
       // turno (manana o noche) y lo guarda en el archivo
       // materias-profesores. No se debe poder asignar el mismo legajo en
       // el mismo turno y materia.
        if($status == 'logged'){
            switch($method){
                case 'POST': // AGREGA RECURSOS
                    $legajoProfesor = $_POST['legajoProfesor'] ?? '';
                    $materiaId = $_POST['materiaId'] ?? '';
                    $turno = $_POST['turno'] ?? '';
                    $asignacion = new Asignacion($legajoProfesor, $materiaId, $turno);
                    /*--------------------------*/
                    //$auto->saveAuto();
                    /*--------------------------*/
                    $lista = Asignacion::readAsignacionJson();
                    $cumple = $asignacion->esUnico($lista);
                    if($cumple){
                        array_push($lista, $asignacion);
                        Asignacion::saveAsignacionJson($lista);
                    }else{
                        echo 'Ya existe esa asignacion';
                    }
                    /*--------------------------*/
                    //$lista = Auto::readAutoSerialize();
                    //array_push($lista, $auto);
                    //Auto::saveAutoSerialize($lista);
                    /*--------------------------*/


                    //echo $auto->__toString();
                break;
                case 'GET': // LISTA RECURSOS
                    /*--------------------------*/
                    //$lista = Auto::readAuto();
                    /*--------------------------*/
                    $lista = Asignacion::readAsignacionJson();
                    /*--------------------------*/
                    //$lista = Auto::readAutoSerialize();
                    /*--------------------------*/
                    foreach($lista as $item){
                        echo $item->__toString()."<br/>";
                    }
                break;
            }
        }
    break;
    case '/usuario':
        switch($method){
            case 'POST': // AGREGA RECURSOS
                $email = $_POST['email'] ?? '';
                $clave = $_POST['clave'] ?? '';
                echo 'entra';
                $usuario = new Usuario($email, hash('sha256', $clave));
                echo 'entra';
                /*--------------------------*/
                //$auto->saveAuto();
                /*--------------------------*/
                $lista = Usuario::readUsuarioJson();
                array_push($lista, $usuario);
                Usuario::saveUsuarioJson($lista);
                /*--------------------------*/
                //$lista = Auto::readAutoSerialize();
                //array_push($lista, $auto);
                //Auto::saveAutoSerialize($lista);
                /*--------------------------*/


                //echo $auto->__toString();
            break;
        }
    break;
    case '/login':
        switch($method){
            case 'POST': // AGREGA RECURSOS
                $email = $_POST['email'] ?? '';
                $clave = $_POST['clave'] ?? '';
                $usuario = new Usuario($email, hash('sha256', $clave));

                /*--------------------------*/
                //$auto->saveAuto();
                /*--------------------------*/
                $lista = Usuario::readUsuarioJson();

                $login = $usuario->verificar($lista);

                $payload = array(
                    'data' => [
                        'email' => $email,
                        'status' => 'logged'
                    ]
                    );

                if($login){
                    $jwt = JWT::encode($payload, $key);
    
                    print_r($jwt);

                }else{
                    echo 'No se pudo logear';
                }

                // $token = $_SERVER['HTTP_TOKEN'];

                // try{
                //     $decoded = JWT::decode($jwt, $key, array('HS256'));
                //     print_r($decoded);
                // }catch(Throwable $th){

                // }
                // array_push($lista, $usuario);
                // Usuario::saveUsuarioJson($lista);
                /*--------------------------*/
                //$lista = Auto::readAutoSerialize();
                //array_push($lista, $auto);
                //Auto::saveAutoSerialize($lista);
                /*--------------------------*/


                //echo $auto->__toString();
            break;
        }
    break;
    case '/profesor':
        if($status == 'logged'){
            switch($method){
                case 'POST': // AGREGA RECURSOS
                    $nombre = $_POST['nombre'] ?? '';
                    $legajo = $_POST['legajo'] ?? '';
                    $profesor = new Profesor($nombre, $legajo);
                    /*--------------------------*/
                    //$auto->saveAuto();
                    /*--------------------------*/
                    $lista = Profesor::readProfesorJson();
                    $unique = $profesor->unique($lista);

                    if($unique){
                        array_push($lista, $profesor);
                        Profesor::saveProfesorJson($lista);

                    }else{
                        echo 'El legajo no es unico';
                    }
                    /*--------------------------*/
                    //$lista = Auto::readAutoSerialize();
                    //array_push($lista, $auto);
                    //Auto::saveAutoSerialize($lista);
                    /*--------------------------*/


                    //echo $auto->__toString();
                break;
                case 'GET': // LISTA RECURSOS
                    /*--------------------------*/
                    //$lista = Auto::readAuto();
                    /*--------------------------*/
                    $lista = Profesor::readProfesorJson();
                    /*--------------------------*/
                    //$lista = Auto::readAutoSerialize();
                    /*--------------------------*/
                    foreach($lista as $item){
                        echo $item->__toString()."<br/>";
                    }
                break;
            }
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