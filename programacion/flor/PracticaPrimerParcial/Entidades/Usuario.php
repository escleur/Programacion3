<?php

require_once './filemanager.php';

Class Usuario{

    public $_email;
    public $_clave;

    public function __construct($email, $clave) {
        $this->_email = $email;
        $this->_clave = $clave;        
    }

    public function __get($name)
    {
        return $this->$name;
    }
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __toString()
    {
        return $this->_email.'*'.$this->_clave;
        //return json_encode($this);
    }

    public static function guardarUsuario($email, $clave){
        $usuario = new Usuario($email,$clave);
        filemanager::guardarJSON("Usuario.json", $usuario);
    }



    public static function LeerUsuario(){
        $arrayJson = filemanager::LeerJSON("Usuario.json");
        $arrayUsuarios = array();
        foreach($arrayJson as $datos){
            if(count((array)$datos) == 2){
                $usuarioNuevo = new Usuario($datos->_email, $datos->_clave);
                array_push($arrayUsuarios, $usuarioNuevo);
            }
        }
        return $arrayUsuarios; 
    }
    // public static function LeerUsuario(){
    //     $arrayUsuarios = filemanager::LeerJSON("Usuario.json");
    //     if($arrayUsuarios == null){
    //         echo 'Se encuentra vacio';
    //     }else{
    //         var_dump($arrayUsuarios);
    //     }
    // }

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

}