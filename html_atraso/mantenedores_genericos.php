<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);

if($_SESSION['Usuario']){

?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Liceo Valentin Letelier</title>
<link rel="shortcut icon" href="favicon.png" type="image/png"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css.css"> </link>
<link rel="stylesheet" type="text/css" href="responsive.css"> </link>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> </link>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"> </link>
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
<script type="text/javascript" src="bootstrap/js/bootstrap-timepicker.min.js"></script>
<script src="jquery.maskedinput.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery-datepicker.js"> </script>
<script type="text/javascript" src="bootstrap/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="jquery.js"></script>


<script type="text/javascript"></script>

<script>
function MenuResponsive() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

<script type="text/javascript">

//<!--inicio validacion formulario-->
$(document).ready(function(){

    jQuery.validator.addMethod("letras", function(value, element) {
      return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Solo letras");

    jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
    }, "Value must not equal arg.");

	$("#rut_n").Rut({
    on_error: function(){ alert('El Rut ingresado no es valido'); },
    format_on: 'true',
    format_on: 'change'
  	});

});
//<!--FIN VALIDACION FORMULARIO-->


 function confirmDel(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Desea Eliminar el Registro Seleccionado?"))
  return true; //con esto se ejecuta el href de link
else
  return false ;
}

function confirmEdit(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Desea Editar el Registro Seleccionado?"))
  return true; //con esto se ejecuta el href de link
else
  return false ;
}

</script>


<style>
* {
  box-sizing: border-box;
}


#tabla_tf {
  border-collapse: collapse;
  width: 25%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#tabla_tf th{
  text-align: left;
  padding: 1px;
}

#tabla_tf tr {
  border-bottom: 1px solid #ddd;

}

#tabla_tf tr.header, #tabla_tf tr:hover {
  background-color: #f1f1f1;
}

#tabla_tf tr:nth-child(even) {
  background-color: #bdbdbd;
}



#tabla_dtf {
  border-collapse: collapse;
  width: 40%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#tabla_dtf th{
  text-align: left;
  padding: 1px;
}

#tabla_dtf tr {
  border-bottom: 1px solid #ddd;
  text-align: left;
}

#tabla_dtf tr.header, #tabla_dtf tr:hover {
  background-color: #f1f1f1;
}

#tabla_dtf tr:nth-child(even) {
  background-color: #bdbdbd;
}


#tabla_gh {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#tabla_gh th{
  text-align: left;
  padding: 1px;
}

#tabla_gh tr {
  border-bottom: 1px solid #ddd;
  text-align: left;
}

#tabla_gh tr.header, #tabla_gh tr:hover {
  background-color: #f1f1f1;
}

#tabla_gh tr:nth-child(even) {
  background-color: #bdbdbd;
}
</style>
 
</head>

<body onload="document.getElementById('rut').focus();">
<span class="ir-arriba icon-chevron-up"></span>

<div class="container-fluid">

<!--INICIO MENU -->
 <div class="topnav" id="myTopnav">
  <a href="panel_principal.php" class="active"> <div id="img_insignia"> <img src="imagenes/insignia_lvl.png" width="40" height="43"> </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inicio </a>
  
  <div class="dropdown">
    <button class="dropbtn"> <img src="imagenes/funcionarios.png" width="35" height="20"> Funcionarios
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="funcionario_registro.php">Añadir Nuevo Funcionario</a>
      <a href="funcionario_activar.php">Contrato</a>
      <?php if($_SESSION['Id_Tipo_Usuario'] == 1){ ?>
      <a href="funcionario_contratos.php">Historial Contratos</a>
      <a href="mantenedores_genericos.php">Mantenedores Genéricos</a>
      <?php }; ?>
    </div>
  </div>
  
  <div class="dropdown">
    <button class="dropbtn"> <img src="imagenes/ausencia.png" width="35" height="20"> Permisos
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="permiso_registro.php">Añadir Nuevo Permiso</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn"> <img src="imagenes/alumno.png" width="35" height="20"> Alumnos
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="alumno_atraso.php">Atrasos</a>
      <?php if($_SESSION['Id_Tipo_Usuario'] == 1){ ?>
      <a href="alumno_registro.php">Cambio de Curso</a>
      <?php }; ?>
    </div>
  </div>
  
  <div class="dropdown">
    <button class="dropbtn"> <img src="imagenes/usuario.png" width="35" height="20"> Usuario: &nbsp;<?php echo $_SESSION['Usuario']?>&nbsp;&nbsp;&nbsp;&nbsp;
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <?php if($_SESSION['Id_Tipo_Usuario'] == 1){ ?>
      <a href="usuario_registro.php">Crear/Eliminar Usuarios</a>
      
      <?php }; ?>
      <a href="index.php">Cerrar Sesión</a>
    </div>
  </div>
    
  <a href="javascript:void(0);" class="icon" onclick="MenuResponsive()"> Menú&nbsp;&#9776; </a>

