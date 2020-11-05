<?php
//require __DIR__.'/vendor/autoload.php';
namespace Entidades;
use ModelPDO\DatosController;

//require_once './filemanager.php';

class Materia //extends FileManager
{
    public $id;
    public $nombre;
    public $cuatrimestre;

    // public function __construct($id, $nombre, $cuatrimestre){
    //     $this->id = $id;
    //     $this->nombre = $nombre;
    //     $this->cuatrimestre = $cuatrimestre;
    // }

//    public function saveAuto(){
//        $this->save($this.PHP_EOL, "auto.txt");
//    }
/*
    public static function saveMateriaJson($array){
        FileManager::saveJson("materia.json", $array);

    }
*/

    // public static function readAuto(){
    //     $lista = parent::read("auto.txt");
    //     $listaDeAutos = array();
    //     foreach($lista as $datos){
    //         $autoNuevo = new Auto($datos[0],$datos[1],$datos[2],$datos[3],$datos[4] );
    //         array_push($listaDeAutos, $autoNuevo);

    //     }
    //     return $listaDeAutos;

    // }
/*  
    public static function readMateriaJson(){
        $lista = parent::readJson("materia.json");
        $listaDeMaterias = array();
        //var_dump($lista);
        foreach($lista as $datos){
            //var_dump($datos);
            if(count((array)$datos) == 3){
                $materiaNueva = new Materia($datos->_id,$datos->_nombre,$datos->_cuatrimestre);
                array_push($listaDeMaterias, $materiaNueva);
            }
        }
        return $listaDeMaterias;

    }
*/

    public static function read(){

        $arr = explode("\\", get_called_class());
        $tabla = ($arr[count($arr)-1]);
        return DatosController::readPDO(get_called_class(), "SELECT * FROM ".strtolower($tabla ));
    }

    public function write(){
        $arr = explode("\\", get_called_class());
        $tabla = ($arr[count($arr)-1]);
        $param = array(
            array(':nombre', $this->nombre),
            array(':cuatrimestre', $this->cuatrimestre)
        );
        
        $this->id = DatosController::writePDO(get_called_class(), "INSERT INTO ".strtolower($tabla)." VALUES (null, :nombre, :cuatrimestre )", $param);
        
        
        //$query->bindParam(':nombre', $this->nombre);
        
        //$query->bindParam(':cuatrimestre', $this->cuatrimestre);

    }

/*    public static function autoId($array){
        $id = 0;
        foreach($array as $item){
            if($item->_id > $id){
                $id = $item->_id;
            }
        }
        return $id + 1;
    }*/
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
        return $this->id.', '.$this->nombre.', '.$this->cuatrimestre;
    }
}


