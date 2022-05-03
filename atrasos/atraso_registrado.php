<?php
include ("conexion.php");
$conexion=Conectarse();

session_start();
error_reporting (0);

//GUARDAR NUEVO Y ACTUALIZAR FUNCIONARIO EN BD
if($_SESSION['Usuario']){//INICIO CONDICION PRINCIPAL SESION USUARIO

//INICIO RECEPCION DE VARIBALES DEL FORMULARIO REGISTRO FUNCIONARIOS
$rut = $_POST['rut'];
$dv = $_POST['dv'];
$fecha_atraso=date("Y-m-d",strtotime($_POST['fecha_atraso']));
$hora_atraso = $_POST['hora_atraso'];
$usuario = $_SESSION['Id_Usuario'];
//FIN RECEPCION DE VARIABLES DEL FORMULARIO REGISTRO FUNCIONARIOS

if($rut== ""){
?>
	<meta charset="utf-8">
	<script language="javascript"> alert("Error en la operación"); window.location="alumno_atraso.php"</script>
<?php
}

$sql_id_alumno="select id_alumno from alumno where rut_alumno='".$rut."' ";
$sql_res_id_alumno=pg_query($sql_id_alumno);

if($row=pg_fetch_assoc($sql_res_id_alumno)){
$id_alumno=$row['id_alumno'];	
}

$fecha_actual=date("Y-m-d H:i:s");

if (pg_num_rows($sql_res_id_alumno)>0){
$sql_insertar_atraso = "insert into atraso (
fecha_hora_actual,
fecha_atraso,
hora_atraso,
id_alumno,
id_usuario) 
values (
'".$fecha_actual."',
'".$fecha_atraso."',
'".$hora_atraso."',
".$id_alumno.",
".$usuario.") ";

$sql_res_insertar_atraso = pg_query($sql_insertar_atraso);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Los datos se guardaron Exitosamente"); window.location="alumno_atraso.php"</script>
<?php

}
else
{
 	exit("No se pudo realizar la operación. Vuelva a intentarlo");
}

pg_close($conexion);
}//CONDICION IF PRINCIPAL SESION USUARIO

else//FIN SI PRINCIPAL SESIÓN USUARIO
{
?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión para Acceder."); window.location="index.php"</script>
<?php
}
?>