</div> 
<!--FIN MENU -->
<?php
$sql_tipo_funcionario = "select * from tipo_funcionario order by id_tipo_funcionario";
$sql_detalle_tipo_funcionario = "select * from detalle_tipo_funcionario,tipo_funcionario
where tipo_funcionario.id_tipo_funcionario=detalle_tipo_funcionario.id_tipo_funcionario
order by detalle_tipo_funcionario.detalle_tipo_funcionario";
$sql_grupo_horario = "select * from grupo_horario order by id_grupo_horario";
$sql_tipo_permiso = "select * from tipo_permiso order by id_tipo_permiso";
$sql_estado_vigencia = "select * from estado_vigencia order by id_estado_vigencia";
$sql_tipo_usuario = "select * from tipo_usuario order by id_tipo_usuario";
?>
<header>
	<h1>Mantenedores Genéricos</h1>
</header> 

<section>

<?php
$id_tf = $_GET['id_tf'];
$_SESSION['id_tf'] = $id_tf;

$sql_edit_tf = "select * from tipo_funcionario where id_tipo_funcionario =".$id_tf." ";

$res_edit_tf = pg_query ($sql_edit_tf);

if ($row = pg_fetch_assoc($res_edit_tf)){
$id_tf=$row['id_tipo_funcionario'];
$tipo_funcionario=$row['tipo_funcionario'];
}
?>

<h3>Tipo Funcionario (Ejem: Asistente, Docente, Etc.)</h3>
<div id="BuscarFuncionario">
<form action="mantenedores_procesar.php" method="post" role="form" name="f1" id="f1">

  <div class="form-row">

    <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="tipo_funcionario" name="tipo_funcionario" placeholder="TIPO FUNCIONARIO" value="<?php echo $tipo_funcionario?>" required maxlength="25" style="text-transform:uppercase;">
    </div>

    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="grabar"> <b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" id="Borrar" onclick="location.href = 'mantenedores_genericos.php'; return false"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>

    <div class="form-group col-lg-7">
    </div>

  </div>  

</form>
</div>
</section>

<br>
<div class="panel panel-default"> <!--inicio panel panel default -->
<?php
$res_tabla_tf = pg_query($sql_tipo_funcionario);
?>
<div class="panel-heading">  
<table>
  <tr>
    <td id="cabeza_panel_1"> <h5> <strong> Tipos de Funcionarios Existentes</strong> </h5> </td>
  </tr>
</table>
</div>

