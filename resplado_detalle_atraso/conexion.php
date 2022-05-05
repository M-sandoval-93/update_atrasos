<?php


// Antes de hacer la conexión, independiente del modo utilizado
// Se debe configurar xampp para que acepte las conexiones a postgreSQL

// respaldo función
/*     
    $user = "adminpglvl";
    $password = "@dm1npgLVL";
    $dbname = "bdlvl";
    $port = "5432";
    $host = "localhost";
 */

function Conectarse(){

    // Para Windows
    // $user = "postgres";
    // $password = "user2019";
    // $dbname = "dblvl_localhost";
    // $port = "5432";
    // $host = "localhost";


    // Para mac
    $user = "postgres";
    $password = "admin";
    $dbname = "test";
    $port = "5432";
    $host = "localhost";
  

    $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
    // echo "<h3>Conexión Exitosa PHP - PostgreSQL</h3><hr><br>";
    return $conexion;
}

//echo "Prueba";
Conectarse();
// phpinfo();


?>

