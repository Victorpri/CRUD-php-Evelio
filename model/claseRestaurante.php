<?php
include('claseConexion.php');

class Restaurante{

    private $id_plato;
    private $nombre_plato;
    private $descripcion;
    private $precio;
    private $validado = false;

    public function getId_plato(){
        return $this->id_plato;
    }
    public function setId_plato($id_plato){
        $this->id_plato = $id_plato;
    }

    public function getNombre_plato(){
        return $this->nombre_plato;
    }
    public function setNombre_plato($nombre_plato){
        $this->nombre_plato = $nombre_plato;
    }

    public function getDescripcion(){
        return $this ->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getPrecio(){
        return $this ->precio;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function __construct(
        $id_plato,
        $nombre_plato,
        $descripcion,
        $precio)
        {
        $this->id_plato = $id_plato;
        $this->nombre_plato = $nombre_plato;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }

    public function guardar(){
        $sql = "INSERT INTO restaurante(id_plato,
                                        nombre_plato,
                                        descripcion,
                                        precio) VALUES(
                                        '$this->id_plato',
                                        '$this->nombre_plato',
                                        '$this->descripcion',
                                        '$this->precio')";
        Conexion::crearConexion();
        $resultado = Conexion::ejecutarSQL($sql);
        return $resultado;
    }

    public function consultar(){
        $sql = "SELECT FROM restaurante";
        Conexion::crearConexion();
        $resultado = Conexion::ejecutarSQL($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM restaurante WHERE id_plato = '$this->id_plato'";
        Conexion::crearConexion();
        $resultado = Conexion::ejecutarSQL($sql);
        return $resultado;
    }

    public function actualizar(){

    }

    public function validar(){
        $errores=[];
        if(!$this->id_plato){
            $errores[] = 'El id del plato es obligatorio';
        }
        if(!$this->nombre_plato){
            $errores[] = 'El nombre del plato es obligatorio';
        }
        if(!$this->descripcion){
            $errores[] = 'La descripcion es obligatoria';
        }
        if(!$this->precio){
            $errores[] = 'El precio del plato es obligatorio';
        }
        if(empty($errores)){
            return $this->validado = true;
        }
        else{
            foreach($errores as $error){
                echo $error. '<br>';
            }
            return $this -> validado = false;
        }
    }


}