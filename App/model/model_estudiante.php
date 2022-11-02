<?php

    include_once "../model/model_conexion.php";

    class Estudiante extends Conexion {
        // private $json = array();
        // private $res = false;

        public function __construct() {
            parent:: __construct();
        }

        // CONSULTAR LOS ESTUDIANTES Y SUS DATOS DERIVADOS EN BASE DE DATOS
        public function consultaEstudiantes() {
            $query = "SELECT estudiante.id_estudiante, matricula.numero_matricula,
                    (estudiante.rut_estudiante || '-' || estudiante.dv_rut_estudiante) as rut_estudiante,
                    estudiante.nombres_estudiante, estudiante.nombre_social_estudiante,
                    estudiante.apellido_paterno_estudiante, estudiante.apellido_materno_estudiante,
                    to_char(estudiante.fecha_nacimiento_estudiante, 'dd / mm / yyyy') as fecha_nacimiento_estudiante, 
                    estudiante.id_estado, estudiante.sexo_estudiante, curso.curso,
                    (apt.nombres_apoderado || ' ' || apt.apellido_paterno_apoderado || ' ' || 
                    apt.apellido_materno_apoderado) AS apoderado_titular,
                    (aps.nombres_apoderado || ' ' || aps.apellido_paterno_apoderado || ' ' || 
                    aps.apellido_materno_apoderado) AS apoderado_suplente,
                    matricula.fecha_retiro_estudiante
                    FROM matricula
                    LEFT JOIN estudiante ON estudiante.id_estudiante = matricula.id_estudiante
                    LEFT JOIN curso ON curso.id_curso = matricula.id_curso
                    LEFT JOIN apoderado AS apt ON apt.id_apoderado = matricula.id_apoderado_titular
                    LEFT JOIN apoderado AS aps ON aps.id_apoderado = matricula.id_apoderado_suplente
                    WHERE anio_lectivo = EXTRACT(YEAR FROM NOW());";

            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();
            $estudiantes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($estudiantes as $estudiante) {
                $this->json['data'][] = $estudiante;
            }

            return json_encode($this->json);
            $this->conexion_db = null;
        }

        // AGREGAR NUEVO ESTUDIANTE
        public function newEstudiante($e) {
            $query = "SELECT rut_estudiante FROM estudiante WHERE rut_estudiante = ?;";
            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute([$e[2]]);

            if ($sentencia->rowCount() >= 1) {
                return json_encode('existe');

            } else {
                // AGREGAR DATOS A TABLA ESTUDIANTES
                $queryEstudiante = "INSERT INTO estudiante (rut_estudiante, dv_rut_estudiante, apellido_paterno_estudiante,
                        apellido_materno_estudiante, nombres_estudiante, nombre_social_estudiante, fecha_nacimiento_estudiante,
                        beneficio_junaeb, sexo_estudiante) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
                $sentencia = $this->conexion_db->prepare($queryEstudiante);

                if ($sentencia->execute([$e[2], $e[3], $e[5], $e[6], $e[4], $e[7], $e[9], intval($e[11]), $e[10]])) {
                    
                    // CONSULTAR EL ID ASIGNADO AL ESTUDIANTE
                    $queryId = "SELECT id_estudiante FROM estudiante WHERE rut_estudiante = ?;";
                    $sentencia = $this->conexion_db->prepare($queryId);
                    $sentencia->execute([$e[2]]);
                    $id_estudiante = $sentencia->fetch();

                    // OBTENER ID APODERADOS
                    $queryAp = "SELECT id_apoderado FROM apoderado WHERE rut_apoderado = ?;";
                    $titular = null;
                    $suplente = null;

                    // ==================== OBTENER ID APODERADOS ======================= //
                    if ($e[12] != '') { // OBTENER APODERADO TITULAR
                        $sentencia = $this->conexion_db->prepare($queryAp);
                        $sentencia->execute([$e[12]]);
                        $resultado = $sentencia->fetch();
                        $titular = $resultado["id_apoderado"];
                    }

                    if ($e[13] != '') { // OBTENER APODERADO SUPLENTE
                        $sentencia = $this->conexion_db->prepare($queryAp);
                        $sentencia->execute([$e[13]]);
                        $resultado = $sentencia->fetch();
                        $suplente = $resultado["id_apoderado"];
                    }
                    // ==================== OBTENER ID APODERADOS ======================= //

                    // AGREGAR DATOS A TABLA MATRICULA
                    $queryMatricula = "INSERT INTO matricula (numero_matricula, id_estudiante, id_apoderado_titular,
                            id_apoderado_suplente, id_curso, anio_lectivo, fecha_ingreso_estudiante) 
                            VALUES (?, ?, ?, ?, ?, ?, ?);";
                    $sentencia = $this->conexion_db->prepare($queryMatricula);

                    if ($sentencia->execute([$e[1], $id_estudiante["id_estudiante"], $titular, $suplente, $e[8], date("Y"), $e[0]])) {
                        $this->res = true;
                    }
                }
            }

            $this->conexion_db = null;
            return json_encode($this->res);



        }

        // EDITAR EL ESTADO DEL ESTUDIANTE
        public function updateEstadoEstudiante($estudiante) {
            if ($estudiante[1] == 1) {
                $new_estado = 2;
            } else {
                $new_estado = 1;
            }

            $query = "UPDATE estudiante SET id_estado = ? WHERE id_estudiante = ?;";
            $sentencia = $this->conexion_db->prepare($query);

            if ($sentencia->execute([$new_estado, intval($estudiante[0])])) {
                $this->res = true;
            }

            $this->conexion_db = null;
            return json_encode($this->res);

        }

        // ELIMINAR DE MANERA PERMANENTE UN ESTUDIANTE
        public function deleteEstudiante($id) {
            $query = "DELETE FROM matricula WHERE id_estudiante = ?;";
            $sentencia = $this->conexion_db->prepare($query);

            if ($sentencia->execute([$id])) {
                $query = "DELETE FROM estudiante WHERE id_estudiante = ?;";
                $sentencia = $this->conexion_db->prepare($query);

                if ($sentencia->execute([$id])) {
                    $this->res = true;
                }
            } 

            $this->conexion_db = null;
            return json_encode($this->res);        
        }

    }




?>