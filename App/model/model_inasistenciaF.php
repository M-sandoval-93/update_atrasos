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
                    (funcionario.nombres_funcionario || ' ' || funcionario.apellido_paterno_funcionario) AS funcionario,
                    inasistencia_funcionario.fecha_inicio, inasistencia_funcionario.fecha_termino,
                    inasistencia_funcionario.dias_inasistencia, 
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
    }



?>