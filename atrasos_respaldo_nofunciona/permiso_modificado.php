<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);
if($_SESSION['Usuario']){

$fecha_es = $_POST['fecha'];
$fecha_en=date("Y-m-d",strtotime($fecha_es));

$dia_permiso = $_POST['dia_form'];
$hora_salida = $_POST['hora_salida'];
$hora_llegada = $_POST['hora_llegada'];
$observaciones_permiso = $_POST['observaciones_permiso'];
$id_tipo_permiso = $_POST['id_tipo_permiso'];
$id_funcionario = $_POST['proveedor'];


$sql = "update permiso set 
dia_permiso=".$dia_permiso.",
fecha_permiso='".$fecha_en."', 
hora_salida='".$hora_salida."', 
hora_llegada=".$hora_llegada.", 
observaciones_permiso='".$observaciones_permiso."', 
id_tipo_permiso=".$id_tipo_permiso.", 
id_funcionario=".$id_funcionario.",
id_usuario=".$_SESSION['Id_Usuario']."
where id_permiso=".$_SESSION['id_permiso']." "; 

echo $sql;

$estado3 = pg_query($sql);
//echo $sql;
//echo $estado3;

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Los Datos se han Actualizado Correctamente"); window.location="bodega_buscar.php"</script>

<?php	
if (!$estado3){
?>
<script language="javascript"> alert("La Operación no se pudo Realizar"); window.location="permiso_buscar.php"</script>
<?php
//echo 'No se pudo realizar la Operacion';
//exit;
}


}//condicion if principal de session

else
{
?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión para Acceder."); window.location="index.php"</script>
<?php
}
pg_close($conexion);
?>
