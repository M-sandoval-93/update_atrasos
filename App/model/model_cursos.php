<?php

    // SE INCLUYE EL ARCHIVO DE CONEXION BBDD
    include_once "./model/model_conexion.php";
    include_once "../model/model_conexion.php";

    class Curso extends Conexion {

        protected $grado;
        protected $letraHasta;
        protected $query = "INSERT INTO cursos(id_curso, curso) VALUES (?, ?);";
        // protected $query = "INSERT INTO cursos(id_curso, curso) VALUES (:grados, :cursos);";

        function __construct($grado, $letraHasta) {
            $this->grado = $grado;
            $this->letraHasta = $letraHasta;
        }

        public function generarCurso() {

            echo "generar sentencia";

            //  $sentencia = $this->conexion_db->prepare($this->query);
            $sentencia = $this->conexion_db->prepare("insert into cursos values (1, '7A');");
            // $sentencia->execute([1, '7A']);
            $sentencia->execute();
            
            // include_once "./config/listas.php";
            // include_once "../config/listas.php";

            // $contador = 0;
            // $curso;

            // try {
            //     foreach (LETRAS as $letra) {
            //         if ($letra <= $this->letraHasta) {
            //             $contador = $contador + 1;
            //             $curso = $this->grado.$letra;
            //             $sentencia = $this->conexion_db->prepare($this->query);
            //             $sentencia->bindParam(':grados', $contador, PDO::PARAM_INT);
            //             $sentencia->bindParam(':cursos', $curso, PDO::PARAM_STR);

            //             $sentencia->execute();
            //             // echo $contador." - ".$curso."</br>";
            //         }
            //     }
            // } catch (Exception $e) {
            //     echo "Error: ". $e->getMessage();
            // }

        }

    } 



?>