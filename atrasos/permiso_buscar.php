<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);

if($_SESSION['Id_Tipo_Usuario']=='3'){
?>
<meta charset="utf-8">
  <script language="javascript"> alert("Acceso Restringido"); window.location="alumno_atraso.php"</script>
<?php
}

if($_SESSION['Usuario']){
?>
<html>
<head>
<title>Liceo Valentin Letelier</title>
<link rel="shortcut icon" href="favicon.png" type="image/png"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> </link>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"> </link>
<link rel="stylesheet" type="text/css" href="css.css"> </link>
<link type="text/css" href="css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" type="text/css" href="fonts/style.css"> </link>
<script src="lib/jquery-1.11.2.min.js"> </script>
<script src="jquery.Rut.js" type="text/javascript" ></script>
<script src="jquery-validation-1.12.0/dist/jquery.validate.js"></script>
<script src="jquery-validation-1.12.0/dist/additional-methods.js"></script>
<script src="bootstrap/js/bootstrap.min.js"> </script>
<script src="bootstrap/js/bootstrap-datepicker.js"> </script>
<script src="bootstrap/js/bootstrap-datepicker.es.js"> </script>
<!--<link rel="stylesheet" type="text/css" href="datepicker.css"> </link>-->
<script type="text/javascript" src="bootstrap/js/bootstrap-timepicker.min.js"></script>
<script src="jquery.maskedinput.js" type="text/javascript"></script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery-datepicker.js"> </script>


<script type="text/javascript">
</script>

<script language="javascript">

function confirmDel(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Realmente desea eliminar el Registro?"))
  return true; //con esto se ejecuta el href de link
else
  return false ;
}


</script>



</head>

<body>

<div id="principal"><!--inicio principal-->

<div id="banner"><!--inicio banner-->
<ul class="nav nav-tabs">
    <li><a href="panel_principal.php"> <img src="imagenes/home.png" width="35" height="20"> <b>Panel</b>  </a></li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="imagenes/funcionarios.png" width="35" height="20"> <b>Funcionarios</b> <span class="caret"></span> </a>
    <ul class="dropdown-menu">
      <li><a href="funcionario_registro.php">Añadir Nuevo Funcionario</a></li>
      <li><a href="funcionario_buscar.php">Modificar/Eliminar Funcionario Existente</a></li>
      <li><a href="funcionario_lista.php">Lista de Funcionarios</a></li>
    </ul>
    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="imagenes/ausencia.png" width="35" height="20"> <b>Permisos</b> <span class="caret"></span> </a>
    <ul class="dropdown-menu">
      <li><a href="permiso_registro.php">Añadir Nuevo Permiso</a></li>
      <li><a href="permiso_buscar.php">Modificar/Eliminar Permisos</a></li>
      <li><a href="permiso_lista.php">Resumen General</a></li>
    </ul>
    </li>
    
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="imagenes/usuario.png" width="35" height="20"> <b>Usuario: &nbsp;<?php echo $_SESSION['Usuario']?></b>&nbsp;&nbsp;&nbsp;&nbsp; <span class="caret"></span> </a>
    <ul class="dropdown-menu">
      <li><a href="cambiar_password.php">Cambiar Contraseña</a></li>
      <li><a href="index.php">Cerrar Sesión</a></li>
    </ul>
    </li>
    
</ul>
</div><!--fin banner-->

<div id="izquierda"><!--inicio izquierda-->



</div><!--fin izq-->

<div id="centro"><!--inicio centro-->

<div id="informes"><!--inicio informes-->

<div class="jumbotron"><!--inicio jumbotron-->

<?php
$sql = "select 
permiso.id_permiso,
permiso.fecha_permiso,
permiso.dia_permiso,
permiso.hora_salida,
permiso.hora_llegada,
permiso.observaciones_permiso,
funcionario.nombres_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
usuario.nombre_usuario,
tipo_permiso.tipo_permiso
from funcionario,permiso,tipo_permiso,usuario 
where permiso.id_funcionario=funcionario.id_funcionario
and permiso.id_tipo_permiso=tipo_permiso.id_tipo_permiso
and permiso.id_usuario=usuario.id_usuario
order by permiso.fecha_permiso desc";

$resultado = pg_query ($sql);
?>

  <div class="container">
  <table border="0">
  <td width="1020">
  <p>HISTORIAL DE REGISTRO PERMISOS</p>
  </td>
  <td width="120" align="center">
  <a class="btn btn-ttc" href="informe_registros.php"> <b> </span> Exportar a PDF <img src="imagenes/pdf.png" width="20" height="20"> </b>
  </td>
  </table>
  
  <table border="1" align="left">
  <tr>
    <td width="30" height="35" id="titulo" align="center"> <b>Edit</b> </td>
    <td width="30" height="35" id="titulo" align="center"> <b>ELim</b> </td>
    <td width="50" height="35" id="titulo"> <b>Fecha</b> </td>
    <td width="10" height="35" id="titulo"> <b>Día</b> </td>
    <td width="60" height="35" id="titulo"> <b>Apellido Pat</b> </td>
    <td width="60" height="35" id="titulo"> <b>Apellido Mat</b> </td>
    <td width="150" height="35" id="titulo"> <b>Nombres</b> </td>
    <td width="80" height="35" id="titulo"> <b>Tipo Permiso</b> </td>
    <td width="40" height="35" id="titulo"> <b>Hora Salida</b> </td>
    <td width="40" height="35" id="titulo"> <b>Hora LLegada</b> </td>
    <td width="350" height="35" id="titulo"> <b>Observaciones</b> </td>
    <td width="50" height="35" id="titulo"> <b>Usuario</b> </td>
  </tr>
  <?php
  while ($row = pg_fetch_assoc($resultado)){
  $fecha1=$row['fecha_permiso'];
  $fecha2=date("d-m-Y",strtotime($fecha1));
  $_SESSION['id_acopio']=$row['id_acopio']
  ?>
  <tr>
    <td width="30" height="20" id="titulo2" align="center"> <a href='permiso_procesar.php?id=<?php echo $row['id_permiso']?>'> <img src="imagenes/editar.png" width="20" height="20"> </td>
    <td width="30" height="20" id="titulo2" align="center"> <a href='permiso_eliminar.php?id=<?php echo $row['id_permiso']?>'> <img src="imagenes/eliminar.png" width="20" height="20" onclick="if(confirmDel() == false){return false;}"> </td>
    <td width="50" height="60" id="titulo2" align="center"> <h3><?php echo $fecha2 ?> </h3></td>
    <td width="10" height="60" id="titulo2" align="center"> <h3><?php echo $row ['dia_permiso']?> </h3> </td>
    <td width="60" height="60" id="titulo2"> <h3><?php echo $row ['apellido_paterno_funcionario']?> </h3></td>
    <td width="60" height="60" id="titulo2"> <h3><?php echo $row ['apellido_materno_funcionario']?> </h3></td>
    <td width="150" height="60" id="titulo2"> <h3><?php echo $row ['nombres_funcionario']?> </h3></td>
    <td width="80" height="60" id="titulo2"> <h3><?php echo $row ['tipo_permiso']?> </h3></td>
    <td width="40" height="60" id="titulo2" align="center"> <h3><?php echo $row ['hora_salida']?> </h3></td>
    <td width="40" height="60" id="titulo2" align="center"> <h3><?php echo $row ['hora_llegada']?> </h3></td>
    <td width="350" height="60" id="titulo2"> <h3><?php echo $row ['observaciones_permiso']?> </h3></td>
    <td width="50" height="60" id="titulo2" align="center"> <h3><?php echo $row ['nombre_usuario']?> </h3></td>
  </tr>
  <?php
  }
  
  ?>
  </table>
  
  </div>


</div><!--fin jumbotron-->

</div><!--fin informes-->


</div><!--fin centro-->

<div id="derecha"><!--inicio der-->

</div><!--fin derecha-->



</div><!--fin principal-->
</body>

</html>
<?php
}
else{

?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión"); window.location="index.php"</script>
<?php
pg_close($conexion);
}
?>
