<?php
include ("conexion.php");
$conexion=Conectarse();

session_start();
error_reporting (0);

//GUARDAR NUEVO Y ACTUALIZAR FUNCIONARIO EN BD
if($_SESSION['Usuario']){//INICIO CONDICION PRINCIPAL SESION USUARIO

//INICIO RECEPCION DE VARIABLES DEL FORMULARIO REGISTRO FUNCIONARIOS
$rut = $_POST['rut'];
$dv = $_POST['dv'];
$nom_usu = $_POST['nom_usu'];
$pass_usu = $_POST['pass_usu'];
$id_tipo_usuario = $_POST['tipo_usuario'];
$usuario = $_SESSION['Id_Usuario'];
$fecha_actual=date("Y-m-d");
//FIN RECEPCION DE VARIABLES DEL FORMULARIO REGISTRO FUNCIONARIOS


$sql_id_usuario="select * from usuario where id_usuario=".$_SESSION['id_usu_tab']."";
$sql_res_id_usuario=pg_query($sql_id_usuario);

if (pg_num_rows($sql_res_id_usuario)>0){// COND. SI 3

$sql_actualizar_datos = "update usuario set
nombre_usuario='".$nom_usu."',
password_usuario='".$pass_usu."',
id_tipo_usuario=".$id_tipo_usuario."
where id_usuario=".$_SESSION['id_usu_tab']." ";

$sql_res_actualizar_datos = pg_query($sql_actualizar_datos);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Datos Actualizados Exitosamente"); window.location="usuario_registro.php"</script>
<?php
}// COND. SI 3




else{//else 3

$sql_rut_funcionario="select funcionario.id_funcionario,funcionario.rut_funcionario,usuario.id_usuario 
from funcionario,usuario where usuario.id_funcionario=funcionario.id_funcionario and rut_funcionario='".$rut."' ";
$sql_res_rut_funcionario=pg_query($sql_rut_funcionario);


//SOLO RECOGER VARIABLES
if($row=pg_fetch_assoc($sql_res_rut_funcionario)){
$id_funcionario=$row['id_funcionario'];
$rut_funcionario=$row['rut_funcionario'];
$id_usuario=$row['id_usuario'];
}
//SOLO RECOGER VARIABLES


if (pg_num_rows($sql_res_rut_funcionario)>0){//1
//antes de guardar, se verifica si el rut de usuario ya existe

if($rut_funcionario==$rut){//1.1

$sql_actualizar_datos = "update usuario set
nombre_usuario='".$nom_usu."',
password_usuario='".$pass_usu."',
id_tipo_usuario=".$id_tipo_usuario."
where id_funcionario= ".$id_funcionario." ";

$sql_res_actualizar_datos = pg_query($sql_actualizar_datos);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Datos Actualizados Exitosamente"); window.location="usuario_registro.php"</script>
<?php

}//1.1
//antes de guardar, se verifica si el rut de usuario ya existe


}//1


if(pg_num_rows($sql_res_rut_funcionario)==0){// cond. si 4 usuario sin crear 

$sql_rut_funcionario2="select id_funcionario from funcionario where rut_funcionario='".$rut."' ";
$sql_res_rut_funcionario2=pg_query($sql_rut_funcionario2);

$sql_consulta_usuarios_existentes="select * from usuario where nombre_usuario='".$nom_usu."' ";
$sql_res_consulta_usuarios_existentes=pg_query($sql_consulta_usuarios_existentes);

// VALIDAR EXISTENCIA DE NOMBRE USUARIO
if(pg_num_rows($sql_res_consulta_usuarios_existentes)>0){
?>
<meta charset="utf-8">
	<script language="javascript"> alert("El Nombre de Usuario Ya Existe. Intente Nuevamente"); window.location="usuario_registro.php"</script>
<?php
}

else{//si no rebota existencia de usuario, se crea uno nuevo
// SOLO RECOGER VARIABLES
if($row=pg_fetch_assoc($sql_res_rut_funcionario2)){
$id_funcionario2=$row['id_funcionario'];
}
//SOLO RECOGER VARIABLES

$sql_crear_usuario = "insert into usuario (
nombre_usuario,
password_usuario,
id_funcionario,
id_tipo_usuario,
fecha_creacion) 
values (
'".$nom_usu."',
'".$pass_usu."',
".$id_funcionario2.",
".$id_tipo_usuario.",
'".$fecha_actual."') ";

$sql_crear_usuario;
$sql_res_crear_usuario = pg_query($sql_crear_usuario);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Se ha Creado Nuevo Usuario"); window.location="usuario_registro.php"</script>
<?php
}//si no rebota existencia de usuario, se crea uno nuevo

}// cond. si 4 usuario sin crear






}//else 3




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
