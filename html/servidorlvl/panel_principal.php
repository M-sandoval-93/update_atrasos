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

<script type="text/javascript">
</script>

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

<style>


</style>

 
</head>

<body>



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
      <a href="mantenedores_genericos.php">Mantenedores Genericos </a>
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




  <!-- =================== MODULO DE JUNAEB =================== -->
  <div class="dropdown">
    <button class="dropbtn"> <img src="imagenes/junaeb.png" width="35" height="20"> Junaeb
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="asistencia_junaeb.php">Asistencia Colación</a>
    </div>
  </div>
  <!-- =================== MODULO DE JUNAEB =================== -->



  <!-- =================== MODULO DE SUSPENDIDOS =================== -->
  <div class="dropdown">
    <button class="dropbtn"> <img src="imagenes/prohibision.png" width="35" height="20"> Suspenciones
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="suspencion_alumno.php">Suspender estudiante</a>
    </div>
  </div>

  <!-- =================== MODULO DE SUSPENDIDOS =================== -->




  
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

<header>
<!-- agregar titulos/texto/información adicional -->   
</header> 

<!--
<section>
agregar titulos/texto/información adicional
</section> -->

<div class="panel panel-default" id="panel_principal2">
 
<div class="panel-heading"> <h1>Bienvenido</h1> </div>
<br>
<div style="overflow-x:auto;"><!-- inicio tabla responsive -->
<table border="0" align="center">
    <tr>
      <td width="210" height="160" align="center"> <a href='funcionario_registro.php'> <div class="img"> <img src="imagenes/agregar_funcionario.png" width="180" height="180" class="responsive"> </div> </td>
      <td width="100"></td> 
      <td width="210" height="160" align="center"> <a href='permiso_registro.php'> <div class="img"> <img src="imagenes/permiso.png" width="180" height="180" class="responsive"> </div> </td>
      <td width="100"></td>
      <td width="210" height="160" align="center"> <a href='alumno_atraso.php'> <div class="img"> <img src="imagenes/atraso.png" width="180" height="180" class="responsive"> </div> </td>
    </tr>
    <tr>
      <td align="center"> <a href='funcionario_registro.php'> <b> Funcionarios </b> </td>
      <td width="100"></td>
      <td align="center"> <a href='permiso_registro.php '> <b> Permisos </b> </td>
      <td width="100"></td>
      <td align="center"> <a href='alumno_atraso.php'> <b> Atrasos </b> </td>
    </tr>

    <tr>
      <td height="28"> </td>
      <td width="100"></td>
      <td height="28"> </td>
      <td width="100"></td>
      <td height="28"> </td>
    </tr>

    <tr>
      <td width="210" height="160" align="center"> <a href='#'> <div class="img"> <img src="imagenes/registro.png" width="180" height="180" class="responsive"> </div> </td>
      <td width="100"></td>
      <td width="210" height="160" align="center"> <a href='#'> <div class="img"> <img src="imagenes/registro.png" width="180" height="180" class="responsive"> </div> </td>
      <td width="100"></td>
      <td width="210" height="160" align="center"> <a href='#'> <div class="img"> <img src="imagenes/registro.png" width="180" height="180" class="responsive"> </div> </td>
    </tr>
    <tr>
      <td align="center"> <a href='#'> <b> Otros Registros </b> </td>
      <td width="100"></td>
      <td align="center"> <a href='#'> <b> Otros Registros </b> </td>
      <td width="100"></td>
      <td align="center"> <a href='#'> <b> Otros Registros </b> </td>
    </tr>

  </table> 

</div><!-- fin tabla responsive -->
  
</div>


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
