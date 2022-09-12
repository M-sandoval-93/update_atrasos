<?php

    include_once "../model/model_conexion.php";

    class Estudiante extends Conexion {
        private $json = array();

        public function __construct() {
            parent:: __construct();
        }

        // CONSULTAR LOS ESTUDIANTES Y SUS DATOS DERIVADOS EN BASE DE DATOS
        public function consultaEstudiantes() {
            $query = "SELECT estudiante.id_estudiante, matricula.numero_matricula,
                    (estudiante.rut_estudiante || '-' || estudiante.dv_rut_estudiante) as rut_estudiante,
                    estudiante.nombres_estudiante, estudiante.nombre_social_estudiante,
                    estudiante.apellido_paterno_estudiante, estudiante.apellido_materno_estudiante,
                    to_char(estudiante.fecha_nacimiento_estudiante, 'dd / mm / yyyy') as fecha_nacimiento_estudiante, 
                    estudiante.id_estado, estudiante.sexo_estudiante, curso.curso,
                    (apt.nombres_apoderado || ' ' || apt.apellido_paterno_apoderado || ' ' || 
                    apt.apellido_materno_apoderado) AS apoderado_titular,
                    (aps.nombres_apoderado || ' ' || aps.apellido_paterno_apoderado || ' ' || 
                    aps.apellido_materno_apoderado) AS apoderado_suplente,
                    matricula.fecha_retiro_estudiante
                    FROM matricula
                    LEFT JOIN estudiante ON estudiante.id_estudiante = matricula.id_estudiante
                    LEFT JOIN curso ON curso.id_curso = matricula.id_curso
                    LEFT JOIN apoderado AS apt ON apt.id_apoderado = matricula.id_apoderado_titular
                    LEFT JOIN apoderado AS aps ON aps.id_apoderado = matricula.id_apoderado_suplente
                    WHERE anio_lectivo = EXTRACT(YEAR FROM NOW());";

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

            $query = "UPDATE estudiante SET id_estado = ? WHERE id_estudiante = ?;";
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