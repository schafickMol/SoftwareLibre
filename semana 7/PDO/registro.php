<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="procesos.php" method="POST">
        <input type="text" value="1" name="bandera" hidden>
        <label for="">Nombre:</label> <br>
        <input type="text" name="nombre" require><br><br>

        <label for="">Tel</label> <br>
        <input type="text" name="tel" require><br><br>

        <label for="">DUI</label> <br>
        <input type="text" name="dui" require><br><br>

        <label for="">Correo</label> <br>
        <input type="text" name="correo" require><br><br>

        <label for="">Dirección</label> <br>
        <input type="text" name="direccion" require><br><br>

        <input type="submit" value="Guardar">

    </form>
</body>
</html>