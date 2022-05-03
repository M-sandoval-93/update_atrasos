<?php
mysql_set_charset('utf8');
session_start();
error_reporting (0);
if($_SESSION['Usuario']){

$user = $_POST['usuario'];
$pass = $_POST['password'];
$tipo_usuario = $_POST['tipo_usuario'];

$conectar_gdb = mysql_connect ('localhost', 'Monkinhor', 'Knd2$THipL$$xSiak');

if (!$conectar_gdb){
echo "No se pudo Establecer la Conección con Servidor";
exit;
}

$conect_db = mysql_select_db ('agrosol');

if (!$conect_db){
echo "No se Pudo Conectar a La Base de Datos";
exit;
}

$sql = "update usuario set 
nombre_usuario='".$user."', 
password_usuario='".$pass."', 
id_tipo_usuario=".$tipo_usuario." 
where id_usuario=".$_SESSION['id_usuario']." "; 
//echo $sql;

$estado3 = mysql_query($sql);
//echo $sql;
//echo $estado3;

?>
<meta charset="utf-8">
	<script language="javascript"> alert("Los Datos se han Actualizado Correctamente"); window.location="usuario_buscar.php"</script>

<?php	
if (!$estado3){
?>
<script language="javascript"> alert("La Operación no se pudo Realizar"); window.location="usuario_buscar.php"</script>
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

?>
