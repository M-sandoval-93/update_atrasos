<?php
include ("conexion.php");
$conexion=Conectarse();

session_start();
error_reporting (0);

//GUARDAR NUEVO Y ACTUALIZAR FUNCIONARIO EN BD
if($_SESSION['Usuario']){//INICIO CONDICION PRINCIPAL SESION USUARIO

if(empty($_GET["id"])){
?>
<meta charset="utf-8">
	<script language="javascript"> alert("No se realizó ningun cambio. Debe seleccionar al menos una fila"); window.location="alumno_atraso.php"</script>
<?php
}

else{
if ( !empty($_GET["id"]) && is_array($_GET["id"]) ) { 
    
    foreach ( $_GET["id"] as $id ) { 
            $sql="update atraso set estado ='JUSTIFICADO',usuario_justifica ='".$_SESSION['Usuario']."' where id_atraso = ".$id." ";
			$sql_resultado=pg_query($sql);
			$sql;
             
     }
}

//$sql="update t_atraso set estado='JUSTIFICADO' where id_atraso in = ".$id." ";
//$sql_resultado=pg_query($sql);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Los datos se guardaron Exitosamente"); window.location="alumno_atraso.php"</script>
<?php
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
