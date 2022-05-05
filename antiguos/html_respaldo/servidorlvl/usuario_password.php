<?php
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

$(function(){

        $('#f1').validate({
            rules :{
                rut : {
                    required : true,
                    maxlength : 10
                },

		dv : {
                    required : true,
                    maxlength : 1
                },

		nombres : {
                    required : true,
                    letras : true
                },

                apellido_paterno : {
                    required : true,
                    letras : true
                },

		apellido_materno : {
                    required : true,
                    letras : true
                },

		fecha_form : {
                    required : true
                },

                direccion : {
                    required : true,
                    minlength : 5,
                    maxlength : 100
                },

                ciudad : {
                    valueNotEquals : "default"
                },
                
                telefono : {
                    required : true,
                    minlength : 6,
                    maxlength : 14
                },

                email : {
                    required : true,
                    email : true
                }
                                
            },
            messages : {
                rut : {
                    required : "Debe ingresar un Rut",
                    maxlength : "Maximo de 12 caracteres"
                },
                apellidos : {
                    required : "Debe ingresar un Apellido",
                    letras : "No se admiten números",
                    minlength : "Minimo 5 caracteres",
                    maxlength : "Maximo de 50 caracteres"
                },
                nombres : {
                    required : "Debe ingresar un Nombre",
                    letras : "No se admiten números",
                    minlength : "Minimo 5 caracteres",
                    maxlength : "Maximo de 50 caracteres"
                },
                direccion : {
                    required : "Debe ingresar una Dirección",
                    minlength : "Minimo 5 caracteres",
                    maxlength : "Maximo de 100 caracteres"
                },
                ciudad : {
                    valueNotEquals : "Debe Seleccionar Una Opción"
                },
                telefono : {
                    required : "Debe Ingresar Un Teléfono",
                    minlength : "Minimo 6 caracteres",
                    maxlength : "Maximo de 14 caracteres"
                },
                email : {
                    required : "Debe Ingresar Un Email",
                    email : "Debe Ingresar un Email Válido"
                }
            }
        });    
  
});

});
//<!--fin validacion formulario-->

</script>

</head>

<body>

<?php

include ("conexion.php");
$conexion=Conectarse();

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

