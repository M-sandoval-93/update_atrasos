<?php
include ("conexion.php");
$conexion=Conectarse();

      $user = $_POST['b'];
       
      if(!empty($user)) {
      comprobar($user);
      }
       
      function comprobar($b) {
                   
            $sql = pg_query("SELECT * FROM usuario WHERE nombre_usuario = '".$b."' ");
             
            $contar = pg_num_rows($sql);
             
            if($contar == 0){
                  echo "<span style='font-weight:bold;color:green;'> Disponible </span>";
            }

            else {
                  echo "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe </span>";
            }
      }

?>