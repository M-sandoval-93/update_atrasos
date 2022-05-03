<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);
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
<link rel="stylesheet" type="text/css" href="bootstrap/clockpicker/dist/bootstrap-clockpicker.min.css">
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

<script type="text/javascript" src="bootstrap/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker();
</script>


<script type="text/javascript">
$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd-mm-yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: true,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fecha_form").datepicker({});
});
 
//<!--inicio validacion formulario-->
$(document).ready(function(){

    jQuery.validator.addMethod("letras", function(value, element) {
      return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Solo letras");

    jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
    }, "Value must not equal arg.");

$("#rut").Rut({
    on_error: function(){ alert('El Rut ingresado no es valido'); },
    format_on: 'true',
    format_on: 'change'
  });



});
//<!--fin validacion formulario-->

</script>

</head>

<body>

<?php

$sql_ciudad = "select * from ciudad order by ciudad asc";
$sql_estado_civil = "select * from estado_civil order by estado_civil asc";
$sql_tipo_funcionario = "select * from tipo_funcionario order by tipo_funcionario asc";
$sql_detalle_tipo_funcionario = "select * from detalle_tipo_funcionario order by detalle_tipo_funcionario asc";
$sql_grupo_horario = "select * from grupo_horario order by nombre_grupo_horario asc";
$sql_sexo = "select codigo_sexo from sexo";
$sql_estado_vigencia = "select * from estado_vigencia";

?>

<div id="principal"><!--inicio principal-->

<div id="banner"><!--inicio banner-->
<ul class="nav nav-tabs">
    <li><a href="panel_principal.php"> <img src="imagenes/insignia_lvl.JPG" width="35" height="20"> <b>Panel</b>  </a></li>
    
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="imagenes/proveedores.png" width="35" height="20"> <b>Funcionario</b> <span class="caret"></span> </a>
    <ul class="dropdown-menu">
      <li><a href="funcionario_registro.php">Añadir Nuevo Funcionario</a></li>
      <li><a href="funcionario_buscar.php">Modificar/Eliminar Registro Existente</a></li>
      <li><a href="funcionario_lista.php">Lista de Funcionarios</a></li>
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

<div id="centro"><!--inicio centro-->

<div id="informes">

<div class="jumbotron">
  <div class="container">
    <table border="0">
    <tr>
    <td width="1050">
    <h4>Resumen General Permisos</h4>
    </td>
    <td width="120" valign="bottom" id="pdf1">
    <a class="btn btn-primary" href="informe_permisos.php" value="Exportar a PDF">Exportar PDF
    </td>
    </tr>
    </table>
<?php

$sql = "select 
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

<table border="1" align="left">
<tr>
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
$fecha=$row['fecha_permiso'];
$fecha2=date("d-m-Y",strtotime($fecha));
?>
<tr>
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
</div>

</div>


</div><!--fin centro-->

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
}
pg_close($conexion);
?>

