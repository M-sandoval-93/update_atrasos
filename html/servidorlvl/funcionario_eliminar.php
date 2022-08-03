<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);
if($_SESSION['Usuario']){

$id = $_GET['id_fun_tab'];

echo $sql = "delete from funcionario where id_funcionario = ".$id." ";
//echo $sql;
$resultado = pg_query ($sql);

?>
<meta charset="utf-8">
<script language="javascript"> alert("Registro Eliminado Exitosamente"); window.location="funcionario_registro.php"</script>
<?php
			
if (!$resultado){
?>
<script language="javascript"> alert("La Operación no se pudo Realizar"); window.location="funcionario_registro.php"</script>
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