<?php


require_once './Usuario.php';

/**
 * METODOS
 * GET: OBTENER RECURSOS.
 * POST: CREAR RECURSOS.
 * PUT: MODIFICAR RECURSOS.
 * DELETE: BORRAR RECURSOS.
 */

 
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? 0;

switch ($path) {
    case '/usuario':
        if ($method == 'POST') {

            if( isset($_POST['user']) && isset($_POST['user'])) {
                $nombreUsuario = $_POST['user'];
                $pass = $_POST['pass'];

                echo "Tu nombre es: ".$nombreUsuario."<br>";
                echo "Tu pass es: ".$pass;
             }


           $usuario = new Usuario($nombreUsuario, $pass);

           //Usuario::guardarJson('users.json', $usuario);
           $usuario->guardarTxt('users.txt');

            
        } else if ($method == 'GET') {
            $patente = $_GET['patente'] ?? '';
            $marca = $_GET['marca'] ?? '';
            $color = $_GET['color'] ?? '';
            $precio = $_GET['precio'] ?? 0;

           // $auto = new Auto($patente, $marca, $color, $precio);

            // $auto->_marca = 'Fiat';
            echo "<br>";
       //     echo $auto;
        } else {
            echo "Metodo no permitido";
        }
    break;

    case '/login':
        if ($method == 'POST') {

            if( isset($_POST['user']) && isset($_POST['user'])) {
                $nombreUsuario = $_POST['user'];
                
                $pass = $_POST['pass'];

               // $listaUsuariosJson = Usuario::leerJson('users.json');
                $listaUsuariosTxt = Usuario::leerTxt('users.txt');
                

               foreach($listaUsuariosTxt as $user)
                { 
                   if($user->_nombreUsuario == $nombreUsuario)
                   {
                      // var_dump($user->_pass);
                       if((strcmp($user->_pass, $pass)) == 0)
                       {

                            //echo "Contraseña correcta";
                       } else
                       {
                          // echo "Contraseña incorrecta";
                       }
                   } else
                   {
                       //echo "No se encontro el usuario";
                   }
                }
             }


            }
    break;


}







/*


die();

echo $method . "<br>" . $path . "<br>";

var_dump($_POST);
$patente = $_POST['patente'] ?? '';
$marca = $_POST['marca'] ?? '';
$color = $_POST['color'] ?? '';
$precio = $_POST['precio'] ?? 0;

//$auto = new Auto($patente, $marca, $color, $precio);

// $auto->_marca = 'Fiat';
echo "<br>";
echo $auto;


die();

var_dump($_GET);

$patente = $_GET['patente'] ?? '';
$marca = $_GET['marca'] ?? '';
$color = $_GET['color'] ?? '';
$precio = $_GET['precio'] ?? 0;

// if (isset($_GET['precio'])) {
//     $precio = $_GET['precio'];
// } else {
//     $precio = 0;
// }

$auto = new Auto($patente, $marca, $color, $precio);

// $auto->_marca = 'Fiat';
echo "<br>";
echo $auto;


// JSON

echo json_encode($arrayAutos);*/

