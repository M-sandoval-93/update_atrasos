<?php

    include_once "../model/model_conexion.php";

    class DatosTablas extends Conexion {
        private $json = array();

        public function __construct() {
            parent:: __construct();
        }

        // CONSULTAR LOS APODERADOS DE LA BASE DE DATOS
        public function consultaApoderados() {
            $query = "SELECT id_apoderado, (rut_apoderado || '-' || dv_rut_apoderado), apellido_paterno_apoderado,
                        apellido_materno_apoderado, nombres_apoderado, estado_apoderado FROM apoderados;";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $apoderados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($apoderados as $apoderado) {
                $this->json['data'][] = $apoderado;
            }

            return json_encode($this->json);
            $this->conexion_db = null;
        }

        // EDITAR EL ESTADO DEL APODERADO
        public function updateEstadoApoderado($id, $estado) {
            if ($estado == 'true') {
                $new_estado = 'false';
            } else {
                $new_estado = 'true';
            }

            $query = "UPDATE apoderados SET estado_apoderado = ? WHERE id_apoderado = ?;";
            $sentencia = $this->conexion_db->prepare($query);
            $resultado = $sentencia->execute([$new_estado, $id]);

            if ($resultado === true) {
                return json_encode(true);
            } else {
                return json_encode(false);
            }

            $this->conexion_db = null;
        }

        // ELIMINAR APODERADOS
        public function deleteApoderado($id) {
            $query = "DELETE FROM apoderados WHERE id_apoderado = ?;";
            $sentencia = $this->conexion_db->prepare($query);
            $resultado = $sentencia->execute([$id]);

            if ($resultado === true) {
                return json_encode(true);
            } else {
                return json_encode(false);
            }

            $this->conexion_db = null;
        }

    }



?>
