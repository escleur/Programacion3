<?php
    class FileHandler {

    public static function guardarTxt($path, $textoAEscribir)
    {
        $pudoEscribir = false;

        if(file_exists($path))
        {
            $archivo = fopen($path, 'a+');
        } else
        {
            $archivo = fopen($path, 'w');
        }

        
        fwrite($archivo, $textoAEscribir.PHP_EOL);

        $pudoEscribir = fclose($archivo);

        return $pudoEscribir;
    }


    public static function leerTxt(string $fileName)
    {
        $archivoTxt = [];

        $archivo = fopen($fileName, 'r');

        if($archivo != null)
        {
            while(!feof($archivo))
            {
                array_push($archivoTxt, str_replace(PHP_EOL, '', fgets($archivo)));
                var_dump($archivoTxt);                
            }
        }

        fclose($archivo);

        return $archivoTxt;
    }

    public static function BringArray(string $fileName = ''){
        //Traer array
        $linea = "";
        $datos = "";
        $lista = [];

        if($fileName !== ""){
            $archivo = fopen($fileName,'r');

            while (!feof($archivo)) {
                $linea = fgets($archivo);
                $datos = explode("*",$linea); //Me lo va a separar cada vez que encuentre un *

                // if(count($datos) === 5){
                    array_push($lista,$datos);
                // }
            }
            fclose($archivo);

        }else{
            throw new Exception('Filename no puede estar vacio.<br/>');
        }

        return $lista;
    }
 

    public static function guardarJson($objeto, $path)
    {
        if($objeto != null)
        {
                if(!file_exists($path))
                {
                    $archivo = fopen($path, 'w+');
                    fwrite($archivo, json_encode($objeto));
                } else
                {
                 /*   $datos = file_get_contents($path);

                    $json = json_decode($datos, true);
                    

                    array_push($json, $objeto);*/  // TODO probar esto 

                    $archivo = fopen($path, 'a');
                    
                    fwrite($archivo, json_encode($objeto));
                }


            fclose($archivo);
        }
    }


    public static function leerJson(string $path)
    {
        

        if(!empty($path))
        {
            $archivo = fopen($path, 'r');
            $fileSize = filesize($path);


            if($fileSize > 0)
            {
                $datos = fread($archivo, $fileSize);
                $json = json_decode($datos, true);
                

            } else
            {
                $readFile = '{}';
                $json = json_decode($readFile);
            }

            fclose($archivo);

        }
        return $json;
    }


}