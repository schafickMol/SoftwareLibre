<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("./conf/conf.php");
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = isset($_POST['nombre']) ? $_POST['nombre']: "";
$tel = isset($_POST['tel']) ? $_POST['tel']: "";
$dui = isset($_POST['dui']) ? $_POST['dui']: "";
$correo = isset($_POST['correo']) ? $_POST['correo']: "";
$direccion = isset($_POST['direccion']) ? $_POST['direccion']: "";
$bandera = isset($_POST['bandera']) ? $_POST['bandera']: "";

if ($bandera == 1) {
    $consulta = "INSERT INTO cliente (nombre, tel, dui, correo, direccion) VALUES (:nombre, :tel, :dui, :correo, :direccion)";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':tel', $tel);
    $resultado->bindParam(':dui', $dui);
    $resultado->bindParam(':correo', $correo);
    $resultado->bindParam(':direccion', $direccion);

    if ($resultado->execute()) {

        header("Location: index.php");
    } else {
        echo "Error al insertar los datos";
    }

} else if ($bandera == 2) {
} else {

    $id = isset($_GET['id']) ? $_GET['id'] : ""; 
    $consultita = "DELETE FROM cliente WHERE id = :id";
    $resultado = $conexion->prepare($consultita);
    $resultado->bindParam(':id', $id);

    if ($resultado->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar los datos";
    }
}
