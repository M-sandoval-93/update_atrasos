<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);
if($_SESSION['Usuario']){

$id_permiso = $_GET['id_perm_tab'];

echo $sql = "delete from permiso where id_permiso = ".$id_permiso." ";
//echo $sql;
$resultado = pg_query ($sql);

?>
<meta charset="utf-8">
<script language="javascript"> alert("Registro Eliminado Exitosamente"); window.location="permiso_registro.php"</script>
<?php
			
if (!$resultado){
?>
<script language="javascript"> alert("La Operación no se pudo Realizar"); window.location="permiso_registro.php"</script>
<?php
//echo 'No se pudo realizar la Operacion';
//exit;
}

pg_close($conexion);
}
else
{

?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión para Acceder."); window.location="index.php"</script>
<?php
}

?>