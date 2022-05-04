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

<div id="informes"><!--inicio informes-->

<div class="jumbotron"><!--inicio jumbotron-->
    <?php
    $estado1 = mysql_connect ('localhost', 'Monkinhor', 'Knd2$THipL$$xSiak');
    mysql_set_charset('utf8');

    if (!$estado1){
    echo "no hay coneccion existente";
    exit;
    }

    $estado2 = mysql_select_db ('agrosol');

    if (!$estado2){
    echo "no hay acceso a la base de datos";
    exit;
    }

    $sql = "select * from usuario,tipo_usuario
    where usuario.id_tipo_usuario=tipo_usuario.id_tipo_usuario
    and usuario.vigente = 'S'
    order by usuario.nombre_usuario desc";

    $resultado = mysql_query ($sql);
    ?>

  <div class="container">
    <p>Registro de Usuarios</p>
  
  <table border="1" align="left">
  <tr>
    <td width="50" height="35" id="titulo" align="center"> <b>Edit</b> </td>
    <td width="50" height="35" id="titulo" align="center"> <b>ELim</b> </td>
    <td width="100" height="35" id="titulo" align="center"> <b>Nombre Usuario</b> </td>
    <td width="100" height="35" id="titulo" align="center"> <b>Contraseña</b> </td>
    <td width="100" height="35" id="titulo"> <b>Tipo Usuario</b> </td>
  </tr>
  <?php
  while ($row = mysql_fetch_assoc($resultado)){
  mysql_set_charset('utf8');
  //$_SESSION['id_usuario']=$row['id_usuario']
  ?>
  <tr>
    <td width="30" height="20" id="titulo2" align="center"> <a href='usuario_procesar.php?id=<?php echo $row['id_usuario']?>'> <img src="imagenes/editar.png" width="20" height="20"> </td>
    <td width="30" height="20" id="titulo2" align="center"> <a href='usuario_eliminar.php?id=<?php echo $row['id_usuario']?>'> <img src="imagenes/eliminar.png" width="20" height="20" onclick="if(confirmDel() == false){return false;}"> </td>
    <td width="100" height="20" id="titulo2"> <?php echo $row ['nombre_usuario']?> </td>
    <td width="100" height="20" id="titulo2"> <?php echo $row ['password_usuario']?>  </td>
    <td width="100" height="20" id="titulo2"> <?php echo $row ['tipo_usuario']?> </td>    
  </tr>
  <?php
  }
  mysql_close();
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
mysql_set_charset('utf8');
?>
<meta charset="utf-8">
<script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión"); window.location="index.php"</script>
<?php
}
?>