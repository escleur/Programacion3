<?php

include_once "./figura_geometrica.php";

class Triangulo extends FiguraGeometrica{
    
    private $_altura;
    private $_base;
    
    public function __construct($b, $h){
        parent::__construct();
        $this->_altura = $h;
        $this->_base = $b;
        CalcularDatos();
    }

    protected function CalcularDatos(){
        $this->_perimetro = $this->_base + sqrt($this->_base*$this->_base+$this->_altura*$this->_altura) * 2;
        $this->_superficie = $this->_h * $this->_b/2;
    }

    public function Dibujar(){
        for($i=0;$i<$this->_ladoDos;$i++){
            for($j=0;$j<$this->_ladoUno;$j++){
                echo '*';
            }
            echo '<br/>';
        }

    }
}


