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

//GUARDAR REGISTRO PERMISO EN BD
if($_SESSION['Usuario']){



//INICIO RECEPCION DE VARIBALES DEL FORMULARIO REGISTRO PERMISOS
$rut = $_POST['rut'];
$id_curso = $_POST['nombre_curso'];
//FIN RECEPCION DE VARIABLES DEL FORMULARIO REGISTRO PERMISOS


$sql_curso = "update alumno set
id_curso = ".$id_curso."
where rut_alumno= '".$rut."' ";

$res_sql_curso = pg_query($sql_curso);

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Cambio Realizado Exitosamente"); window.location="alumno_registro.php"</script>
<?php

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
