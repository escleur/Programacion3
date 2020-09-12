<?php
require_once './filemanager.php';

class Auto extends FileManager{
    public $_id;
    public $_color;
    public $_precio;
    public $_marca;
    public $_fecha;

    public function __construct($id, $marca, $color, $precio = null, $fecha = null){
        $this->_id = $id;
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
    }
    public function saveAuto(){
        $this->save($this.PHP_EOL, "auto.txt");
    }

    public static function saveAutoJson($array){
        FileManager::saveJson("auto.json", $array);

    }


    public static function readAuto(){
        $lista = parent::read("auto.txt");
        $listaDeAutos = array();
        foreach($lista as $datos){
            $autoNuevo = new Auto($datos[0],$datos[1],$datos[2],$datos[3],$datos[4] );
            array_push($listaDeAutos, $autoNuevo);

        }
        return $listaDeAutos;

    }
    public static function readAutoJson(){
        $lista = parent::readJson("auto.json");
        $listaDeAutos = array();
        //var_dump($lista);
        foreach($lista as $datos){
            //var_dump($datos);
            if(count((array)$datos) == 5){
                $autoNuevo = new Auto($datos->_id,$datos->_marca,$datos->_color,$datos->_precio,$datos->_fecha );
                array_push($listaDeAutos, $autoNuevo);
            }
        }
        return $listaDeAutos;

    }

    public static function saveAutoSerialize($array){
        FileManager::saveSerialize("auto.ser", $array);

    }

    public static function readAutoSerialize(){
        $listaDeAutos = parent::readSerialize("auto.ser");
        return $listaDeAutos;
    }

    public function AgregarImpuestos($impuesto){
        if(is_numeric($impuesto)){
            $this->_precio = $this->_precio + $impuesto;
            return true;
        }
        return false;
    }


    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }

    public function __toString(){
        return $this->_id.'*'.$this->_marca.'*'.$this->_color.'*'.$this->_precio.'*'.$this->_fecha;
    }
}


