<?php
include ("conexion.php");
$conexion=Conectarse();

$rut = $_POST['rut'];

$sql="select 
funcionario.id_funcionario,
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.nombres_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
sexo.id_sexo,
sexo.codigo_sexo,
funcionario.fecha_nacimiento_funcionario,
funcionario.telefono_funcionario,
funcionario.email_funcionario,
estado_vigencia.id_estado_vigencia,
estado_vigencia.descripcion_estado_vigencia,
estado_vigencia.codigo_estado_vigencia,
tipo_funcionario.id_tipo_funcionario,
tipo_funcionario.tipo_funcionario,
detalle_tipo_funcionario.id_detalle_tipo_funcionario,
detalle_tipo_funcionario.detalle_tipo_funcionario,
grupo_horario.id_grupo_horario,
grupo_horario.nombre_grupo_horario,
contrato.id_contrato,
contrato.fecha_ingreso,
contrato.fecha_retiro,
contrato.horas_contrato,
contrato.observaciones_contrato,
contrato.id_funcionario
from 
funcionario,sexo,tipo_funcionario,detalle_tipo_funcionario,grupo_horario,estado_vigencia,contrato
where funcionario.id_sexo_funcionario=sexo.id_sexo
and funcionario.id_tipo_funcionario=tipo_funcionario.id_tipo_funcionario
and funcionario.id_detalle_tipo_funcionario=detalle_tipo_funcionario.id_detalle_tipo_funcionario
and funcionario.id_grupo_horario_funcionario=grupo_horario.id_grupo_horario
and funcionario.id_funcionario=contrato.id_funcionario
and funcionario.rut_funcionario = '".$rut."' 
order by contrato.id_contrato desc limit 1";

$resultado=pg_query($sql);



if($row = pg_fetch_array($resultado))
{
  if($row['fecha_retiro']==null){
    $fecha_r='';  
  }
  else{
    $fecha_r=date("d-m-Y",strtotime($row['fecha_retiro']));  
  }

  echo json_encode(array(
    "dv"=>$row['dv_rut_funcionario'], 
    "apellido_paterno"=>$row['apellido_paterno_funcionario'],
    "apellido_materno"=>$row['apellido_materno_funcionario'],
    "nombres"=>$row['nombres_funcionario'],
    "fecha_nac"=>date("d-m-Y",strtotime($row['fecha_nacimiento_funcionario'])),
    "telefono"=>$row['telefono_funcionario'],
    "email"=>$row['email_funcionario'],
    "tipo_funcionario"=>$row['tipo_funcionario'],
    "detalle_tipo_funcionario"=>$row['detalle_tipo_funcionario'],
    "horas_contrato"=>$row['horas_contrato'],
    "grupo_horario"=>$row['nombre_grupo_horario'],
    "fecha_ingreso"=>date("d-m-Y",strtotime($row['fecha_ingreso'])),
    "fecha_retiro"=>$fecha_r,
    ));
}

else
{
  echo json_encode(array( 
  "dv"=>"",
  "apellido_paterno"=>"",
  "apellido_materno"=>"",
  "nombres"=>"",
  "fecha_nac"=>"",
  "telefono"=>"",
  "email"=>"",
  "tipo_funcionario"=>"",
  "detalle_tipo_funcionario"=>"",
  "horas_contrato"=>"",
  "grupo_horario"=>"",
  "fecha_ingreso"=>"",
  "fecha_retiro"=>"",
  ));
}

pg_close($conexion);
?>