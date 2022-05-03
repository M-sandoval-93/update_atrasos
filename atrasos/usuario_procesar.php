<?php
mysql_set_charset('utf8');
session_start();
error_reporting (0);
if($_SESSION['Usuario']){

$estado1 = mysql_connect ('localhost', 'Monkinhor', 'Knd2$THipL$$xSiak');

if (!$estado1){
echo "no hay coneccion existente";
exit;
}

$estado2 = mysql_select_db ('agrosol');

if (!$estado2){
echo "no hay acceso a la base de datos";
exit;
}

$id = $_GET['id'];

$sql = "select * from usuario,tipo_usuario
    where usuario.id_tipo_usuario=tipo_usuario.id_tipo_usuario
    and usuario.id_usuario = ".$id." ";

$resultado = mysql_query ($sql);
$_SESSION['id_usuario']=$id;

if ($row = mysql_fetch_assoc($resultado)){

$_SESSION['usuario']=$row['nombre_usuario'];
$_SESSION['password']=$row['password_usuario'];
$_SESSION['id_tipo_usuario']=$row['id_tipo_usuario'];
$_SESSION['tipo_usuario']=$row['tipo_usuario'];
}

?>
<meta charset="utf-8">
<script language="javascript"> window.location="usuario_modificar.php"</script>
<?php

}
else{
mysql_set_charset('utf8');
?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión"); window.location="index.php"</script>
<?php
}

?>