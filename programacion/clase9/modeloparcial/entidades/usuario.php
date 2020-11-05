<?php
require_once './filemanager.php';

class Usuario extends FileManager{
    public $_email;
    public $_clave;

    public function __construct($email, $clave){
        $this->_email = $email;
        $this->_clave = $clave;
    }

//    public function saveAuto(){
//        $this->save($this.PHP_EOL, "auto.txt");
//    }

    public static function saveUsuarioJson($array){
        FileManager::saveJson("usuario.json", $array);

    }


    // public static function readAuto(){
    //     $lista = parent::read("auto.txt");
    //     $listaDeAutos = array();
    //     foreach($lista as $datos){
    //         $autoNuevo = new Auto($datos[0],$datos[1],$datos[2],$datos[3],$datos[4] );
    //         array_push($listaDeAutos, $autoNuevo);

    //     }
    //     return $listaDeAutos;

    // }
    public static function readUsuarioJson(){
        $lista = parent::readJson("usuario.json");
        $listaDeUsuarios = array();
        //var_dump($lista);
        foreach($lista as $datos){
            //var_dump($datos);
            if(count((array)$datos) == 2){
                $usuarioNuevo = new Usuario($datos->_email, $datos->_clave);
                array_push($listaDeUsuarios, $usuarioNuevo);
            }
        }
        return $listaDeUsuarios;

    }

    public function verificar($array){
        $login = false;
        foreach($array as $item){
            if($item->_email == $this->_email){
                if($item->_clave == $this->_clave){
                    $login = true;
                }
            }
        }
        return $login;
    }
    // public static function saveAutoSerialize($array){
    //     FileManager::saveSerialize("auto.ser", $array);

    // }

    // public static function readAutoSerialize(){
    //     $listaDeAutos = parent::readSerialize("auto.ser");
    //     return $listaDeAutos;
    // }

    // public function AgregarImpuestos($impuesto){
    //     if(is_numeric($impuesto)){
    //         $this->_precio = $this->_precio + $impuesto;
    //         return true;
    //     }
    //     return false;
    // }


    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }

    public function __toString(){
        return $this->_email.', '.$this->_clave;
    }
}


