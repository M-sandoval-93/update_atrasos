<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);

if($_SESSION['Id_Tipo_Usuario']=='3'){
?>
<meta charset="utf-8">
  <script language="javascript"> alert("Acceso Restringido"); window.location="alumno_registro.php"</script>
<?php
}

//GUARDAR REGISTRO PERMISO EN BD
if($_SESSION['Usuario']){

//INICIO RECEPCION DE VARIABLES DEL FORMULARIO REGISTRO PERMISOS
$tipo_funcionario = strtoupper($_POST['tipo_funcionario']);
$detalle_tipo_funcionario = strtoupper($_POST['detalle_tipo_funcionario']);
$id_tipo_funcionario = $_POST['id_tipo_funcionario'];
$nombre_grupo_horario = strtoupper($_POST['nombre_grupo_horario']);
$hora_1 = $_POST['hora_1'];
$hora_2 = $_POST['hora_2'];

if($_POST['hora_3'] == ''){
$hora_3='null';
}
else{
$hora_3=date("'H:i'",strtotime($_POST['hora_3']));
}

if($_POST['hora_4'] == ''){
$hora_4='null';
}
else{
$hora_4=date("'H:i'",strtotime($_POST['hora_4']));
}

if($_POST['hora_5'] == ''){
$hora_5='null';
}
else{
$hora_5=date("'H:i'",strtotime($_POST['hora_5']));
}

if($_POST['hora_6'] == ''){
$hora_6='null';
}
else{
$hora_6=date("'H:i'",strtotime($_POST['hora_6']));
}

if($_POST['hora_7'] == ''){
$hora_7='null';
}
else{
$hora_7=date("'H:i'",strtotime($_POST['hora_7']));
}

if($_POST['hora_8'] == ''){
$hora_8='null';
}
else{
$hora_8=date("'H:i'",strtotime($_POST['hora_8']));
}

$tipo_permiso = strtoupper($_POST['tipo_permiso']);
$codigo_estado_vigencia = strtoupper($_POST['codigo_estado_vigencia']);
$estado_vigencia = strtoupper($_POST['estado_vigencia']);
$tipo_usuario = strtoupper($_POST['tipo_usuario']);
//FIN RECEPCION DE VARIABLES DEL FORMULARIO REGISTRO PERMISOS


if($_SESSION['id_tf'] > 0 || $_SESSION['id_dtf'] > 0 || $_SESSION['id_gh'] > 0 || $_SESSION['id_tp'] > 0 
|| $_SESSION['id_ev'] > 0 || $_SESSION['id_tu'] > 0){
//UPDATE TIPO FUNCIONARIO
$sql_id_tf="select * from tipo_funcionario where id_tipo_funcionario = ".$_SESSION['id_tf']." ";
$sql_res_id_tf=pg_query($sql_id_tf);

if (pg_num_rows($sql_res_id_tf)>0){
$sql_actualizar_datos = "update tipo_funcionario set
tipo_funcionario ='".$tipo_funcionario."'
where id_tipo_funcionario =".$_SESSION['id_tf']." ";

$sql_update_tf = pg_query($sql_actualizar_datos);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Tipo Funcionario Actualizado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}

//UPDATE DETALLE TIPO FUNCIONARIO
$sql_id_dtf="select
detalle_tipo_funcionario.id_detalle_tipo_funcionario,
detalle_tipo_funcionario.detalle_tipo_funcionario,
detalle_tipo_funcionario.id_tipo_funcionario
from detalle_tipo_funcionario,tipo_funcionario 
where id_detalle_tipo_funcionario = ".$_SESSION['id_dtf']." 
and tipo_funcionario.id_tipo_funcionario=detalle_tipo_funcionario.id_tipo_funcionario ";
$sql_res_id_dtf=pg_query($sql_id_dtf);

if (pg_num_rows($sql_res_id_dtf)>0){
$sql_actualizar_datos = "update detalle_tipo_funcionario set
detalle_tipo_funcionario = '".$detalle_tipo_funcionario."',
id_tipo_funcionario = ".$id_tipo_funcionario."
where id_detalle_tipo_funcionario = ".$_SESSION['id_dtf']." ";

$sql_update_dtf = pg_query($sql_actualizar_datos);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Detalle Tipo Funcionario Actualizado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}


//UPDATE GRUPOS HORARIOS
$sql_id_gh="select * from grupo_horario where id_grupo_horario = ".$_SESSION['id_gh']." ";
$sql_res_id_gh=pg_query($sql_id_gh);

if (pg_num_rows($sql_res_id_gh)>0){
$sql_actualizar_datos = "update grupo_horario set
nombre_grupo_horario ='".$nombre_grupo_horario."',
hora_entrada_1 = '".$hora_1."',
hora_salida_1 = '".$hora_2."',
hora_entrada_2 = ".$hora_3.",
hora_salida_2 = ".$hora_4.",
hora_entrada_3 = ".$hora_5.",
hora_salida_3 = ".$hora_6.",
hora_entrada_4 = ".$hora_7.",
hora_salida_4 = ".$hora_8."
where id_grupo_horario = ".$_SESSION['id_gh']." ";

$sql_update_gh = pg_query($sql_actualizar_datos);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Grupo Horario Actualizado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}


//UPDATE TIPO PERMISO
$sql_id_tp="select * from tipo_permiso where id_tipo_permiso = ".$_SESSION['id_tp']." ";
$sql_res_id_tp=pg_query($sql_id_tp);

if (pg_num_rows($sql_res_id_tp)>0){
$sql_actualizar_datos = "update tipo_permiso set
tipo_permiso ='".$tipo_permiso."'
where id_tipo_permiso = ".$_SESSION['id_tp']." ";

$sql_update_tf = pg_query($sql_actualizar_datos);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Tipo Permiso Actualizado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}

//UPDATE ESTADO VIGENCIA
$sql_id_ev="select * from estado_vigencia where id_estado_vigencia = ".$_SESSION['id_ev']." ";
$sql_res_id_ev=pg_query($sql_id_ev);

if (pg_num_rows($sql_res_id_ev)>0){
$sql_actualizar_datos = "update estado_vigencia set
codigo_estado_vigencia ='".$codigo_estado_vigencia."',
descripcion_estado_vigencia ='".$estado_vigencia."'
where id_estado_vigencia = ".$_SESSION['id_ev']." ";

$sql_update_ev = pg_query($sql_actualizar_datos);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Estado Vigencia Actualizado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}


//UPDATE TIPO USUARIO
$sql_id_tu="select * from tipo_usuario where id_tipo_usuario = ".$_SESSION['id_tu']." ";
$sql_res_id_tu=pg_query($sql_id_tu);

if (pg_num_rows($sql_res_id_tu)>0){
$sql_actualizar_datos = "update tipo_usuario set
tipo_usuario ='".$tipo_usuario."'
where id_tipo_usuario = ".$_SESSION['id_tu']." ";

$sql_update_tu = pg_query($sql_actualizar_datos);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Tipo Usuario Actualizado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}

}


else{

if($tipo_funcionario != ''){
$sql_guardar_tipo_funcionario = "insert into tipo_funcionario 
(tipo_funcionario) 
values ('".$tipo_funcionario."')";
$res_gtf = pg_query($sql_guardar_tipo_funcionario);
}

if($detalle_tipo_funcionario != ''){
$sql_guardar_detalle_tipo_funcionario = "insert into detalle_tipo_funcionario 
(detalle_tipo_funcionario,id_tipo_funcionario) 
values ('".$detalle_tipo_funcionario."',".$id_tipo_funcionario.")";
$res_gdtf = pg_query($sql_guardar_detalle_tipo_funcionario);
}

if($nombre_grupo_horario != ''){
$sql_guardar_grupo_horario = "insert into grupo_horario 
(nombre_grupo_horario,hora_entrada_1,hora_salida_1,hora_entrada_2,hora_salida_2,hora_entrada_3,hora_salida_3,hora_entrada_4,hora_salida_4) 
values ('".$nombre_grupo_horario."','".$hora_1."','".$hora_2."',".$hora_3.",".$hora_4.",".$hora_5.",
".$hora_6.",".$hora_7.",".$hora_8.")";
$res_ggh = pg_query($sql_guardar_grupo_horario);
}

if($tipo_permiso != ''){
$sql_guardar_tipo_permiso = "insert into tipo_permiso 
(tipo_permiso) 
values ('".$tipo_permiso."')";
$res_gtp = pg_query($sql_guardar_tipo_permiso);
}

if($codigo_estado_vigencia != ''){
$sql_guardar_estado_vigencia = "insert into estado_vigencia 
(codigo_estado_vigencia,descripcion_estado_vigencia) 
values ('".$codigo_estado_vigencia."','".$estado_vigencia."')";
$res_gev = pg_query($sql_guardar_estado_vigencia);
}

if($tipo_usuario != ''){
$sql_guardar_tipo_usuario = "insert into tipo_usuario 
(tipo_usuario) 
values ('".$tipo_usuario."')";
$res_gtu = pg_query($sql_guardar_tipo_usuario);
}


?>
<meta charset="utf-8">
	<script language="javascript"> alert("Datos Guardados Exitosamente"); window.location="mantenedores_genericos.php"</script>
<?php

}



pg_close($conexion);
}//condicion if principal de session
else
{
?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión para Acceder."); window.location="index.php"</script>
<?php
}
?>
