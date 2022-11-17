<?php

    include_once "../model/model_conexion.php";



    class JustificacionEstudiante extends Conexion {

        public function __construct() {
            parent:: __construct();
        }

        public function showJustificacion() {

            $query = "SELECT justificacion.id_justificacion, 
                (estudiante.rut_estudiante || '-' || estudiante.dv_rut_estudiante) AS rut,
                estudiante.ap_estudiante AS ap_paterno, estudiante.am_estudiante AS ap_materno,
                estudiante.nombres_estudiante AS nombre, estudiante.nombre_social AS n_social, curso.curso,
                to_char(justificacion.fecha_inicio, 'DD/MM/YYYY') AS fecha_inicio,
                to_char(justificacion.fecha_termino, 'DD/MM/YYYY') AS fecha_termino
                -- to_char(justificacion.fecha_hora_actual, 'DD/MM/YYY - HH:MI:SS') AS fecha_justificacion,
                -- (ap_titular.rut_apoderado || '-' || ap_titular.dv_rut_apoderado || ' ' || ap_titular.ap_apoderado || ' ' || 
                -- ap_titular.am_apoderado || ' ' || ap_titular.nombres_apoderado) AS rut_apoderado_titular,
                -- (ap_suplente.rut_apoderado || '-' || ap_suplente.dv_rut_apoderado || ' ' || ap_suplente.ap_apoderado || ' ' || 
                -- ap_suplente.am_apoderado || ' ' || ap_suplente.nombres_apoderado) AS rut_apoderado_suplente
                FROM justificacion
                INNER JOIN matricula ON matricula.id_matricula = justificacion.id_matricula
                INNER JOIN estudiante ON estudiante.id_estudiante = matricula.id_estudiante
                INNER JOIN curso ON curso.id_curso = matricula.id_curso
                --LEFT JOIN apoderado AS ap_titular ON ap_titular.id_apoderado = matricula.id_ap_titular
                --LEFT JOIN apoderado AS ap_suplente ON ap_suplente.id_apoderado = matricula.id_ap_suplente
                WHERE matricula.anio_lectivo = EXTRACT(YEAR FROM now());";

            $sentencia = $this->preConsult($query);
            $sentencia->execute();

            try {
                $justificaciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
                foreach ($justificaciones as $justificacion) {
                    $this->json['data'][] = $justificacion;
                }

                $this->closeConnection();
                return json_encode($this->json);

            } catch (Exception $e) {
                return json_encode($this->res);
            }


        }
    }




?>