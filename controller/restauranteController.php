<?php
include('../model/claseRestaurante.php');

$id_plato = $_POST['id_plato'];
$nombre_plato = $_POST['nombre_plato'];
$descripcion = $_POST['descripcion'];
$precio = $_POST ['precio'];

$restaurante = new Restaurante(
    $id_plato,
    $nombre_plato,
    $descripcion,
    $precio
    );

if(isset($_POST['Registrar'])){
    if($restaurante->validar()){
        $resultado = $restaurante->guardar();
        if($resultado){
        echo "Nuevo plato guardado correctamente";
        Conexion::cerrarConexion();
        }
    }
    else{
        echo "Error al guardar el nuevo palto";
    }
}

else if(isset($_POST['Eliminar'])&& !empty($_POST['id_plato'])){
    $resultado = $restaurante->eliminar();
    if($resultado){
        echo "Plato eliminado correctamente";
        header('./view/index.html');
        Conexion::cerrarConexion();
    }
    else{
        echo "Error al eliminar el plato";
    }
}

else if(isset($_POST['Consultar'])&& !empty($_POST['id_plato'])){
    $resultado = $restaurante->consultar();
    if($resultado){
        echo "Se consulto el plato correctamente";
        header('./view/index.html');
        Conexion::crearConexion();
    }
    else{
        echo "Error al consultar el palto";
    }
}


?>