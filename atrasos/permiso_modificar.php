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

<!--inicio validacion formulario-->
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

$("#f1").submit(function () {  
if($("#funcionario").val().length < 1) {  
    alert("Debe Seleccionar Funcionario");  
    return false;  
}
if($("#tipo_permiso").val().length < 1) {  
    alert("Debe Seleccionar Tipo Permiso");  
    return false;  
}
if($("#fecha_form").val().length < 1) {  
    alert("Debe Ingresar Una Fecha");  
    return false;  
}
if($("#dia_form").val().length < 1) {  
    alert("Debe Ingresar Día");  
    return false;  
}
if($("#hora_salida").val().length < 1) {  
    alert("Debe Ingresar Hora Salida");  
    return false;  
}
if($("#hora_llegada").val().length < 1) {  
    alert("Debe Ingresar Hora Llegada");  
    return false;  
}
if($("#observaciones").val().length < 1) {  
    alert("Debe Ingresar Observaciones");  
    return false;  
}
return true;  
});

});
<!--fin validacion formulario-->

function valida_hora(valor)
{
    //que no existan elementos sin escribir
    if(valor.indexOf(":") != -1)
    {
 var hora = valor.split(":")[0];
 if(parseInt(hora) > 23 )
 {
     $("#hora").val("");
 }//end if
    }//end if
}//end function

$('#setTimeExample').timepicker();
$('#setTimeButton').on('click', function (){
    $('#setTimeExample').timepicker('setTime', new Date());
});

</script>

</head>

<body>

<?php

$sql_funcionario = "select id_funcionario,apellido_paterno_funcionario,apellido_materno_funcionario,nombres_funcionario from funcionario order by apellido_paterno_funcionario asc";
$sql_tipo_permiso = "select * from tipo_permiso order by tipo_permiso asc";

?>

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

<div id="registro_permisos"><!--inicio registro-->
    
            
                <table border="0">
                <tr>
                <td id="titulos_descripcion" align="center" width="1280" height="20"><h2>Modificar Registro Permiso Funcionario LVL</h2></td>
                </tr>
                </table>
                <br>

                <form action="permiso_modificado.php" method="post" role="form" name="f1" id="f1" enctype="multipart/form-data">
                
        <br>
        <table border="3">
                <tr>
                <td width="100" height="50"> <p>FUNCIONARIO:</p> </td>
                <td width="450" height="50">
                   <div class="form-group">                        
                            <div class="col-sm-12">
                                <select class="form-control" name="funcionario" id="funcionario" style="text-transform:uppercase;">
                                <option value="<?php echo $_SESSION['id_funcionario']?>"> <?php echo $_SESSION['apellido_paterno_funcionario']." ".$_SESSION['apellido_materno_funcionario']." ".$_SESSION['nombres_funcionario']?> </option>
                                    <?php
                                    $res_funcionario = pg_query($sql_funcionario);       
                                    while ($row = pg_fetch_assoc($res_funcionario)){   
                                        echo "<option value=\"".$row['id_funcionario']."\">";
                                        echo $row['apellido_paterno_funcionario']." ".$row['apellido_materno_funcionario']." ".$row['nombres_funcionario']."</option>";
                                    }
                    ?>
                                </select>
                            </div>
                   </div> 
                
                </td>
                </tr>
                </table>
        <br>

        <table border="3">
                <tr>
                <td width="100" height="50"> <p>TIPO PERMISO:</p> </td>
                <td width="450" height="50">

                   <div class="form-group">                        
                            <div class="col-sm-12">
                                <select class="form-control" name="tipo_permiso" id="tipo_permiso" style="text-transform:uppercase;">
                                <option value="<?php echo $_SESSION['id_tipo_permiso']?>"> <?php echo $_SESSION['tipo_permiso']?> </option>
                                    <?php
                                    $res_tipo_permiso = pg_query($sql_tipo_permiso);       
                                    while ($row = pg_fetch_assoc($res_tipo_permiso)){   
                                        echo "<option value=\"".$row['id_tipo_permiso']."\">";
                                        echo $row['tipo_permiso']."</option>";
                                    }
                    ?>
                                </select>
                            </div>
                   </div> 
                
                </td>
                </tr>
                </table>
        <br>


                <table border="3">
                <tr>
                <td width="100" height="50"> <p>Fecha:</p> </td>
                <td width="450" height="50">
                    <div class="form-group">
                            
                            <div class="col-sm-7" >
                                <div class='input-group date' id="datepicker">
                                    <input type='text' class="form-control" id="fecha_form" name="fecha" placeholder="Seleccione Una Fecha" style="text-transform:uppercase;" value="<?php echo $_SESSION['fecha_permiso']?>">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                            </div>
                    </div>
                </td>
                <td width="100" height="50"> <p>Día:</p> </td>

                <td width="450" height="50">
                     <div class="form-group">
                            
                            <div class="col-sm-5">
                            <input type="text" class="form-control" id="dia_form" name="dia_form" placeholder="Ingrese N° Día" style="text-transform:uppercase;" value="<?php echo $_SESSION['dia_permiso']?>">
                        </div>
                        </div>  
                </td>
                
                </tr>

        <tr>
                <td width="100" height="50"> <p>Hora Salida:</p> </td>
                <td width="450" height="50">

                    <div class="form-group">
                    
                        <div class="col-sm-5">
                            <div class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true">
                                <input type="text" class="form-control" id="hora_salida" name="hora_salida" placeholder="HORA SALIDA" value="<?php echo $_SESSION['hora_salida']?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        <script type="text/javascript">
                        $('.clockpicker').clockpicker();
                        </script>
                        </div>
                    </div>
                </td>
                <td width="100" height="50"> <p>Hora Llegada:</p> </td>
                <td width="450" height="50">

                    <div class="form-group">
                    
                        <div class="col-sm-5">
                            <div class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true">
                                <input type="text" class="form-control" id="hora_llegada" name="hora_llegada" placeholder="HORA LLEGADA" value="<?php echo $_SESSION['hora_llegada']?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        <script type="text/javascript">
                        $('.clockpicker').clockpicker();
                        </script>
                        </div>
                    </div>
                </td>
                
                </tr>



                

                </tr>
                </table>

                <br>

                <table border="3">
                <tr>
                <td width="100" height="50"> <p>Observ. Permiso:</p> </td>
                <td width="1000" height="50">
                   <div class="form-group">
                            
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="INGRESE OBSERVACIONES" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $_SESSION['observaciones_permiso']?>">
                        </div>
                        </div>
                </td>
                

                </table>

                <br>

                

                <br>

                <div class="form-group">        
                            <div class="col-sm-10 col-sm-3">
                                <button type="submit" class="btn btn-ttc" id="grabar"><b>Guardar <span class="glyphicon glyphicon-floppy-disk"> </b></button>
                                <button type="Reset" class="btn btn-ttc" id="Borrar"><b>Limpiar <span class="glyphicon glyphicon-remove"> </b></button>
                            </div>
                </div>

                <br>
                <br>

                        

                </form>
                
    
</div><!--fin registro-->

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
}
pg_close($conexion);
?>

