<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);


/// LIMITACION ACCESO USUARIO RESTRINGIDO ///
if($_SESSION['Id_Tipo_Usuario']=='3'){
?>
<meta charset="utf-8">
  <script language="javascript"> alert("Acceso Restringido"); window.location="alumno_atraso.php"</script>
<?php
}
/// LIMITACION ACCESO USUARIO RESTRINGIDO ///

//GUARDAR REGISTRO CONTRATO EN BD
if($_SESSION['Usuario']){


// 1.- INICIO RECEPCION DE VARIBALES DEL FORMULARIO REGISTRO CONTRATOS
$fecha_i=date("Y-m-d",strtotime($_POST['fecha_ingreso']));
$fecha_retiro=date("Y-m-d",strtotime($_POST['fecha_retiro']));

if($fecha_retiro == '1970-01-01'){
$fecha_r='null';
}
else{
$fecha_r=date("'Y-m-d'",strtotime($fecha_retiro));
}

$rut = $_POST['rut'];
$dv = $_POST['dv'];
$horas_contrato = $_POST['horas_contrato'];
$observaciones = strtoupper($_POST['observaciones_contrato']);
$id_funcionario = $_POST['funcionario'];
$id_estado_vigencia = $_POST['estado_vigencia'];
$usuario = $_SESSION['Id_Usuario'];
// 1.- FIN RECEPCION DE VARIABLES DEL FORMULARIO REGISTRO CONTRATOS

/// REACTIVAR FUNCIONARIO CON NUEVO CONTRATO
if($_SESSION['id_fun_tab2']){
	$sql_activar_nuevo_contrato = "insert into contrato (fecha_ingreso,fecha_retiro,horas_contrato,id_funcionario,
	observaciones_contrato,id_usuario,id_estado_vigencia) values 
	('".$fecha_i."',null,".$horas_contrato.",".$_SESSION['id_fun_tab2'].",'".$observaciones."',".$usuario.",".$id_estado_vigencia.")";

	$sql_res_activar_nuevo_contrato = pg_query($sql_activar_nuevo_contrato);

	?>
	<meta charset="utf-8">
	<script language="javascript"> alert("Se Ha Creado un Nuevo Contrato"); window.location="funcionario_activar.php"</script>
	<?php	
}
/// REACTIVAR FUNCIONARIO CON NUEVO CONTRATO


else{

$sql_datos_funcionario="select 
funcionario.id_funcionario,
funcionario.rut_funcionario,
contrato.id_contrato,
contrato.fecha_ingreso,
contrato.fecha_retiro,
contrato.id_estado_vigencia
from funcionario,contrato
where funcionario.id_funcionario=contrato.id_funcionario 
and funcionario.rut_funcionario ='".$rut."' 
order by contrato.id_contrato desc limit 1";
$sql_res_datos_funcionario=pg_query($sql_datos_funcionario);

if($row = pg_fetch_assoc($sql_res_datos_funcionario)){
$id_f = $row['id_funcionario'];
$rut_f = $row['rut_funcionario'];
$id_c = $row['id_contrato'];
$fecha_if = $row['fecha_ingreso'];
$fecha_rf = $row['fecha_retiro'];
}

if(pg_num_rows($sql_res_datos_funcionario)>0){
    
	$sql = "update contrato set
	fecha_ingreso='".$fecha_i."',
	fecha_retiro=".$fecha_r.",
	horas_contrato=".$horas_contrato.",
	observaciones_contrato='".$observaciones."',
	id_usuario=".$usuario.",
	id_estado_vigencia=".$id_estado_vigencia."
	where id_funcionario=".$id_f."
	and id_contrato=".$id_c." ";
	
	$resultado_sql = pg_query($sql);
	?>
	<meta charset="utf-8">
	<script language="javascript"> alert("Datos Actualizados Exitosamente"); window.location="funcionario_activar.php"</script>
	<?php
    
}

}

pg_close($conexion);
}//condicion if principal de sesion

else
{
?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión para Acceder."); window.location="index.php"</script>
<?php
}
?>
