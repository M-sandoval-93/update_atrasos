<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);

if($_SESSION['Id_Tipo_Usuario']=='3'){
?>
<meta charset="utf-8">
  <script language="javascript"> alert("Acceso Restringido"); window.location="alumno_atraso.php"</script>
<?php
}

//GUARDAR REGISTRO PERMISO EN BD
if($_SESSION['Usuario']){

//INICIO RECEPCION DE VARIBALES DEL FORMULARIO REGISTRO PERMISOS
$fecha_espanol=$_POST['fecha_permiso'];
$fecha_ingles=date("Y-m-d",strtotime($fecha_espanol));

$id_funcionario = $_POST['funcionario'];
$id_tipo_permiso = $_POST['tipo_permiso'];
$fecha_form = $_POST['fecha_form'];
$dia_semana = $_POST['dia_semana'];
$hora_salida = $_POST['hora_salida'];
$hora_llegada = $_POST['hora_llegada'];
$observaciones = strtoupper($_POST['observaciones']);
$usuario = $_SESSION['Id_Usuario'];
//FIN RECEPCION DE VARIABLES DEL FORMULARIO REGISTRO PERMISOS

$sql_id_p="select * from permiso where id_permiso=".$_SESSION['id_perm_tab']."";
$sql_res_id_p=pg_query($sql_id_p);

if (pg_num_rows($sql_res_id_p)>0){
$sql_actualizar_datos = "update permiso set
dia_permiso=".$dia_semana.",
fecha_permiso='".$fecha_ingles."',
hora_salida='".$hora_salida."',
hora_llegada='".$hora_llegada."',
observaciones_permiso='".$observaciones."',
id_tipo_permiso=".$id_tipo_permiso.",
id_funcionario=".$id_funcionario.",
id_usuario='".$usuario."'
where id_permiso=".$_SESSION['id_perm_tab']." ";

$sql_res_actualizar_datos = pg_query($sql_actualizar_datos);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Datos Actualizados Exitosamente"); window.location="permiso_registro.php"</script>
<?php
}

else{

$sql_insertar_permiso = "insert into permiso (
dia_permiso,
fecha_permiso,
hora_salida,
hora_llegada,
observaciones_permiso,
id_tipo_permiso,
id_funcionario,
id_usuario) 
values (
".$dia_semana.",
'".$fecha_ingles."',
'".$hora_salida."',
'".$hora_llegada."',
'".$observaciones."',
".$id_tipo_permiso.",
".$id_funcionario.",
".$usuario.")";


$insertar_permiso = pg_query($sql_insertar_permiso);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Permiso Registrado"); window.location="permiso_registro.php"</script>
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
