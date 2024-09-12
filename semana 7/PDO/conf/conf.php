<?php
class Conexion {
    public function Conectar() {
        $host = "localhost"; // Cambia según sea necesario
        $db = "dbclientes";
        $user = "root"; // Cambia según sea necesario
        $password = "291866Rc"; // Cambia según sea necesario

        try {
            // Crear la conexión usando PDO
            $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);

            // Establecer los atributos para manejar errores
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexion;
        } catch (PDOException $e) {
            // Mostrar un mensaje de error si la conexión falla
            echo "Error de conexión: " . $e->getMessage();
            exit;
        }
    }
}

