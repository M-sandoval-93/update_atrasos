<?php

    include_once "../model/model_conexion.php";

    class Estudiantes extends Conexion {
        private $json = array();

        public function __construct() {
            parent:: __construct();
        }

        // CONSULTAR LOS ESTUDIANTES Y SUS DATOS DERIVADOS EN BASE DE DATOS
        public function consultaEstudiantes() {
            $query = "SELECT estudiantes.id_estudiante, matriculas.numero_matricula,
                    (estudiantes.rut_estudiante || '-' || estudiantes.dv_rut_estudiante) as rut_estudiante,
                    estudiantes.nombres_estudiante, estudiantes.nombre_social_estudiante,
                    estudiantes.apellido_paterno_estudiante, estudiantes.apellido_materno_estudiante,
                    to_char(estudiantes.fecha_nacimiento_estudiante, 'dd / mm / yyyy') as fecha_nacimiento_estudiante, 
                    estudiantes.id_estado, estudiantes.sexo_estudiante, cursos.curso,
                    (apt.nombres_apoderado || ' ' || apt.apellido_paterno_apoderado || ' ' || 
                    apt.apellido_materno_apoderado) AS apoderado_titular,
                    (aps.nombres_apoderado || ' ' || aps.apellido_paterno_apoderado || ' ' || 
                    aps.apellido_materno_apoderado) AS apoderado_suplente,
                    matriculas.fecha_retiro_estudiante
                    FROM matriculas
                    LEFT JOIN estudiantes ON estudiantes.id_estudiante = matriculas.id_estudiante
                    LEFT JOIN cursos ON cursos.id_curso = matriculas.id_curso
                    LEFT JOIN apoderados AS apt ON apt.id_apoderado = matriculas.id_apoderado_titular
                    LEFT JOIN apoderados AS aps ON aps.id_apoderado = matriculas.id_apoderado_suplente;";

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