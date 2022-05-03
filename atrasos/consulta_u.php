<?php

include ("conexion.php");
$conexion=Conectarse();

$rut = $_POST['rut'];

$sql2="select 
usuario.id_usuario,
usuario.nombre_usuario,
usuario.password_usuario,
usuario.id_funcionario,
usuario.id_tipo_usuario
from 
funcionario,usuario,tipo_usuario
where funcionario.id_funcionario=usuario.id_funcionario
and usuario.id_tipo_usuario=tipo_usuario.id_tipo_usuario
and funcionario.rut_funcionario = '".$rut."' 
order by usuario.nombre_usuario";

$resultado2=pg_query($sql2);


if($row = pg_fetch_array($resultado2))
{
  echo json_encode(array(
    "usuario"=>$row['nombre_usuario'], 
    "password"=>$row['password_usuario'],
    ));
}


else
{
  echo json_encode(array( 
  "usuario"=>"",
  "password"=>"",
  ));
}


pg_close($conexion);

?>