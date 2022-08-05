<?php

include ("conexion.php");
$conexion=Conectarse();

$rut = $_POST['rut'];

$sql="select 
alumno.rut_alumno,
alumno.dv_rut_alumno,
alumno.apellido_paterno_alumno,
alumno.apellido_materno_alumno,
alumno.nombres_alumno,
curso.nombre_curso,
alumno.beneficio_junaeb 
from alumno,curso
where alumno.id_curso=curso.id_curso
and alumno.rut_alumno = '".$rut."' ";

$resultado=pg_query($sql);



if($row = pg_fetch_array($resultado))
{

  $beneficio_junaeb = "";

  if ($row['beneficio_junaeb'] == 0) {
    $beneficio_junaeb = 'SI';
  } else {
    $beneficio_junaeb = 'NO';
  }

  echo json_encode(array("dv"=>$row['dv_rut_alumno'], "nombre_completo"=>$row['apellido_paterno_alumno']." ".$row['apellido_materno_alumno']." ".$row['nombres_alumno'], "nombre_curso"=>$row['nombre_curso'], "junaeb"=>$beneficio_junaeb)) ;
}

else
{
  echo json_encode(array("dv"=>"","nombre_completo"=>"", "nombre_curso"=>"", "junaeb"=>"")) ;
}


pg_close($conexion);

?>