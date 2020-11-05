<?php

namespace Clases;

class Usuario{
    public $alumno;

    public function saludar(){
        return "Hola ". $this->alumno;
    }
}