<?php

    include_once "../model/model_conexion.php";

    class AtrasoEstudiante extends Conexion {

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

            // $sentencia = $this->conexion_db->prepare($query);
            $sentencia = $this->preConsult($query);
            $sentencia->execute();
            $atrasos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($atrasos as $atraso) {
                if ($atraso['n_social'] != null) {
                    $atraso['nombre'] = '('. $atraso['n_social']. ') '. $atraso['nombre'];
                }
                $this->json['data'][] = $atraso;
            }

            return json_encode($this->json);
            $this->closeConnection();
        }

        public function atrasosSinJustificar($rut) {
            $query = "SELECT atraso.id_atraso, to_char(atraso.fecha_atraso, 'DD/MM/YYYY') AS fecha_atraso,
                to_char(atraso.hora_atraso, 'HH:MI:SS') AS hora_atraso
                FROM estudiante
                INNER JOIN atraso ON atraso.id_estudiante = estudiante.id_estudiante
                WHERE estudiante.rut_estudiante = ? AND atraso.estado_atraso = 'sin justificar';";

            $sentencia = $this->preConsult($query);
            $sentencia->execute([$rut]);
            $atrasos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($atrasos as $atraso) {
                $this->json['data'][] = $atraso;
            }

            return json_encode($this->json);
            $this->closeConnection();
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
            // $this->conexion_db = null;
            $this->closeConnection();
        }

        public function getEstudiante($rut) {
            $query = "SELECT (estudiante.nombres_estudiante || ' ' || estudiante.ap_estudiante
                || ' ' || estudiante.am_estudiante) AS nombre_estudiante,
                estudiante.nombre_social, curso.curso, estudiante.id_estado
                FROM estudiante
                INNER JOIN matricula ON matricula.id_estudiante = estudiante.id_estudiante
                INNER JOIN curso ON curso.id_curso = matricula.id_curso
                WHERE estudiante.rut_estudiante = ?;";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute([$rut]);

            if ($this->json = $sentencia->fetchAll(PDO::FETCH_ASSOC)) {
                $query = "SELECT count(atraso.id_atraso) AS cantidad_atraso FROM atraso
                    INNER JOIN estudiante ON estudiante.id_estudiante = atraso.id_estudiante
                    WHERE estudiante.rut_estudiante = ? AND estado_atraso = 'sin justificar';";
                
                $sentencia = $this->conexion_db->prepare($query);
                $sentencia->execute([$rut]);
                if ($cantidad_atraso = $sentencia->fetch()) {
                    $this->json[0]['cantidad_atraso'] = $cantidad_atraso['cantidad_atraso'];
                }

                return json_encode($this->json);

            }

            return json_encode($this->res);
            $this->closeConnection();
        }

        public function setAtraso($rut) {
            $queryE = "SELECT id_estudiante FROM estudiante WHERE rut_estudiante = ?;";
            $sentencia = $this->conexion_db->prepare($queryE);

            if ($sentencia->execute([$rut])) {
                $resultadoE = $sentencia->fetch(PDO::FETCH_ASSOC);

                $query = "INSERT INTO atraso (fecha_hora_actual, fecha_atraso, hora_atraso, id_estudiante)
                    VALUES (CURRENT_TIMESTAMP, CURRENT_DATE, CURRENT_TIME, ?);";

                $sentencia = $this->conexion_db->prepare($query);
                if ($sentencia->execute([$resultadoE['id_estudiante']])) {
                    $this->res = true;
                }
            }

            return json_encode($this->res);
            $this->closeConnection();
        }

        public function eliminarAtraso($id_atraso) {

            $query = "DELETE FROM atraso WHERE id_atraso = ?;";
            $sentencia = $this->conexion_db->prepare($query);
            
            if ($sentencia->execute([$id_atraso])) {
                $this->res = true;
            }

            return json_encode($this->res);
            $this->closeConnection();
        }

        public function setJustificar($id_apoderado, $atrasos, $id_usuario) {
            $query = "UPDATE atraso
                SET estado_atraso = 'justificado', id_usuario_justifica = ?, fecha_hora_justificacion = CURRENT_TIMESTAMP, id_apoderado_justifica = ?
                WHERE id_atraso = ?;";

            $sentencia = $this->preConsult($query);
            foreach ($atrasos as $atraso) {
                if ($sentencia->execute([$id_usuario, $id_apoderado, $atraso])) {
                    $this->res = true;
                }
            }
            
            return json_encode($this->res);
            $this->closeConnection();

        }


    }

?>