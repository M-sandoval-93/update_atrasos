<?php
include ("conexion.php");
$conexion=Conectarse();

      $user = $_POST['b'];
       
      if(!empty($user)) {
      comprobar($user);
      }
       
      function comprobar($b) {
                   
            $sql1 = pg_query("select (select count (*) from atraso,alumno 
                  where alumno.id_alumno=atraso.id_alumno 
                  and alumno.rut_alumno='".$b."')
                  -
                  (select count (estado) from atraso,alumno 
                  where alumno.id_alumno=atraso.id_alumno 
                  and atraso.estado='JUSTIFICADO' 
                  and alumno.rut_alumno='".$b."') as total");

            $atrasos = pg_fetch_assoc($sql1);

            echo "<span style='font-weight:bold;color:green;'> Atrasos sin Justificar: ".$atrasos['total']." </span>";

            
      }

?>