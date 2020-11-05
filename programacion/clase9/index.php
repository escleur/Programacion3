<?php // autoload
require __DIR__ '/vendor/autoload.php';
include './clases/usuario.php';
//composer install
//composer dump-autoload -o


use \Firebase\JWT\JWT
use Clases\Usuario;
use Controllers\UserController;

$usuario = new \Clases\Usuario;
//$usuario = new Usuario;

$usuario->nombre = 'Mario';

echo $usuario->nombre;

//pdo----------------------
$usuario = "root";
$contrasena= "";
try{
    $conn = new PDO('myspl:host=localhost; dbname=prueba', $usuario, $scontrasena);

    $query = $conn->query("select * FROM alumnos");

    echo $query->rowCount()."<br>";

    $alumnos = $query->fetchAll();
    foreach ($alumno as $key => $value) {
        echo $value['alumno'];
    
    }

    while($fila = $query->fetch(PDO::FETCH_OBJ)){
        var_dump($fila);
        echo $file->alumno."<br>";
    }
    while($fila = $query->fetch(PDO::FETCH_CLASS, "Clase\Usuario")){
        var_dump($fila);
        echo $fila->saludar();
    }

    $query = $conn->prepare("SELECT * FROM  alumno WHERE id=?  :id");

    $query->execute(array($id));

    $query->bindParam(':id', $id);


}catch(Throwable $th){
    echo $th;

}



