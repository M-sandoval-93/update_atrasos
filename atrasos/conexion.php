<?php

echo "prueba";

// function Conectarse(){
// //$user = "adminpglvl";
// //$password = "@dm1npgLVL";
// //$dbname = "bdlvl";
// $port = "5432";
// $host = "localhost";
// $user = "postgres";
// $password = "";
// $dbname = "test";

// $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

// $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
// echo "<h3>Conexión Exitosa PHP - PostgreSQL</h3><hr><br>";
// return $conexion;
// }


// function Conexion() {
//     $host = "localhost";
//     $dbname = "test";
//     $username = "postgres";
//     $password = "admin";

//     try {
//         $conn = new PDO("pgsql:host=$host; dbname=$dbname; $username; $password");
//         echo "conexión exitosa";
//     } catch (PDOException $e) {
//         echo "La conexión fallo".$e;
//     }

// }


function Conexion() {
    $dns = 'pgsql:host=localhost; dbname=test';

    try {
        $conexion_bd = new PDO($dns, 'postgres', 'admin');
        $conexion_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "conexion exitosa";
        return $conexion_bd;

    } catch (Exception $error) {
        echo "ERROR: ".$error->getMessage();
    }
}

Conexion();



?>