<div id="registro_funcionario">
            
            <br>
                <table border="0" align="center">
                <tr>
                <td align="center" width="645" height="20"><h2>Registro Funcionarios LVL</td>
                </tr>
                </table>
             <br>

                <div class="container">
                    <form action="funcionario_registrado.php" method="post" class="form-horizontal" role="form" name="f1" id="f1">
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rut">Rut:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="rut" name="rut" placeholder="Ingrese Rut" style="text-transform:uppercase;">
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="dv">Dv:</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" id="dv" name="dv" placeholder="Dv" style="text-transform:uppercase;">
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="apellido_paterno">Apellido Pat:</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese Apellido Paterno" style="text-transform:uppercase;">
                        </div>
                        </div>

                       <div class="form-group">
                            <label class="control-label col-sm-2" for="apellido_materno">Apellido Mat:</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese Apellido Materno" style="text-transform:uppercase;">
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombres">Nombres:</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese Nombres" style="text-transform:uppercase;">
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sexo">Sexo:</label>
                            <div class="form-group">                        
                            <div class="col-sm-2">
                                <select class="form-control" name="sexo" id="sexo" style="text-transform:uppercase;">
                                <option value="">SELECCIONE...</option>
                                    <?php
                                    $res_sexo = pg_query($sql_sexo);       
                                    while ($row = pg_fetch_assoc($res_sexo)){   
                                        echo "<option value=\"".$row['id_sexo']."\">";
                                        echo $row['codigo_sexo']."</option>";
                                    }
				    ?>
                                </select>
                            </div>
                   	</div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fecha_nac">Fecha Nac.:</label>
                        <div class="form-group">
                            
                            <div class="col-sm-2" >
                                <div class='input-group date' id="datepicker">
                                    <input type='text' class="form-control" id="fecha_form" name="fecha" placeholder="dd-mm-aaaa" style="text-transform:uppercase;">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                            </div>
                    	</div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="horas_contrato">Horas Contrato:</label>
                            <div class="col-sm-2">

                            <input type="text" class="form-control" id="horas_contrato" name="horas_contrato" placeholder="Horas Contrato" style="text-transform:uppercase;">
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="grupo_horario">Grupo Horario:</label>
                            <div class="form-group">                        
                            <div class="col-sm-3">
                                <select class="form-control" name="grupo_horario" id="grupo_horario" style="text-transform:uppercase;">
                                <option value="">SELECCIONE...</option>
                                    <?php
                                    $res_grupo_horario = pg_query($sql_grupo_horario);       
                                    while ($row = pg_fetch_assoc($res_grupo_horario)){   
                                        echo "<option value=\"".$row['id_grupo_horario']."\">";
                                        echo $row['nombre_grupo_horario']."</option>";
                                    }
				    ?>
                                </select>
                            </div>
                   	</div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tipo_funcionario">Tipo Funcionario:</label>
                            <div class="form-group">                        
                            <div class="col-sm-3">
                                <select class="form-control" name="tipo_funcionario" id="tipo_funcionario" style="text-transform:uppercase;">
                                <option value="">SELECCIONE...</option>
                                    <?php
                                    $res_tipo_funcionario = pg_query($sql_tipo_funcionario);       
                                    while ($row = pg_fetch_assoc($res_tipo_funcionario)){   
                                        echo "<option value=\"".$row['id_tipo_funcionario']."\">";
                                        echo $row['tipo_funcionario']."</option>";
                                    }
				    ?>
                                </select>
                            </div>
                   	</div>
                        </div>

			<div class="form-group">
                            <label class="control-label col-sm-2" for="detalle_tipo_funcionario">Función:</label>
                            <div class="form-group">                        
                            <div class="col-sm-3">
                                <select class="form-control" name="detalle_tipo_funcionario" id="detalle_tipo_funcionario" style="text-transform:uppercase;">
                                <option value="">SELECCIONE...</option>
                                    <?php
                                    $res_detalle_tipo_funcionario = pg_query($sql_detalle_tipo_funcionario);       
                                    while ($row = pg_fetch_assoc($res_detalle_tipo_funcionario)){   
                                        echo "<option value=\"".$row['id_detalle_tipo_funcionario']."\">";
                                        echo $row['detalle_tipo_funcionario']."</option>";
                                    }
				    ?>
                                </select>
                            </div>
                   	</div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="telefono">Teléfono:</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Numero de Teléfono" style="text-transform:uppercase;">
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">E-Mail:</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese su Correo Electrónico" style="text-transform:uppercase;">
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="estado_vigencia">Estado Vigencia:</label>
                            <div class="form-group">                        
                            <div class="col-sm-2">
                                <select class="form-control" name="estado_vigencia" id="estado_vigencia" style="text-transform:uppercase;">
                                <option value="">SELECCIONE...</option>
                                    <?php
                                    $res_estado_vigencia = pg_query($sql_estado_vigencia);       
                                    while ($row = pg_fetch_assoc($res_estado_vigencia)){   
                                        echo "<option value=\"".$row['id_estado_vigencia']."\">";
                                        echo $row['descripcion_estado_vigencia']."</option>";
                                    }
				    ?>
                                </select>
                            </div>
                   	</div>
                        </div>

                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-3">
                                <button type="submit" class="btn btn-default" id="grabar"><b>Guardar <span class="glyphicon glyphicon-floppy-disk"</button>
                                <button type="Reset" class="btn btn-default" id="Borrar"><b>Limpiar <span class="glyphicon glyphicon-remove"></button>
                            </div>
                        </div>

                    </form>
                </div>
</div>  
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

