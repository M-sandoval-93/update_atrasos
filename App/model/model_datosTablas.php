<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

    include_once "../model/model_conexion.php";

    class DatosTablas extends Conexion {
        private $json = array();

        public function __construct() {
            parent:: __construct();
        }

        public function consultaApoderados() {
            $query = "SELECT (rut_apoderado || '-' || dv_rut_apoderado), apellido_paterno_apoderado,
                        apellido_materno_apoderado, nombres_apoderado, estado_apoderado, sexo_apoderado
                    FROM apoderados;";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $apoderados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($apoderados as $apoderado) {
                // if ($apoderado['estado_apoderado'] === true) {
                //     $apoderado['estado_apoderado'] = 'Activo';
                // } else {
                //     $apoderado['estado_apoderado'] = 'Inactivo';
                // }
                $this->json['data'][] = $apoderado;
            }

            return json_encode($this->json);
            $this->conexion_db = null;
        }

    }



?>