<?php

    include_once "../model/model_conexion.php";

    class InasistenciaFuncionario extends Conexion {
        private $json = array();
        private $res = false;

        public function __construct() {
            parent:: __construct();
        }

        public function consultarInasistenciaF() {
            $query = "SELECT inasistencia_funcionario.id_inasistencia,
                    (funcionario.nombres_funcionario || ' ' || funcionario.apellido_paterno_funcionario || ' ' || funcionario.apellido_materno_funcionario) AS funcionario,
                    inasistencia_funcionario.fecha_inicio, inasistencia_funcionario.fecha_termino, inasistencia_funcionario.dias_inasistencia, 
                    tipo_inasistencia.tipo_inasistencia
                    FROM inasistencia_funcionario
                    INNER JOIN funcionario ON funcionario.id_funcionario = inasistencia_funcionario.id_funcionario
                    INNER JOIN tipo_inasistencia ON tipo_inasistencia.id_tipo_inasistencia = inasistencia_funcionario.id_tipo_inasistencia;";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $inasistencias = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($inasistencias as $inasistencia) {
                $this->json['data'][] = $inasistencia;
            }

            $this->conexion_db = null;
            return json_encode($this->json);

        }

        public function newInaistenciaF($iF) {  // REVISAR NUEVAMENTE LA INFORMACIÓN QUE SE ALMACENARÁ Y COMO ??
            $query = "INSERT INTO inasistencia_funcionario (id_funcionario, fecha_inicio, fecha_termino, 
                    dias_inasistencia, id_tipo_inasistencia, id_reemplazante, ordinario) VALUES (?, ?, ?, ?, ?, ?);";
            
            $queryF = "SELECT id_funcionario FROM funcionario WHERE rut_funcionario = ?;";
            $sentencia = $this->conexion_db->prepare($queryF);

            if ($sentencia->execute([$iF[1]])) {
                $resultado = $sentencia->fetch();
                $id_funcionario = $resultado["id_funcionario"];
    
                if ($iF[6] != '') {
                    $sentencia = $this->conexion_db->prepare($queryF);
                    $sentencia->execute([$iF[6]]);
                    $resultado = $sentencia->fetch();
                    $id_reemplazo = $resultado["id_funcionario"];
                }

                $sentencia = $this->conexion_db->prepare($query);
                $sentencia->execute([$id_funcionario, $iF[2], $iF[3fyhuj]]);

            }

            $this->conexion_db = null;
            return json_encode($this->res);
        }

        public function updateInasistenciaF($id) {

        }

        public function deleteInasistenciaF($id) {

        }
    }



?>