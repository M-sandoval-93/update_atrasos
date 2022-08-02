<?php

    // SE INCLUYE EL ARCHIVO DE CONEXION BBDD
    include_once "../model/model_conexion.php";
    include_once "../config/listas.php";


    class Curso extends Conexion {
        protected $query_crear = "INSERT INTO cursos(curso) VALUES (?);";
        protected $query_consultar = "SELECT curso FROM cursos WHERE curso LIKE ? LIMIT 1;";

        public function __construct() {
            parent:: __construct();
        }

        public function generarCurso($grado, $letraHasta) {
            try {
                foreach (LETRAS as $letra) {
                    if ($letra <= $letraHasta) {
                        $curso = $grado.$letraHasta;
                        $sentencia = $this->conexion_db->prepare($this->query_crear);
                        $resultado = $sentencia->execute([$curso]);
                    }
                }

                // DEVUELVE EL RESULTADO SI LA CREACIÓN A SIDO EXITOSA
                if ($resultado === true) {
                    return true;
                } else {
                    return false;
                }

            } catch (Exception $e) {
                echo "Error: ". $e->getMessage();
            }

        }

        public function consultarCurso($grado) {
            try {
                $sentencia = $this->conexion_db->prepare($this->query_consultar);
                // $sentencia->bindValue(1, $grado."%", PDO::PARAM_STR);
                $sentencia->execute([$grado.'%']);

                if ($sentencia->rowCount() >= 1) {
                    return false;
                } else {
                    return true;
                }

            } catch (Exception $e) {
                echo "Error: ". $e->getMessage();
            }
        }

    } 


/*     NOTA: PARA REINICIAR EL CONTADOR DEL CAMPO AUTOINCREMENTO
    alter sequence cursos_id_curso_seq restart with 1; */



?>