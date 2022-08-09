<?php

    include_once "../model/model_conexion.php";

    class DatosTablas extends Conexion {

        public function __construct() {
            parent:: __construct();
        }

        public function consultaApoderados() {
            $query = "SELECT * FROM apoderados;";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $apoderados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $json = array();

            foreach ($apoderados as $apoderado) {
                if ($apoderado['estado_apoderado'] === true) {
                    $apoderado['estado_apoderado'] = 'Activo';
                } else {
                    $apoderado['estado_apoderado'] = 'Inactivo';
                }
                $json['data'][] = $apoderado;
            }

            return json_encode($json);
            $this->conexion_db = null;
        }

    }



?>