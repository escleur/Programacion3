<?php
require_once './filemanager.php';

class Profesor extends FileManager{
    public $_nombre;
    public $_legajo;

    public function __construct($nombre, $legajo){
        $this->_nombre = $nombre;
        $this->_legajo = $legajo;
    }

//    public function saveAuto(){
//        $this->save($this.PHP_EOL, "auto.txt");
//    }

    public static function saveProfesorJson($array){
        FileManager::saveJson("profesor.json", $array);

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
    public static function readProfesorJson(){
        $lista = parent::readJson("profesor.json");
        $listaDeProfesores = array();
        //var_dump($lista);
        foreach($lista as $datos){
            //var_dump($datos);
            if(count((array)$datos) == 2){
                $profesorNuevo = new Profesor($datos->_nombre,$datos->_legajo);
                array_push($listaDeProfesores, $profesorNuevo);
            }
        }
        return $listaDeProfesores;

    }

    public function unique($array){
        $isUnique = true;
        foreach($array as $item){
            if($item->_legajo == $this->_legajo){
                $isUnique = false;
            }
        }
        return $isUnique;
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
        return $this->_nombre.', '.$this->_legajo;
    }
}


