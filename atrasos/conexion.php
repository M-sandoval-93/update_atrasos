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

    $user = "postgres";
    $password = "user2019";
    $dbname = "dblvl_localhost";
    $port = "5432";
    $host = "localhost";
  

    $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
    //echo "<h3>Conexión Exitosa PHP - PostgreSQL</h3><hr><br>";
    return $conexion;
}

Conectarse();



/* function Conexion() {
    $dns = 'pgsql:host=localhost; dbname=dblvl_localhost';

    try {
        $conexion_bd = new PDO($dns, 'postgres', 'user2019');
        $conexion_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "conexion exitosa";
        return $conexion_bd;

    } catch (Exception $error) {
        echo "ERROR: ".$error->getMessage();
    }
}

Conexion(); */

// phpinfo();



// Conexión para probar en MAC ****************** 

/* function Conexion() {
    $dns = 'pgsql:host=localhost; dbname=dblvl_localhost';

    try {
        $conexion_bd = new PDO($dns, 'postgres', 'user2019');
        $conexion_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "conexion exitosa";
        return $conexion_bd;

    } catch (Exception $error) {
        echo "ERROR: ".$error->getMessage();
    }
}

Conexion(); */



?>

