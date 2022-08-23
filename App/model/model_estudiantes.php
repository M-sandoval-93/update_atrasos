<?php

    include_once "../model/model_conexion.php";

    class Estudiantes extends Conexion {
        private $json = array();

        public function __construct() {
            parent:: __construct();
        }

        // CONSULTAR LOS ESTUDIANTES DE LA BASE DE DATOS
        public function consultaEstudiantes() {
            $query = "SELECT id_estudiante, (rut_estudiante || '-' || dv_rut_estudiante) as rut_estudiante, apellido_paterno_estudiante,
                        apellido_materno_estudiante, nombres_estudiante, nombre_social_estudiante, id_estado FROM estudiantes;";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $estudiantes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($estudiantes as $estudiante) {
                $this->json['data'][] = $estudiante;
            }

            return json_encode($this->json);
            $this->conexion_db = null;
        }




    }




?>