<?php
session_start();
error_reporting (0);


include ("conexion.php");
$conexion=Conectarse();

$u = str_replace("'!=<>&*;:", "", $_POST['user']);
$c = str_replace("'!=<>&*;:", "", $_POST['pass']);

//$consulta = "select * from usuario where nombre_usuario = '".$u."' and password_usuario = '".$c."' ";
$consulta = "select 
funcionario.apellido_paterno_funcionario,
funcionario.nombres_funcionario,
usuario.id_usuario,
nombre_usuario,
password_usuario,
usuario.id_funcionario,
usuario.id_tipo_usuario 
from funcionario,usuario
where funcionario.id_funcionario=usuario.id_funcionario 
and nombre_usuario = '".$u."' and password_usuario = '".$c."' ";

$consulta_vigencia ="select 
contrato.id_estado_vigencia 
from 
usuario,contrato
where contrato.id_funcionario=usuario.id_funcionario
and usuario.nombre_usuario='".$u."'
order by contrato.id_contrato desc limit 1 ";

$res=pg_query($consulta) or die(pg_error());
$res2=pg_query($consulta_vigencia) or die(pg_error());


if($row=pg_fetch_assoc($res2)){//VALIDAR SI CUENTA USUARIO SE ENCUENTRA ACTIVA
if($row['id_estado_vigencia']==2){
?>
<script language="javascript"> alert("Su Cuenta se Encuentra Deshabilitada"); window.location="index.php"</script>	
<?php
}
}//VALIDAR SI CUENTA USUARIO SE ENCUENTRA ACTIVA


if($row=pg_fetch_assoc($res)){//INICIO SI SESION USUARIO

if($row['nombre_usuario'] ==  $u && $row['password_usuario'] == $c){//if validacion datos formulario
$nombre=$row['nombres_funcionario'];
$apellido=$row['apellido_paterno_funcionario'];
$u=strtolower($nombre[0].$apellido);

$_SESSION['Usuario']=$u;
$_SESSION['Clave']=$c;
$_SESSION['Id_Usuario']=$row['id_usuario'];
$_SESSION['Id_Tipo_Usuario']=$row['id_tipo_usuario'];


if($row['id_tipo_usuario']==3){
?>
<script language="javascript"> window.location="alumno_atraso.php"</script>	
<?php
}

else{
?>
<script language="javascript"> window.location="panel_principal.php"</script>
<?php	
}


}//if validacion datos formulario

else//else datos formulario
{
?>
<meta charset="utf-8">
<script language="javascript"> alert("El Usuario o la Contraseña no Son Válidos. Vuelva a Intentarlo"); window.location="index.php"</script>
<?php
}//else datos formulario



}//FIN SI SESION USUARIO

else//INICIO ELSE SESION USUARIO
{

?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión"); window.location="index.php"</script>
<?php
}//FIN ELSE SESION USUARIO
?>
