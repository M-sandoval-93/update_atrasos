<?php

// SE INCLUYEN LOS ARCHIVOS DE CONFIGURACIÓN
try {
    include_once "./config/config_connect.php";
} catch(Exception $e) {
    include_once "../config/config_connect.php";
}


class Conexion {
    public $conexion_db;

    public function __construct() {
        $dns = 'pgsql:host='.DB_HOST.'; port='.DB_PORT.'; dbname='.DB_DATA; //.'; charset='.DB_CHARSET;

        try {
            $this->conexion_db = new PDO($dns, DB_USSER, DB_PASSWORD);
            $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conexión exitosa";
            return $this->conexion_db;
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        }

    }
}



?>