<?php

include_once "./figura_geometrica.php";

class Triangulo extends FiguraGeometrica{
    
    private $_altura;
    private $_base;
    
    public function __construct($b, $h){
        parent::__construct();
        $this->_altura = $h;
        $this->_base = $b;
        $this->CalcularDatos();
    }

    protected function CalcularDatos(){
        $this->_perimetro = $this->_base + sqrt($this->_base*$this->_base+$this->_altura*$this->_altura) * 2;
        $this->_superficie = $this->_altura * $this->_base/2;
    }

    public function Dibujar(){
        for($i=0;$i<$this->_altura;$i++){
            for($j=0;$j<$this->_base;$j++){
                if((($this->_base)/$this->_altura)*(($this->_altura)-$i) - $j <2.5)   {
                    echo '*';
                }else{
                    echo '&nbsp';
                }
            }
            echo '<br/>';
        }

    }
}


