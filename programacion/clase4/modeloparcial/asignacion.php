<?php
require_once './filemanager.php';

class Asignacion extends FileManager{
    public $_legajoProfesor;
    public $_materiaId;
    public $_turno;

    public function __construct($legajoProfesor, $materiaId, $turno){
        $this->_legajoProfesor= $legajoProfesor;
        $this->_materiaId = $materiaId;
        $this->_turno = $turno;
    }

//    public function saveAuto(){
//        $this->save($this.PHP_EOL, "auto.txt");
//    }

    public static function saveAsignacionJson($array){
        FileManager::saveJson("materias-profesores.json", $array);

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
    public static function readAsignacionJson(){
        $lista = parent::readJson("materias-profesores.json");
        $listaDeAsignaciones = array();
        //var_dump($lista);
        foreach($lista as $datos){
            //var_dump($datos);
            if(count((array)$datos) == 3){
                $asignacionNueva = new Asignacion($datos->_legajoProfesor, $datos->_materiaId, $datos->_turno);
                array_push($listaDeAsignaciones, $asignacionNueva);
            }
        }
        return $listaDeAsignaciones;

    }

    public function esUnico($array){
        $unico = true;
        foreach($array as $item){
            if($item->_legajoProfesor == $this->_legajoProfesor && $item->_materiaId == $this->_materiaId && $item->_turno == $this->_turno ){
                $unico = false;
            }
        }
        return $unico;
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
        return $this->_legajoProfesor.', '.$this->_materiaId.', '.$this->_turno;
    }
}


