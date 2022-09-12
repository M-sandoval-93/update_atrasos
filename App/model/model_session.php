<?php

    // SE INCLUYE EL ARCHIVO DE CONEXION BBDD
    include_once "./model_conexion.php";
    include_once "../model/model_conexion.php";

    class Session extends Conexion {
        public function __construct() {
            parent:: __construct();
            session_start();
        }

        public function getUsser() {
            return $_SESSION['usser']['name'];
        }

        public function setUsser($name) {
            $_SESSION['usser']['name'] = $name;
        }

        public function getPrivilege() {
            return $_SESSION['usser']['privilege'];
        }

        public function setPrivilege($privilege) {
            $_SESSION['usser']['privilege'] = $privilege;
        }

        public function getId() {
            return $_SESSION['usser']['id'];
        }

        public function setId($id) {
            $_SESSION['usser']['id'] = $id;
        }

        public function checkUsser($usser, $pass) {
            // VARIABLES
            // $md5Pass = md5($pass);   -> usar cuando la clave este en MD5
            $md5Pass = $pass;
            $query = "SELECT * FROM usuario WHERE nombre_usuario = '$usser' AND clave_usuario = '$md5Pass'";
            $sentencia = $this->conexion_db->prepare($query);
            $sentencia->execute();

            // SI EL USUARIO EXISTE Y ESTA CORRECTO, DEBUELVE TRUE
            if ($sentencia->rowCount() >= 1) {
                $this->setUsser('msandoval'); // NOTA: PASAR PRIVILEGIO, ID Y NOMBRE DE USUARIO
                return true;
            } else {
                return false;
            }

            $this->conexion_db = null; 

        }

        public function closeSession() {
            $this->conexion_db = null;
            session_unset();
            session_destroy();
        }

    }


?>
