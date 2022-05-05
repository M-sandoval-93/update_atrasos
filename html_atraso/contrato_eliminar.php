<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);
if($_SESSION['Usuario']){

$id = $_GET['id_fun_tab'];

$sql = "delete from contrato 
where id_contrato in (select contrato.id_contrato from contrato,funcionario 
where funcionario.id_funcionario=contrato.id_funcionario
and contrato.id_funcionario = ".$id." order by id_contrato desc limit 1) ";
//echo $sql;
$resultado = pg_query ($sql);

?>
<meta charset="utf-8">
<script language="javascript"> alert("Contrato Eliminado Exitosamente"); window.location="funcionario_activar.php"</script>
<?php
			
if (!$resultado){
?>
<script language="javascript"> alert("La Operación no se pudo Realizar"); window.location="funcionario_activar.php"</script>
<?php

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