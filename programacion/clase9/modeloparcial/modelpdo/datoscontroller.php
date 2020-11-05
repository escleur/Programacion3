<?php
namespace ModelPDO;

class DatosController{
    public static function readPDO($clase, $sql){
        $conn = AccesoDatos::dameUnObjetoAcceso();
        //echo $sql;
        $query = $conn->RetornarConsulta($sql);
        $query->execute();
        //var_dump($query);
        $lista = $query->fetchAll(\PDO::FETCH_CLASS, $clase);

        return $lista;
    }
    public static function writePDO($clase, $sql, $arr){
        $conn = AccesoDatos::dameUnObjetoAcceso();
        echo $sql;
        $query = $conn->RetornarConsulta($sql);
        foreach ($arr as $key => $value) {
            $query->bindParam($value[0], $value[1]);
        }
        $query->execute();
        return $conn->RetornarUltimoIdInsertado();
    }
}
