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

        public function infoAdicional($id_registro) {
            $query = "SELECT to_char(justificacion.fecha_hora_actual, 'DD/MM/YYY - HH:MI:SS') AS fecha_justificacion,
                (ap_titular.rut_apoderado || '-' || ap_titular.dv_rut_apoderado || ' / ' || ap_titular.ap_apoderado || ' ' || 
                ap_titular.am_apoderado || ' ' || ap_titular.nombres_apoderado) AS apoderado_titular,
                (ap_suplente.rut_apoderado || '-' || ap_suplente.dv_rut_apoderado || ' / ' || ap_suplente.ap_apoderado || ' ' || 
                ap_suplente.am_apoderado || ' ' || ap_suplente.nombres_apoderado) AS apoderado_suplente,
                justificacion.motivo_falta, justificacion.prueba_pendiente, justificacion.presenta_documento
                FROM justificacion
                INNER JOIN matricula ON matricula.id_matricula = justificacion.id_matricula
                LEFT JOIN apoderado AS ap_titular ON ap_titular.id_apoderado = matricula.id_ap_titular
                LEFT JOIN apoderado AS ap_suplente ON ap_suplente.id_apoderado = matricula.id_ap_suplente
                WHERE matricula.anio_lectivo = EXTRACT(YEAR FROM now()) 
                AND justificacion.id_justificacion = ?;";

                $queryPruebas = "SELECT asignatura.asignatura
                    FROM prueba_pendiente
                    INNER JOIN asignatura ON asignatura.id_asignatura = prueba_pendiente.id_asignatura
                    WHERE prueba_pendiente.id_justificacion = ?";

                $sentencia = $this->preConsult($query);
                $sentencia->execute([$id_registro]);

                try {
                    $this->json = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                    if ($this->json[0]['apoderado_suplente'] == null) {
                        $this->json[0]['apoderado'] = $this->json[0]['apoderado_titular'].(' (TITULAR)');
                    } else {
                        $this->json[0]['apoderado'] = $this->json[0]['apoderado_suplente'].(' (SUPLENTE)');
                    }

                    unset($this->json[0]['apoderado_suplente']);
                    unset($this->json[0]['apoderado_titular']);


                    if ($this->json[0]['prueba_pendiente'] == true) {
                        $sentencia = $this->preConsult($queryPruebas);
                        $sentencia->execute([$id_registro]);
                        $asignaturas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                        foreach($asignaturas as $asignatura) {
                            foreach($asignatura as $nombre) {
                                $listaAsignaturas[] = $nombre;
                            }
                            // $listaAsignaturas[] = $asignatura;
                        }

                        $this->json[0]['asignatura'] = $listaAsignaturas;

                        // $this->json[0]['asignatura'] = $asignatura[0].join("-");
                        // $this->json[0]['asignatura'] = $asignaturas;

                        // $this->json[0]['asignatura'] = "";

                        // foreach($asignaturas as $asignatura) {
                        //     $this->json[0]['asignatura'] = $this->json[0]['asignatura']. ' - '. $asignatura['asignatura'];
                        //     // $asg[] = $asignatura['asignatura'];
                        // }

                        // $this->json[0]['asignatura'] = $asg;


                    }


                    return json_encode($this->json);

                } catch (Exception $e) {
                    return json_encode($this->res);
                }

        }


    }




?>