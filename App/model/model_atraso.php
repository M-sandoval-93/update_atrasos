<?php

    include_once "../model/model_conexion.php";

    class AtrasoEstudiante extends Conexion {
        private $json = array();
        private $res = false;

        public function __construct() {
            parent:: __construct();
        }

        public function consultarAtraso() {
            $query = "SELECT atraso.id_atraso, (estudiante.rut_estudiante || '-' || estudiante.dv_rut_estudiante) AS rut,
            estudiante.ap_estudiante AS ap_paterno, estudiante.am_estudiante AS ap_materno,
            estudiante.nombres_estudiante AS nombre, estudiante.nombre_social AS n_social, curso.curso, 
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
                }
                $this->json['data'][] = $atraso;
            }

            return json_encode($this->json);
            $this->conexion_db = null;
        }

        public function cantidadAtrasos($tipo) {
            if ($tipo == 'diario') {
                $query = "SELECT COUNT(id_atraso) AS atrasos FROM atraso 
                WHERE EXTRACT(DAY FROM fecha_atraso) = EXTRACT(DAY FROM CURRENT_DATE)
                AND EXTRACT(YEAR FROM fecha_atraso) = EXTRACT(YEAR FROM CURRENT_DATE);";

            } else if ($tipo == 'total') {
                $query = "SELECT COUNT(id_atraso) AS atrasos FROM atraso
                WHERE EXTRACT(YEAR FROM fecha_atraso) = EXTRACT(YEAR FROM CURRENT_DATE);";
            }

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $resultado = $sentencia->fetch();

            if ($resultado['atrasos'] >= 1) {
                $this->res = $resultado['atrasos'];
            }

            return json_encode($this->res);
            $this->conexion_db = null;
        }

        public function getEstudiante($rut) {
            // $query = "SELECT (estudiante.nombres_estudiante || ' ' || estudiante.ap_estudiante
            // || ' ' || estudiante.am_estudiante) AS nombre_estudiante, 
            // estudiante.nombre_social, curso.curso, estudiante.id_estado
            // FROM estudiante
            // INNER JOIN matricula ON matricula.id_estudiante = estudiante.id_estudiante
            // INNER JOIN curso ON curso.id_curso = matricula.id_curso
            // WHERE estudiante.rut_estudiante = ? limit 1;";

            // $sentencia = $this->conexion_db->prepare($query);
            // $sentencia->execute([$rut]);

            // if ($sentencia->rowCount() >= 1) {
            //     $datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            //     foreach ($datos as $dato) {
            //         $this->json[] = $dato;
            //     }
            //     return json_encode($this->json);
            // } else {
            //     return json_encode($this->res);
            // }
            // $this->conexion_db = null;

            $query = "SELECT (estudiante.nombres_estudiante || ' ' || estudiante.ap_estudiante
            || ' ' || estudiante.am_estudiante) AS nombre_estudiante, 
            estudiante.nombre_social, curso.curso, estudiante.id_estado
            FROM estudiante
            INNER JOIN matricula ON matricula.id_estudiante = estudiante.id_estudiante
            INNER JOIN curso ON curso.id_curso = matricula.id_curso
            WHERE estudiante.rut_estudiante = ?;";

            // $sentencia = $this->conexion_db->prepare($query);
            // $sentencia->execute([$rut]);
            // $datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            // foreach ($datos as $dato) {
            //     $this->json[] = $dato;
            // }

            // return json_encode($this->json);
            // $this->conexion_db = null;


            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute([$rut]);

            if ($datos = $sentencia->fetchAll(PDO::FETCH_ASSOC)) {
                foreach ($datos as $dato) {
                    $this->json[] = $dato;
                }
                return json_encode($this->json);
            } 

            return json_encode($this->res);
            $this->conexion_db = null;

        }




    }

?>