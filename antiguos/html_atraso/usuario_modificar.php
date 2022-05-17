<?php
session_start();
error_reporting (0);
if($_SESSION['Usuario']){
?>
<html>
<head>
<title>Agrosol</title>
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

$(function(){

        $('#f1').validate({
            rules :{
                rut : {
                    required : true,
                    maxlength : 12
                },
                nombres : {
                    required : true,
                    minlength : 5,
                    maxlength : 50
                },
                apellidos : {
                    required : true,
                    minlength : 5,
                    maxlength : 50
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
                nombres : {
                    required : "Debe ingresar un Nombre",
                    minlength : "Minimo 5 caracteres",
                    maxlength : "Maximo de 50 caracteres"
                },
                apellidos : {
                    required : "Debe ingresar un Apellido",
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
<!--fin validacion formulario-->

</script>

</head>

<body>
<?php


$sql_tipo_usuario = "select * from tipo_usuario order by tipo_usuario asc";
?>

<div id="principal"><!--inicio principal-->

<div id="banner"><!--inicio banner-->
<ul class="nav nav-tabs">
    <li><a href="panel_principal.php"> <img src="imagenes/home.png" width="35" height="20"> <b>Panel</b>  </a></li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="imagenes/almacen.png" width="35" height="20"> <b>Bodega</b> <span class="caret"></span> </a>
    <ul class="dropdown-menu">
      <li><a href="bodega_registro.php">Añadir Nuevo Registro</a></li>
      <li><a href="bodega_buscar.php">Modificar/Eliminar Registro Existente</a></li>
      <li><a href="producto_stock.php">Consulta Existencia</a></li>
      <li><a href="sector_registro.php">Añadir Nuevo Sector</a></li>
      <li><a href="sector_buscar.php">Modificar/Eliminar Sector Existente</a></li>
      <li><a href="vehiculo_registro.php">Añadir Nuevo Tipo Vehículo</a></li>
      <li><a href="vehiculo_buscar.php">Modificar/Eliminar Tipo Veh. Existente</a></li>
    </ul>
    </li>
    
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="imagenes/procesar.png" width="35" height="20"> <b>Procesos</b> <span class="caret"></span> </a>
    <ul class="dropdown-menu">
      <li><a href="proceso_registro.php">Añadir Nuevo Registro</a></li>
      <li><a href="proceso_buscar.php">Modificar/Eliminar Registro Existente</a></li>
    </ul>
    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="imagenes/proveedores.png" width="35" height="20"> <b>Proveedores</b> <span class="caret"></span> </a>
    <ul class="dropdown-menu">
      <li><a href="proveedor_registro.php">Añadir Nuevo Registro</a></li>
      <li><a href="proveedor_buscar.php">Modificar/Eliminar Registro Existente</a></li>
    </ul>
    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="imagenes/camion.png" width="35" height="20"> <b>Despachos</b> <span class="caret"></span> </a>
    <ul class="dropdown-menu">
      <li><a href="despacho_registro.php">Añadir Nuevo Registro</a></li>
      <li><a href="despacho_buscar.php">Modificar/Eliminar Registro Existente</a></li>
      <li><a href="vehiculo_registro.php">Añadir Nuevo Tipo Vehículo</a></li>
      <li><a href="vehiculo_buscar.php">Modificar/Eliminar Tipo Veh. Existente</a></li>
    </ul>
    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="imagenes/fruta.png" width="35" height="20"> <b>Productos</b> <span class="caret"></span> </a>
    <ul class="dropdown-menu">
      <li><a href="producto_registro.php">Añadir Nuevo Producto</a></li>
      <li><a href="producto_buscar.php">Modificar/Eliminar Producto Existente</a></li>
      <li><a href="envase_registro.php">Añadir Nuevo Tipo Envase</a></li>
      <li><a href="envase_buscar.php">Modificar/Eliminar Envase Existente</a></li>
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

<div id="registros"><!--inicio registro-->
    <div id="">
            
                <table border="0">
                <tr>
                <td id="titulos_descripcion" align="center" width="1000" height="20"><h2>Modificar Registro de Usuario</h2></td>
                </tr>
                </table>
             <br>

                <div>
                    <form action="usuario_modificado.php" method="post" class="form-horizontal" role="form" name="f1" id="f1" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="usuario"><p>USUARIO:</p></label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="USUARIO" value="<?php echo $_SESSION['usuario']?>">
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="password"><p>CONTRASEÑA:</p></label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" id="password" name="password" placeholder="CONTRASEÑA" value="<?php echo $_SESSION['password']?>">
                        </div>
                        </div>
                        
                        <div class="form-group">                        
                        <label class="control-label col-sm-3" for="tipo_usuario"><p>TIPO USUARIO:</p></label>
                            <div class="col-sm-4">
                                <select class="form-control" name="tipo_usuario" id="tipo_usuario">
                                <option value="<?php echo $_SESSION['id_tipo_usuario']?>"> <?php echo $_SESSION['tipo_usuario']?> </option>
                                    <?php
                                    $res_tipo_usuario = mysql_query($sql_tipo_usuario);       
                                    while ($row = mysql_fetch_assoc($res_tipo_usuario)){   
                                        echo "<option value=\"".$row['id_tipo_usuario']."\">";
                                        echo $row['tipo_usuario']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">        
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-ttc" id="grabar"><b>Grabar <span class="glyphicon glyphicon-floppy-disk"> </b></button>
                                <button type="Reset" class="btn btn-ttc" id="Borrar"><b>Limpiar <span class="glyphicon glyphicon-remove"> </b></button>
                            </div>
                        </div>

                    </form>
                </div>
    </div>
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
//mysql_set_charset('utf8');
?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión"); window.location="index.php"</script>
<?php
}
?>
