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

if($_SESSION['Usuario']){

//RECEPCION DE VARIABLES
$id_tf = $_GET['id_tf'];
$id_dtf = $_GET['id_dtf'];
$id_gh = $_GET['id_gh'];
$id_tp = $_GET['id_tp'];
$id_ev = $_GET['id_ev'];
$id_tu = $_GET['id_tu'];
//RECEPCION DE VARIABLES

//ELIMINAR TIPO FUNCIONARIO
if($id_tf > 0){
$sql1 = "delete from tipo_funcionario where id_tipo_funcionario = ".$id_tf." ";
$resultado1 = pg_query ($sql1);
?>
<meta charset="utf-8">
<script language="javascript"> alert("Tipo Funcionario Eliminado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}

//ELIMINAR DETALLE TIPO FUNCIONARIO
if($id_dtf > 0){
$sql2 = "delete from detalle_tipo_funcionario where id_detalle_tipo_funcionario = ".$id_dtf." ";
$resultado2 = pg_query ($sql2);
?>
<meta charset="utf-8">
<script language="javascript"> alert("Detalle Tipo Funcionario Eliminado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}

//ELIMINAR GRUPO HORARIO
if($id_gh > 0){
$sql3 = "delete from grupo_horario where id_grupo_horario = ".$id_gh." ";
$resultado3 = pg_query ($sql3);
?>
<meta charset="utf-8">
<script language="javascript"> alert("Grupo Horario Eliminado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}

//ELIMINAR TIPO PERMISO
if($id_tp > 0){
$sql4 = "delete from tipo_permiso where id_tipo_permiso = ".$id_tp." ";
$resultado4 = pg_query ($sql4);
?>
<meta charset="utf-8">
<script language="javascript"> alert("Tipo Permiso Eliminado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}

//ELIMINAR ESTADO VIGENCIA
if($id_ev > 0){
$sql5 = "delete from estado_vigencia where id_estado_vigencia = ".$id_ev." ";
$resultado5 = pg_query ($sql5);
?>
<meta charset="utf-8">
<script language="javascript"> alert("Estado Vigencia Eliminado!!"); window.location="mantenedores_genericos.php"</script>
<?php
}

//ELIMINAR TIPO USUARIO
if($id_tu > 0){
$sql6 = "delete from tipo_usuario where id_tipo_usuario = ".$id_tu." ";
$resultado6 = pg_query ($sql6);
?>
<meta charset="utf-8">
<script language="javascript"> alert("Tipo Usuario Eliminado!!"); window.location="mantenedores_genericos.php"</script>
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
