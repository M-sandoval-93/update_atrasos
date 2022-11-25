<?php

    include_once "../model/model_conexion.php";



    class Asignatura extends Conexion {

        public function __construct() {
            parent:: __construct();
        }

        public function getAsignatura() {
            $query = "SELECT * FROM asignatura";
            $sentencia = $this->preConsult($query);
            $sentencia->execute();
            $asignaturas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            foreach ($asignaturas as $asignatura) {
                // $this->json[] = `<div class="col-6">
                //                     <div class="form-check">
                //                         <input type="checkbox" id="check_asignatura" class="form-check-input" value="`.$asignatura['id_asignatura'].`">
                //                         <label for="check_asignatura" class="form-check-label">`.$asignatura['asignatura'].`</label>
                //                     </div>
                //                 </div>`;
                // $this->json['id'][] = $asignatura['id_asignatura'];
                // $this->json['asignatura'][] = $asignatura['asignatura'];
                $this->json[] = $asignatura;
            }

            $this->closeConnection();
            return json_encode($this->json);


        }



    }




?>