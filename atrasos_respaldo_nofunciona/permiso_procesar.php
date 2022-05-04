<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);
if($_SESSION['Usuario']){

$id = $_GET['id'];

$sql = "select 
permiso.id_permiso,
permiso.dia_permiso,
permiso.fecha_permiso,
permiso.hora_salida,
permiso.hora_llegada,
permiso.observaciones_permiso,
tipo_permiso.tipo_permiso,
funcionario.id_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
funcionario.nombres_funcionario 
from 
permiso,tipo_permiso,funcionario
where permiso.id_tipo_permiso=tipo_permiso.id_tipo_permiso
and permiso.id_funcionario=funcionario.id_funcionario
and permiso.id_permiso = ".$id." ";

$resultado = pg_query ($sql);
$_SESSION['id_acopio']=$id;

if ($row = pg_fetch_assoc($resultado)){

$fecha_a=$row['fecha_permiso'];
$fecha_b=date("d-m-Y",strtotime($fecha_a));

$_SESSION['fecha_permiso']=$fecha_b;
$_SESSION['dia_permiso']=$row['dia_permiso'];
$_SESSION['id_permiso']=$row['id_permiso'];
$_SESSION['tipo_permiso']=$row['tipo_permiso'];
$_SESSION['hora_salida']=$row['hora_salida'];
$_SESSION['hora_llegada']=$row['hora_llegada'];
$_SESSION['observaciones_permiso']=$row['observaciones_permiso'];
$_SESSION['id_funcionario']=$row['id_funcionario'];
$_SESSION['id_tipo_permiso']=$row['id_tipo_permiso'];
$_SESSION['apellido_paterno_funcionario']=$row['apellido_paterno_funcionario'];
$_SESSION['apellido_materno_funcionario']=$row['apellido_materno_funcionario'];
$_SESSION['nombres_funcionario']=$row['nombres_funcionario'];
}

?>
<meta charset="utf-8">
<script language="javascript"> window.location="permiso_modificar.php"</script>
<?php

}
else{

?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión"); window.location="index.php"</script>
<?php
}
pg_close($conexion);
?>