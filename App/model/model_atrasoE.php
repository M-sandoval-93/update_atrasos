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
            $query = "SELECT atraso.id_atraso, (estudiante.rut_estudiante || '-' || estudiante.dv_rut_estudiante) AS rut,
            estudiante.apellido_paterno_estudiante AS ap_paterno, estudiante.apellido_materno_estudiante AS ap_materno,
            estudiante.nombres_estudiante AS nombre, estudiante.nombre_social_estudiante AS n_social, curso.curso, 
            to_char(atraso.fecha_atraso, 'DD/MM/YYYY') AS fecha_atraso,
            to_char(atraso.hora_atraso, 'HH:MI:SS') AS hora_atraso
            FROM atraso
            INNER JOIN estudiante ON estudiante.id_estudiante = atraso.id_estudiante
            INNER JOIN matricula ON matricula.id_estudiante = atraso.id_estudiante
            INNER JOIN curso ON curso.id_curso = matricula.id_curso
            WHERE EXTRACT(YEAR FROM atraso.fecha_atraso) = EXTRACT(YEAR FROM now())
            AND atraso.estado_atraso = 'sin justificar';";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $atrasos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($atrasos as $atraso) {
                if ($atraso['n_social'] != null) {
                    $atraso['nombre'] = $atraso['nombre'].' ('. $atraso['n_social']. ')';
                    $atraso['n_social'] = "bueno";
                }
                $this->json['data'][] = $atraso;
            }

            $this->conexion_db = null;
            return json_encode($this->json);
        }

        public function atrasoDiario() {
            $query = "SELECT COUNT(id_atraso) AS atrasos FROM atraso 
            WHERE EXTRACT(DAY FROM fecha_atraso) = EXTRACT(DAY FROM CURRENT_DATE)
            AND EXTRACT(YEAR FROM fecha_atraso) = EXTRACT(YEAR FROM CURRENT_DATE);";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            if ($resultado['atrasos'] >= 1) {
                $this->res = $resultado['atrasos'];
            }

            $this->conexion_db = null;
            return json_encode($this->res);
            
        }

        public function atrasoTotal() {
            $query = "SELECT COUNT(id_atraso) AS atrasos FROM atraso
            WHERE EXTRACT(YEAR FROM fecha_atraso) = EXTRACT(YEAR FROM CURRENT_DATE);";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            if ($resultado['atrasos'] >= 1) {
                $this->res = $resultado['atrasos'];
            }

            $this->conexion_db = null;
            return json_encode($this->res);
            
        }
    }

?>