<?php 
include_once("./conf/conf.php");
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = isset($_GET['id']) ? $_GET['id'] : "";

$bandera = isset($_POST['bandera']) ? $_POST['bandera'] : "";

if ($bandera == 2) {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre']: "";
    $tel = isset($_POST['tel']) ? $_POST['tel']: "";
    $dui = isset($_POST['dui']) ? $_POST['dui']: "";
    $correo = isset($_POST['correo']) ? $_POST['correo']: "";
    $direccion = isset($_POST['direccion']) ? $_POST['direccion']: "";

    $consulta = "UPDATE cliente SET nombre = :nombre, tel = :tel, dui = :dui, correo = :correo, direccion = :direccion WHERE id = :id";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':tel', $tel);
    $resultado->bindParam(':dui', $dui);
    $resultado->bindParam(':correo', $correo);
    $resultado->bindParam(':direccion', $direccion);
    $resultado->bindParam(':id', $id);

    if ($resultado->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al actualizar los datos";
    }
} else {
    $consulta = "SELECT * FROM cliente WHERE id = :id";
    $resultado = $conexion->prepare($consulta);
    $resultado->bindParam(':id', $id);
    $resultado->execute();

    $cliente = $resultado->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
</head>
<body>
    <h2>Modificar Cliente</h2>

    <form action="modificar.php?id=<?php echo $id; ?>" method="post">
        <input type="hidden" name="bandera" value="2">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>" required><br><br>

        <label for="tel">Teléfono:</label>
        <input type="text" name="tel" value="<?php echo $cliente['tel']; ?>" required><br><br>

        <label for="dui">DUI:</label>
        <input type="text" name="dui" value="<?php echo $cliente['dui']; ?>" required><br><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo $cliente['correo']; ?>" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="<?php echo $cliente['direccion']; ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="index.php">Cancelar</a>
</body>
</html>
