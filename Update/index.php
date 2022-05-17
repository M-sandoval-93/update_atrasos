<?php

include_once "./models/connect.php";

$conect_db = new Conexion();

echo "Hello Word\n";

/* $contraseña = "user2019";
$usuario = "postgres";
$nombreBaseDeDatos = "dblvl_localhost";
$rutaServidor = "localhost";
$puerto = "5432";
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
} */

?>