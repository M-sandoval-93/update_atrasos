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

//GUARDAR NUEVO Y ACTUALIZAR FUNCIONARIO EN BD
if($_SESSION['Usuario']){//INICIO CONDICION PRINCIPAL SESION USUARIO

//INICIO RECEPCION DE VARIBALES DEL FORMULARIO REGISTRO FUNCIONARIOS
$fecha_espanol=$_POST['fecha'];
$fecha_ingles=date("Y-m-d",strtotime($fecha_espanol));

$rut = $_POST['rut'];
$dv = strtoupper($_POST['dv']);
$nombres = strtoupper($_POST['nombres']);
$apellido_paterno = strtoupper($_POST['apellido_paterno']);
$apellido_materno = strtoupper($_POST['apellido_materno']);
$id_sexo = $_POST['sexo'];
$id_grupo_horario_funcionario = $_POST['grupo_horario'];
$id_tipo_funcionario = $_POST['tipo_funcionario'];
$id_detalle_tipo_funcionario = $_POST['detalle_tipo_funcionario'];
$telefono = $_POST['telefono'];
$email = strtoupper($_POST['email']);
$usuario = $_SESSION['Id_Usuario'];
//FIN RECEPCION DE VARIABLES DEL FORMULARIO REGISTRO FUNCIONARIOS

if($rut== "" || $dv== "" || $nombres== "" || $apellido_paterno == "" || $apellido_materno == "" || $id_sexo == "" || $id_grupo_horario_funcionario == "" || $id_detalle_tipo_funcionario == "" || $telefono == "" || $email == ""){
?>
	<meta charset="utf-8">
	<script language="javascript"> alert("Error en la operación"); window.location="funcionario_registro.php"</script>
<?php
}


$sql_rut_f="select rut_funcionario from funcionario where rut_funcionario='".$rut."' ";
$sql_res_rut_f=pg_query($sql_rut_f);

if (pg_num_rows($sql_res_rut_f)>0){

$sql_actualizar_datos_1 = "update funcionario set
rut_funcionario='".$rut."',
dv_rut_funcionario='".$dv."',
nombres_funcionario='".$nombres."',
apellido_paterno_funcionario='".$apellido_paterno."',
apellido_materno_funcionario='".$apellido_materno."',
id_sexo_funcionario=".$id_sexo.",
fecha_nacimiento_funcionario='".$fecha_ingles."',
id_tipo_funcionario=".$id_tipo_funcionario.",
id_detalle_tipo_funcionario=".$id_detalle_tipo_funcionario.",
id_grupo_horario_funcionario=".$id_grupo_horario_funcionario.",
telefono_funcionario='".$telefono."',
email_funcionario='".$email."',
id_usuario=".$usuario."
where rut_funcionario='".$rut."' ";

$sql_res_actualizar_datos_1 = pg_query($sql_actualizar_datos_1);

$sql_actualizar_datos_1;

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Datos Actualizados Exitosamente"); window.location="funcionario_registro.php"</script>
<?php

}


$sql_id_f="select id_funcionario from funcionario where id_funcionario=".$_SESSION['id_fun_tab']." ";
$sql_res_id_f=pg_query($sql_id_f);

if (pg_num_rows($sql_res_id_f)>0){

$sql_actualizar_datos = "update funcionario set
rut_funcionario='".$rut."',
dv_rut_funcionario='".$dv."',
nombres_funcionario='".$nombres."',
apellido_paterno_funcionario='".$apellido_paterno."',
apellido_materno_funcionario='".$apellido_materno."',
id_sexo_funcionario=".$id_sexo.",
fecha_nacimiento_funcionario='".$fecha_ingles."',
id_tipo_funcionario=".$id_tipo_funcionario.",
id_detalle_tipo_funcionario=".$id_detalle_tipo_funcionario.",
id_grupo_horario_funcionario=".$id_grupo_horario_funcionario.",
telefono_funcionario='".$telefono."',
email_funcionario='".$email."',
id_usuario=".$usuario."
where id_funcionario=".$_SESSION['id_fun_tab']." ";

$sql_res_actualizar_datos = pg_query($sql_actualizar_datos);

$sql_actualizar_datos;

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Datos Actualizados Exitosamente"); window.location="funcionario_registro.php"</script>

<?php

} 

else {
$sql_rut_f="select rut_funcionario from funcionario where rut_funcionario='".$rut."' ";
$sql_res_rut_f=pg_query($sql_rut_f);

if (pg_num_rows($sql_res_rut_f)==0){//si dentro de else

$sql_insertar_funcionario = "insert into funcionario (
rut_funcionario,
dv_rut_funcionario,
nombres_funcionario,
apellido_paterno_funcionario,
apellido_materno_funcionario,
id_sexo_funcionario,
fecha_nacimiento_funcionario,
id_tipo_funcionario,
id_detalle_tipo_funcionario,
id_grupo_horario_funcionario,
telefono_funcionario,
email_funcionario,
id_usuario) values (
'".$rut."',
'".$dv."',
'".$nombres."',
'".$apellido_paterno."',
'".$apellido_materno."',
".$id_sexo.",
'".$fecha_ingles."',
".$id_tipo_funcionario.",
".$id_detalle_tipo_funcionario.",
".$id_grupo_horario_funcionario.",
'".$telefono."',
'".$email."',
".$usuario.")";

$sql_insertar_funcionario;

$insertar_funcionario = pg_query($sql_insertar_funcionario);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Nuevo Funcionario Registrado"); window.location="funcionario_registro.php"</script>

<?php
}//si dentro de else
	
}

//FIN PROCESO INSERT


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
