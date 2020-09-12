<?php

class Auto{
    private $_id;
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($id, $marca, $color, $precio = null, $fecha = null){
        $this->_id = $id;
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
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