<table id="tabla_tf">
  
  <tr class="header">
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Act </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Des </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> ID </p> </th>
    <th style="width:70%;" id="cabecera_tabla_1"> <p> TIPO FUNCIONARIO </p> </th>
  </tr>

  <?php
  
  while ($row = pg_fetch_assoc($res_tabla_tf)){
  ?>
  
  <tr>
    <td> 
    <p> 
      <a href='mantenedores_genericos.php?id_tf=<?php echo $row['id_tipo_funcionario']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit() == false){return false;}">
    </p> 
    </td>
    <td>
    <p> 
      <a href='mantenedores_eliminar.php?id_tf=<?php echo $row['id_tipo_funcionario']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
    </p> 
    </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['id_tipo_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['tipo_funcionario']?> </p> </td>
  </tr>
  <?php
  }
  ?>
</table> 
</div> <!--fin panel panel default -->

<br></br>

<section>

<?php
$id_dtf = $_GET['id_dtf'];
$_SESSION['id_dtf'] = $id_dtf;

$sql_edit_dtf = "select 
detalle_tipo_funcionario.id_detalle_tipo_funcionario,
detalle_tipo_funcionario.detalle_tipo_funcionario,
detalle_tipo_funcionario.id_tipo_funcionario,
tipo_funcionario.tipo_funcionario
from detalle_tipo_funcionario,tipo_funcionario 
where detalle_tipo_funcionario.id_tipo_funcionario=tipo_funcionario.id_tipo_funcionario
and detalle_tipo_funcionario.id_detalle_tipo_funcionario = ".$id_dtf."
order by detalle_tipo_funcionario.detalle_tipo_funcionario";

$res_edit_dtf = pg_query ($sql_edit_dtf);

if ($row = pg_fetch_assoc($res_edit_dtf)){
$id_dtf=$row['id_tipo_funcionario'];
$detalle_tipo_funcionario=$row['detalle_tipo_funcionario'];
$id_tipo_funcionario=$row['id_tipo_funcionario'];
$tipo_funcionario=$row['tipo_funcionario'];

}
?>

<h3>Detalle Tipo Funcionario (Ejem: Secretaria, Inspector, Docente, Etc.)</h3>
<div id="BuscarFuncionario">
<form action="mantenedores_procesar.php" method="post" role="form" name="f1" id="f1">

  <div class="form-row">

    <div class="form-group col-lg-4">
      <input type="text" class="form-control" id="detalle_tipo_funcionario" name="detalle_tipo_funcionario" placeholder="DETALLE TIPO FUNCIONARIO" value="<?php echo $detalle_tipo_funcionario?>" required maxlength="50" style="text-transform:uppercase;">
    </div>

    <div class="form-group col-md-2">
    <select class="form-control" name="id_tipo_funcionario" id="id_tipo_funcionario" style="text-transform:uppercase;" required placeholder="SELECCIONE">
        <option value="<?php echo $id_tipo_funcionario?>"> <?php echo $tipo_funcionario?> </option>
        <?php
        $res_tf = pg_query($sql_tipo_funcionario);       
            while ($row = pg_fetch_assoc($res_tf)){
              echo "<option value=\"".$row['id_tipo_funcionario']."\">";
              echo $row['tipo_funcionario']."</option>";
      }
    ?>
    </select>
    </div>

    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="grabar"> <b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" id="Borrar" onclick="location.href = 'mantenedores_genericos.php'; return false"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>

    <div class="form-group col-lg-4">
    </div>

  </div>  

</form>
</div>
</section>

<br>

<div class="panel panel-default"> <!--inicio panel panel default -->
<?php
$res_tabla_dtf = pg_query($sql_detalle_tipo_funcionario);
?>
<div class="panel-heading">  
<table>
  <tr>
    <td id="cabeza_panel_1"> <h5> <strong> Detalle Tipo Funcionario Existentes</strong> </h5> </td>
  </tr>
</table>
</div>

<table id="tabla_dtf">
  
  <tr class="header">
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Act </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Des </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> ID </p> </th>
    <th style="width:35%;" id="cabecera_tabla_1"> <p> DETALLE TIPO FUNCIONARIO </p> </th>
    <th style="width:35%;" id="cabecera_tabla_1"> <p> TIPO FUNCIONARIO </p> </th>
  </tr>

  <?php
  
  while ($row = pg_fetch_assoc($res_tabla_dtf)){
  ?>
  
  <tr>
    <td> 
    <p> 
      <a href='mantenedores_genericos.php?id_dtf=<?php echo $row['id_detalle_tipo_funcionario']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit() == false){return false;}">
    </p> 
    </td>
    <td>
    <p> 
      <a href='mantenedores_eliminar.php?id_dtf=<?php echo $row['id_detalle_tipo_funcionario']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
    </p> 
    </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['id_detalle_tipo_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['detalle_tipo_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['tipo_funcionario']?> </p> </td>
  </tr>
  <?php
  }
  ?>
</table> 
</div> <!--fin panel panel default -->

<br></br>

<section>
<?php
$id_gh = $_GET['id_gh'];
$_SESSION['id_gh'] = $id_gh;

$sql_edit_gh = "select * from grupo_horario where id_grupo_horario =".$id_gh." ";

$res_edit_gh = pg_query ($sql_edit_gh);

if ($row = pg_fetch_assoc($res_edit_gh)){
$id_gh=$row['id_grupo_horario'];
$nombre_grupo_horario=$row['nombre_grupo_horario'];
$hora_1=substr($row ['hora_entrada_1'], 0, -6);
$hora_2=substr($row ['hora_salida_1'], 0, -6);
$hora_3=substr($row ['hora_entrada_2'], 0, -6);
$hora_4=substr($row ['hora_salida_2'], 0, -6);
$hora_5=substr($row ['hora_entrada_3'], 0, -6);
$hora_6=substr($row ['hora_salida_3'], 0, -6);
$hora_7=substr($row ['hora_entrada_4'], 0, -6);
$hora_8=substr($row ['hora_salida_4'], 0, -6);
}
?>
<h3>Grupo Horario (Ejem: Administrativo, Docente, Aseo, Etc.)</h3>
<div id="BuscarFuncionario">
<form action="mantenedores_procesar.php" method="post" role="form" name="f1" id="f1">

  <div class="form-row">

    <div class="form-group col-lg-2">
      <input type="text" class="form-control" id="nombre_grupo_horario" name="nombre_grupo_horario" placeholder="NOMBRE GRUPO HORARIO" value="<?php echo $nombre_grupo_horario?>" required maxlength="50" style="text-transform:uppercase;">
    </div>

    <div class="form-group col-lg-1">
      <input type="text" class="form-control" id="hora_1" name="hora_1" placeholder="00:00" value="<?php echo $hora_1?>" required maxlength="5">
    </div>

    <div class="form-group col-lg-1">
      <input type="text" class="form-control" id="hora_2" name="hora_2" placeholder="00:00" value="<?php echo $hora_2?>" required maxlength="5">
    </div>

    <div class="form-group col-lg-1">
      <input type="text" class="form-control" id="hora_3" name="hora_3" placeholder="00:00" value="<?php echo $hora_3?>" maxlength="5">
    </div>

    <div class="form-group col-lg-1">
      <input type="text" class="form-control" id="hora_4" name="hora_4" placeholder="00:00" value="<?php echo $hora_4?>" maxlength="5">
    </div>

    <div class="form-group col-lg-1">
      <input type="text" class="form-control" id="hora_5" name="hora_5" placeholder="00:00" value="<?php echo $hora_5?>" maxlength="5">
    </div>

    <div class="form-group col-lg-1">
      <input type="text" class="form-control" id="hora_6" name="hora_6" placeholder="00:00" value="<?php echo $hora_6?>" maxlength="5">
    </div>

    <div class="form-group col-lg-1">
      <input type="text" class="form-control" id="hora_7" name="hora_7" placeholder="00:00" value="<?php echo $hora_7?>" maxlength="5">
    </div>

    <div class="form-group col-lg-1">
      <input type="text" class="form-control" id="hora_8" name="hora_8" placeholder="00:00" value="<?php echo $hora_8?>" maxlength="5">
    </div>

    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="grabar"> <b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" id="Borrar" onclick="location.href = 'mantenedores_genericos.php'; return false"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>


  </div>  

</form>
</div>
</section>

<br>

<div class="panel panel-default"> <!--inicio panel panel default -->
<?php
$res_tabla_gh = pg_query($sql_grupo_horario);
?>
<div class="panel-heading">  
<table>
  <tr>
    <td id="cabeza_panel_1"> <h5> <strong> Grupos Horarios Existentes </strong> </h5> </td>
  </tr>
</table>
</div>

<table id="tabla_gh">
  
  <tr class="header">
    <th style="width:3%;" id="cabecera_tabla_1"> <p> Act </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> Des </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> ID </p> </th>
    <th style="width:15%;" id="cabecera_tabla_1"> <p> GRUPO HORARIO </p> </th>
    <th style="width:7%;" id="cabecera_tabla_1"> <p> H.ENTRADA 1 </p> </th>
    <th style="width:7%;" id="cabecera_tabla_1"> <p> H.SALIDA 1 </p> </th>
    <th style="width:7%;" id="cabecera_tabla_1"> <p> H.ENTRADA 2 </p> </th>
    <th style="width:7%;" id="cabecera_tabla_1"> <p> H.SALIDA 2 </p> </th>
    <th style="width:7%;" id="cabecera_tabla_1"> <p> H.ENTRADA 3 </p> </th>
    <th style="width:7%;" id="cabecera_tabla_1"> <p> H.SALIDA 3 </p> </th>
    <th style="width:7%;" id="cabecera_tabla_1"> <p> H.ENTRADA 4 </p> </th>
    <th style="width:7%;" id="cabecera_tabla_1"> <p> H.SALIDA 4 </p> </th>
  </tr>

  <?php
  
  while ($row = pg_fetch_assoc($res_tabla_gh)){
  ?>
  
  <tr>
    <td> 
    <p> 
      <a href='mantenedores_genericos.php?id_gh=<?php echo $row['id_grupo_horario']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit() == false){return false;}">
    </p> 
    </td>
    <td>
    <p> 
      <a href='mantenedores_eliminar.php?id_gh=<?php echo $row['id_grupo_horario']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
    </p> 
    </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['id_grupo_horario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['nombre_grupo_horario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo substr($row ['hora_entrada_1'], 0, -6)?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo substr($row ['hora_salida_1'], 0, -6)?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo substr($row ['hora_entrada_2'], 0, -6)?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo substr($row ['hora_salida_2'], 0, -6)?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo substr($row ['hora_entrada_3'], 0, -6)?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo substr($row ['hora_salida_3'], 0, -6)?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo substr($row ['hora_entrada_4'], 0, -6)?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo substr($row ['hora_salida_4'], 0, -6)?> </p> </td>
  </tr>
  <?php
  }
  ?>
</table> 
</div> <!--fin panel panel default -->

<br></br>

<section>
<?php
$id_tp = $_GET['id_tp'];
$_SESSION['id_tp'] = $id_tp;

$sql_edit_tp = "select * from tipo_permiso where id_tipo_permiso = ".$id_tp." ";

$res_edit_tp = pg_query ($sql_edit_tp);

if ($row = pg_fetch_assoc($res_edit_tp)){
$id_tp=$row['id_tipo_permiso'];
$tipo_permiso=$row['tipo_permiso'];
}
?>

<h3>Tipo Permiso (Ejemplo: Administrativo, Parcial Día, Extraordinario, Etc.)</h3>
<div id="BuscarFuncionario">
<form action="mantenedores_procesar.php" method="post" role="form" name="f1" id="f1">

  <div class="form-row">

    <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="tipo_permiso" name="tipo_permiso" placeholder="TIPO PERMISO" value="<?php echo $tipo_permiso?>" required maxlength="25" style="text-transform:uppercase;">
    </div>

    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="grabar"> <b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" id="Borrar" onclick="location.href = 'mantenedores_genericos.php'; return false"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>

    <div class="form-group col-lg-7">
    </div>

  </div>  

</form>
</div>
</section>

<br>

<div class="panel panel-default"> <!--inicio panel panel default -->
<?php
$res_tabla_tp = pg_query($sql_tipo_permiso);
?>
<div class="panel-heading">  
<table>
  <tr>
    <td id="cabeza_panel_1"> <h5> <strong> Tipo Permisos Creados </strong> </h5> </td>
  </tr>
</table>
</div>

<table id="tabla_tf">
  
  <tr class="header">
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Act </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Des </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> ID </p> </th>
    <th style="width:70%;" id="cabecera_tabla_1"> <p> TIPO PERMISO </p> </th>
  </tr>

  <?php
  
  while ($row = pg_fetch_assoc($res_tabla_tp)){
  ?>
  
  <tr>
    <td> 
    <p> 
      <a href='mantenedores_genericos.php?id_tp=<?php echo $row['id_tipo_permiso']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit() == false){return false;}">
    </p> 
    </td>
    <td>
    <p> 
      <a href='mantenedores_eliminar.php?id_tp=<?php echo $row['id_tipo_permiso']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
    </p> 
    </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['id_tipo_permiso']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['tipo_permiso']?> </p> </td>
  </tr>
  <?php
  }
  ?>
</table> 
</div> <!--fin panel panel default -->

<br></br>

<section>

<?php
$id_ev = $_GET['id_ev'];
$_SESSION['id_ev'] = $id_ev;

$sql_edit_ev = "select * from estado_vigencia where id_estado_vigencia = ".$id_ev." ";

$res_edit_ev = pg_query ($sql_edit_ev);

if ($row = pg_fetch_assoc($res_edit_ev)){
$id_ev=$row['id_estado_vigencia'];
$codigo_estado_vigencia=$row['codigo_estado_vigencia'];
$descripcion_estado_vigencia=$row['descripcion_estado_vigencia'];
}
?>

<h3>Estado Vigencia (Ejem: Vigente, No Vigente, Etc.)</h3>
<div id="BuscarFuncionario">
<form action="mantenedores_procesar.php" method="post" role="form" name="f1" id="f1">

  <div class="form-row">

    <div class="form-group col-lg-1">
      <input type="text" class="form-control" id="codigo_estado_vigencia" name="codigo_estado_vigencia" placeholder="CODIGO ESTADO VIGENCIA" value="<?php echo $codigo_estado_vigencia?>" required maxlength="1" style="text-transform:uppercase;">
    </div>

    <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="estado_vigencia" name="estado_vigencia" placeholder="DESCRIPCION ESTADO VIGENCIA" value="<?php echo $descripcion_estado_vigencia?>" required maxlength="25" style="text-transform:uppercase;">
    </div>

    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="grabar"> <b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" id="Borrar" onclick="location.href = 'mantenedores_genericos.php'; return false"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>

    <div class="form-group col-lg-6">
    </div>

  </div>  

</form>
</div>
</section>

<br>
<div class="panel panel-default"> <!--inicio panel panel default -->
<?php
$res_tabla_ev = pg_query($sql_estado_vigencia);
?>
<div class="panel-heading">  
<table>
  <tr>
    <td id="cabeza_panel_1"> <h5> <strong> Estados Creados </strong> </h5> </td>
  </tr>
</table>
</div>

<table id="tabla_dtf">

  <tr class="header">
    <th style="width:7%;" id="cabecera_tabla_1"> <p> Act </p> </th>
    <th style="width:7%;" id="cabecera_tabla_1"> <p> Des </p> </th>
    <th style="width:7%;" id="cabecera_tabla_1"> <p> ID </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> COD </p> </th>
    <th style="width:80%;" id="cabecera_tabla_1"> <p> DESCRIP. ESTADO </p> </th>
  </tr>

  <?php
  
  while ($row = pg_fetch_assoc($res_tabla_ev)){
  ?>
  
  <tr>
    <td> 
    <p> 
      <a href='mantenedores_genericos.php?id_ev=<?php echo $row['id_estado_vigencia']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit() == false){return false;}">
    </p> 
    </td>
    <td>
    <p> 
      <a href='mantenedores_eliminar.php?id_ev=<?php echo $row['id_estado_vigencia']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
    </p> 
    </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['id_estado_vigencia']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['codigo_estado_vigencia']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['descripcion_estado_vigencia']?> </p> </td>
  </tr>
  <?php
  }
  ?>
</table> 
</div> <!--fin panel panel default -->

<br>

<section>

<?php
$id_tu = $_GET['id_tu'];
$_SESSION['id_tu'] = $id_tu;

$sql_edit_tu = "select * from tipo_usuario where id_tipo_usuario = ".$id_tu." ";

$res_edit_tu = pg_query ($sql_edit_tu);

if ($row = pg_fetch_assoc($res_edit_tu)){
$id_tu=$row['id_tipo_usuario'];
$tipo_usuario=$row['tipo_usuario'];
}
?>

<h3>Tipo Usuario (Ejem: Usuario Estandar, Usuario Restringido, Etc.)</h3>
<div id="BuscarFuncionario">
<form action="mantenedores_procesar.php" method="post" role="form" name="f1" id="f1">

  <div class="form-row">

    <div class="form-group col-lg-3">
      <input type="text" class="form-control" id="tipo_usuario" name="tipo_usuario" placeholder="TIPO USUARIO" value="<?php echo $tipo_usuario?>" required maxlength="25" style="text-transform:uppercase;">
    </div>

    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="grabar"> <b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" id="Borrar" onclick="location.href = 'mantenedores_genericos.php'; return false"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>

    <div class="form-group col-lg-7">
    </div>

  </div>  

</form>
</div>
</section>

<br>
<div class="panel panel-default"> <!--inicio panel panel default -->
<?php
$res_tabla_tu = pg_query($sql_tipo_usuario);
?>
<div class="panel-heading">  
<table>
  <tr>
    <td id="cabeza_panel_1"> <h5> <strong> Tipo de Usuarios Existentes </strong> </h5> </td>
  </tr>
</table>
</div>

<table id="tabla_tf">
  
  <tr class="header">
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Act </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Des </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> ID </p> </th>
    <th style="width:70%;" id="cabecera_tabla_1"> <p> TIPO USUARIO </p> </th>
  </tr>

  <?php
  
  while ($row = pg_fetch_assoc($res_tabla_tu)){
  ?>
  
  <tr>
    <td> 
    <p> 
      <a href='mantenedores_genericos.php?id_tu=<?php echo $row['id_tipo_usuario']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit() == false){return false;}">
    </p> 
    </td>
    <td>
    <p> 
      <a href='mantenedores_eliminar.php?id_tu=<?php echo $row['id_tipo_usuario']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
    </p> 
    </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['id_tipo_usuario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['tipo_usuario']?> </p> </td>
  </tr>
  <?php
  }
  ?>
</table> 
</div> <!--fin panel panel default -->

<br></br>


<footer>
<h3> <a href="http://www.liceovalentinletelier.cl">www.liceovalentinletelier.cl</a> </h3>
</footer>

</div>

</body>

</html>

<?php
pg_close($conexion);
}
else{

?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión"); window.location="index.php"</script>

<?php
}

?>
<div style="visibility: hidden">Sitio Diseñado por: Ariel Bravo López</div>
