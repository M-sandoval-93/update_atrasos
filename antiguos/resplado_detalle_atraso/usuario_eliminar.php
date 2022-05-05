<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);
if($_SESSION['Usuario']){

$id_usuario = $_GET['id_usu_tab'];

$sql = "delete from usuario where id_usuario = ".$id_usuario." ";
$resultado = pg_query ($sql);

?>
<meta charset="utf-8">
<script language="javascript"> alert("Usuario Eliminado Exitosamente"); window.location="usuario_registro.php"</script>
<?php
			
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