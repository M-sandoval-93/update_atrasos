<?php

    // SE INCLUYE EL ARCHIVO DE CONEXION BBDD
    include_once "./model/model_conexion.php";
    include_once "../model/model_conexion.php";

    class Curso extends Conexion {

        protected $grado;
        protected $letraHasta;
        protected $query = "INSERT INTO usuarios () VALUES (?, ?);)";

        function __construct($grado, $letraHasta) {
            $this->grado = $grado;
            $this->letraHasta = $letraHasta;
        }

        public function generarCurso() {
            include_once "../config/listas.php";
            $contador = 0;
            $curso;

            try {
                foreach (LETRAS as $letra) {
                    if ($letra <= $this->letraHasta) {
                        $contador = $contador + 1;
                        $curso = $grado+$letra;
                        $sentencia = $this->conexion_db->prepare($query);
                        $sentencia->execute([$contador, $curso]);
                    }
                }
            } catch (Exception $e) {
                echo "Error: ". $e->getMessage();
            }
        }

    } 



?>