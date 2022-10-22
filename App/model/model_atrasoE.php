<?php

    include_once "../model/model_conexion.php";

    class AtrasoEstudiante extends Conexion {
        private $json = array();
        private $res = false;

        public function __construct() {
            parent:: __construct();
        }

        public function consultarAtrasoE() {
            // trabajar consulta para eliminar el id_curso de la tabla atraso
            $query = "
            select atraso.id_atraso,
            (estudiante.rut_estudiante || '-' || estudiante.dv_rut_estudiante) as rut,
            (estudiante.nombres_estudiante || ' ' || estudiante.apellido_paterno_estudiante
            || ' ' || estudiante.apellido_materno_estudiante) as estudiante, curso.curso,
            atraso.fecha_atraso, atraso.hora_atraso, atraso.estado_atraso

            FROM atraso
            inner join estudiante on estudiante.id_estudiante = atraso.id_estudiante
            inner join curso on curso.id_curso = atraso.id_curso
            where extract(year from atraso.fecha_atraso) = extract(year from now());
            ";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $atrasos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($atrasos as $atraso) {
                $this->json['data'][] = $atraso;
            }

            $this->conexion_db = null;
            return json_encode($this->json);
        }
    }

?>