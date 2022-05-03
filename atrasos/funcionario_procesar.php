<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);
//if($_SESSION['Usuario']){

$id = $_GET['id'];

$sql = "select 
funcionario.id_funcionario,
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.nombres_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
sexo.codigo_sexo,
funcionario.fecha_nacimiento_funcionario,
funcionario.horas_contrato_funcionario,
funcionario.telefono_funcionario,
funcionario.email_funcionario,
estado_vigencia.descripcion_estado_vigencia,
tipo_funcionario.tipo_funcionario,
detalle_tipo_funcionario.detalle_tipo_funcionario,
grupo_horario.nombre_grupo_horario
from 
funcionario,sexo,tipo_funcionario, detalle_tipo_funcionario,grupo_horario,estado_vigencia
where funcionario.id_sexo_funcionario=sexo.id_sexo
and funcionario.id_tipo_funcionario=tipo_funcionario.id_tipo_funcionario
and funcionario.id_detalle_tipo_funcionario=detalle_tipo_funcionario.id_detalle_tipo_funcionario
and funcionario.id_grupo_horario_funcionario=grupo_horario.id_grupo_horario
and funcionario.id_estado_funcionario=estado_vigencia.id_estado_vigencia
and funcionario.id_funcionario = ".$id." ";

$resultado = pg_query ($sql);
//$_SESSION['id_acopio']=$id;

if ($row = pg_fetch_assoc($resultado)){

$fecha_a=$row['fecha_nacimiento_funcionario'];
$fecha_b=date("d-m-Y",strtotime($fecha_a));

?> <a href='funcionario_registro2.php?rut=<?php echo $row['rut_funcionario']?>'>
<a href='funcionario_registro2.php?dv_rut=<?php echo $row['dv_rut_funcionario']?>'>
<a href='funcionario_registro2.php?ape_pat=<?php echo $row['apellido_paterno_funcionario']?>'> <?php

//$_SESSION['id_funcionario']=$row['id_funcionario'];
//$_SESSION['rut_funcionario']=$row['rut_funcionario'];
//$_SESSION['dv_rut_funcionario']=$row['dv_rut_funcionario'];
//$_SESSION['apellido_paterno_funcionario']=$row['apellido_paterno_funcionario'];
$_SESSION['apellido_materno_funcionario']=$row['apellido_materno_funcionario'];
$_SESSION['nombres_funcionario']=$row['nombres_funcionario'];
$_SESSION['id_sexo']=$row['id_sexo'];
$_SESSION['codigo_sexo']=$row['codigo_sexo'];
$_SESSION['fecha_nacimiento_funcionario']=$fecha_b;
$_SESSION['horas_contrato_funcionario']=$row['horas_contrato_funcionario'];
$_SESSION['telefono_funcionario']=$row['telefono_funcionario'];
$_SESSION['email_funcionario']=$row['email_funcionario'];
$_SESSION['id_grupo_horario']=$row['id_grupo_horario'];
$_SESSION['nombre_grupo_horario']=$row['nombre_grupo_horario'];
$_SESSION['id_tipo_funcionario']=$row['id_tipo_funcionario'];
$_SESSION['tipo_funcionario']=$row['tipo_funcionario'];
$_SESSION['id_detalle_tipo_funcionario']=$row['id_detalle_tipo_funcionario'];
$_SESSION['detalle_tipo_funcionario']=$row['detalle_tipo_funcionario'];
$_SESSION['descripcion_estado_vigencia']=$row['descripcion_estado_vigencia'];

}

?>
<meta charset="utf-8">
<script language="javascript"> window.location="funcionario_registro2.php"</script>
<?php

//}
//else{

?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión"); window.location="index.php"</script>
<?php
//}
//pg_close($conexion);
?>