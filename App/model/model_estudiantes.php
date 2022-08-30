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
                        apellido_materno_estudiante, nombres_estudiante, nombre_social_estudiante, id_estado, sexo_estudiante, fecha_nacimiento_estudiante FROM estudiantes;";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $estudiantes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($estudiantes as $estudiante) {
                $this->json['data'][] = $estudiante;
            }

            return json_encode($this->json);
            $this->conexion_db = null;
        }

        // EDITAR EL ESTADO DEL ESTUDIANTE
        public function updateEstadoEstudiante($estudiante) {
            if ($estudiante[1] == 1) {
                $new_estado = 2;
            } else {
                $new_estado = 1;
            }

            $query = "UPDATE estudiantes SET id_estado = ? WHERE id_estudiante = ?;";
            $sentencia = $this->conexion_db->prepare($query);
            $resultado = $sentencia->execute([$new_estado, intval($estudiante[0])]);

            if ($resultado === true) {
                return json_encode(true);
            } else {
                return json_encode(false);
            }

            $this->conexion_db = null;
        }




    }




?>