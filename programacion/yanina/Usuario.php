<?php

    require_once "./FileHandler.php";

    class Usuario {
        public $_nombreUsuario;
        public $_pass;

        function __construct($nombreUsuario = '', $pass = '' ) {
            $this->_nombreUsuario = $nombreUsuario;
            $this->_pass = $pass;

        }
        

        public function guardarTxt(string $fileName) {
            FileHandler::guardarTxt($fileName, $this);
        }

      
        public static function leerTxt(string $path) {

            $archivoUsuarios = FileHandler::BringArray('users.txt');

            $listaUsuarios=[];

           /*for($i=0; $i < count($archivoUsuarios)-1; $i++)
            {   
               $datos = explode('*', $archivoUsuarios[$i]);

                if(count($datos) == 2)
                {
                    $usuario = new Usuario($datos[0], $datos[1]);
                    var_dump($datos);
                    array_push($listaUsuarios, $usuario);

                }

            }*/

            foreach($archivoUsuarios as $datos)
            {
                $user =  new Usuario($datos[0], $datos[1]);
                array_push($listaUsuarios, $user);
            }
            
            var_dump($listaUsuarios);

            return $listaUsuarios;
        }




        public static function guardarJson($objeto) {

            FileHandler::guardarJson($objeto, 'users.json');
        }

      
        public static function leerJson(string $path) {

           $archivoArray = File::leerJson($path);

           $listaUsuarios = [];

          foreach($archivoArray as $datos)
           {

               $nuevoUsuario = new Usuario($datos[0], $datos[1]);
               array_push($listaUsuarios, $nuevoUsuario);
           }

           return $listaUsuarios;
        }

        /*public function Equals($usuario1, $usuario2) {
            if($usuario1->_nombreUsuario == $usuario2->_nombreUsuario)
            {
                return true;
            } 
            return false;
        }*/

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function __get($name)
        {
            return $this->$name;
        }


        public function __toString(){
            return $this->_nombreUsuario.'*'.$this->_pass;
         }

    }


