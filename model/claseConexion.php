<?php

class Conexion{
    protected static $host, $user, $password, $database, $objetoConexion;

    public static function crearConexion(){
        require_once("../controller/configBD.php");
        Conexion::$objetoConexion = new mysqli(
        Conexion::$host = HOST,
        Conexion::$user = USER,
        Conexion::$password = PASSWORD,
        Conexion::$database = DATABASE
        );
        if (Conexion::$objetoConexion->connect_errno){
            echo"Fallo al conectar a MySQL:";
            echo Conexion::$objetoConexion->connect_errno; 
        }else{
            echo "Coneccion Exitosa";
            return Conexion::$objetoConexion;
        }
    }

    public static function cerrarConexion(){
        Conexion::$objetoConexion->close();
    }

    public static function ejecutarSQL($sql){
        $resultado = Conexion::$objetoConexion->query($sql);
        return $resultado;
    }

    public static function obtenerFilasAfectadas(){
        return Conexion::$objetoConexion->affected_rows;
    }

    public static function obtenerFilas($resultado){
        return $resultado->fetch_row();
    }
}