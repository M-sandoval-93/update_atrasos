<?php

    include_once "../model/model_conexion.php";

    class Apoderado extends Conexion {
        private $json = array();

        public function __construct() {
            parent:: __construct();
        }

        // CONSULTAR LOS APODERADOS DE LA BASE DE DATOS
        public function consultaApoderados() {
            $query = "SELECT id_apoderado, (rut_apoderado || '-' || dv_rut_apoderado) as rut_apoderado, apellido_paterno_apoderado,
                        apellido_materno_apoderado, nombres_apoderado, estado_apoderado, telefono_apoderado FROM apoderado;";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $apoderados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($apoderados as $apoderado) {
                $this->json['data'][] = $apoderado;
            }

            return json_encode($this->json);
            $this->conexion_db = null;
        }

        public function consultaApoderado($rut) {
            $query = "SELECT (nombres_apoderado || ' ' || apellido_paterno_apoderado || ' ' || apellido_materno_apoderado) AS nombre
            FROM apoderado WHERE rut_apoderado = ?;";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute([$rut]);
            $apoderado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($apoderado as $ap) {
                $this->json[] = $ap['nombre'];
            }


            if ($sentencia->rowCount() >= 1) {
                return json_encode($this->json);
            } else {
                return json_encode(false);
            }

            $this->conexion_db = null;
        }

        // AGREGAR NUEVO APODERADO A LA BASE DE DATOS
        public function newApoderado($apoderado) {
            // VERIFICAR ANTES SI EL RUT DEL USUARIO EXISTE
            $query = "SELECT rut_apoderado FROM apoderado WHERE rut_apoderado = ?;";
            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute([$apoderado[0]]);

            if ($sentencia->rowCount() >= 1) {
                return json_encode('existe');

            } else {
                $query = "INSERT INTO apoderado (rut_apoderado, dv_rut_apoderado, apellido_paterno_apoderado,
                apellido_materno_apoderado, nombres_apoderado, telefono_apoderado) VALUES (?, ?, ?, ?, ?, ?);";

                $sentencia = $this->conexion_db->prepare($query);
                $resultado = $sentencia->execute([$apoderado[0], $apoderado[1], $apoderado[3], $apoderado[4], $apoderado[2], '569-'.$apoderado[5]]);

                if ($resultado === true) {
                    return json_encode(true);
                } else {
                    return json_encode(false);
                }
            }

            $this->conexion_db = null;
        }

        // EDITAR LOS DATOS DEL APODERADO
        public function updateApoderado($apoderado) {
            $query = "UPDATE apoderado SET  apellido_paterno_apoderado = ?, apellido_materno_apoderado = ?,
                nombres_apoderado = ?, telefono_apoderado = ? WHERE rut_apoderado = ?;";

            $sentencia = $this->conexion_db->prepare($query);
            $resultado = $sentencia->execute([$apoderado[2], $apoderado[3], $apoderado[1], '569-'.$apoderado[4], $apoderado[0]]);

            if ($resultado === true) {
                return json_encode(true);
            } else {
                return json_encode(false);
            }

            $this->conexion_db = null;

        }

        // EDITAR EL ESTADO DEL APODERADO
        public function updateEstadoApoderado($id, $estado) {
            if ($estado == 'true') {
                $new_estado = 'false';
            } else {
                $new_estado = 'true';
            }

            $query = "UPDATE apoderado SET estado_apoderado = ? WHERE id_apoderado = ?;";
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
            $query = "DELETE FROM apoderado WHERE id_apoderado = ?;";
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
