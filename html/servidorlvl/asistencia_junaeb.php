<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);
date_default_timezone_set('America/Santiago');// COMENTAR AL INICIO DE ESTA LINEA PARA CAMBIAR A HORARIO VERANO

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


<script type="text/javascript">
evento(obj){
if(obj.checked)
obj.value='S';
else
obj.value='N';
}
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

<script type="text/javascript">


//<!--inicio validacion formulario-->
$(document).ready(function(){

    jQuery.validator.addMethod("letras", function(value, element) {
      return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Solo letras");

    jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
    }, "Value must not equal arg.");

	$("#rut_nnnnnn").Rut({
    on_error: function(){ alert('El Rut ingresado no es valido'); },
    format_on: 'true',
    format_on: 'change'
  	});

    
//INICIO VALIDAR INGRESO DE RUT
$("#f1").submit(function () {  

if($("#rut").val().length < 1) {  
  alert("Debe Ingresar Rut");  
  return false;  
}

return true;  
});

//INICIO VALIDAR INGRESO DE RUT

});
//<!--FIN VALIDACION FORMULARIO-->


 function myFunction1() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
 }
 }

 function myFunction2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
 }
 }

 function myFunction3() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
 }
 }

 function myFunction4() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
 }
 }

 function myFunction5() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput5");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
 }
 }

 function myFunction6() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput6");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
 }
 }

 function myFunction7() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput7");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
 }
 }


</script>

<script>
//inicio funcion para llenar input con ajax
$(document).ready(function(){
  
    // generamos un evento cada vez que se pulse una tecla
    $("#rut").blur(function(){
    
      // enviamos una petición al servidor mediante AJAX enviando el id
      // introducido por el usuario mediante POST
      $.post("consulta_a.php", {"rut":$("#rut").val()}, function(data){
      
        if(data.dv)
          $("#dv").val(data.dv);
        else
          $("#dv").val("");

        if(data.nombre_completo)
          $("#nombre_completo").val(data.nombre_completo);
        else
          $("#nombre_completo").val("");

        if(data.nombre_curso)
          $("#nombre_curso").val(data.nombre_curso);
        else
          $("#nombre_curso").val("");

        if(data.junaeb) {
          $("#junaeb").val(data.junaeb);
          if(data.junaeb == 'SI') {
            $("#resultado").html("<span style='font-weight:bold;color:green;' id='mensaje'>El estudiante cuenta con beneficio alimentacion escolar</span>");
          } else {
          $("#resultado").html(data);
            $("#resultado").html("<span style='font-weight:bold;color:red;' id='mensaje'>El estudiante no cuenta con beneficio alimentacion escolar</span>");
          }

        } else {
          $("#junaeb").val("");
        }


      },"json");
    });


$('.ir-arriba').click(function(){
    $('body, html').animate({
      scrollTop: '0px'
    }, 300);
  });
 
  $(window).scroll(function(){
    if( $(this).scrollTop() > 0 ){
      $('.ir-arriba').slideDown(100);
    } else {
      $('.ir-arriba').slideUp(100);
    }
});


});

//fin funcion para llenar input con ajax
</script>

<script type="text/javascript">

  $(document).ready(function() {
    $("#Borrar").click(function() {
      $("#mensaje").remove();
    });
  });

</script>

<style>
* {
  box-sizing: border-box;
}

#myInput0 {
    background-image: url('/css/buscar.png'); /* Add a search icon to input */
    background-position: 0px 0px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 1px 1px 1px 1px; /* Add some padding */
    border: 0px solid #ddd; /* Add a grey border */
    margin-bottom: 0px; /* Add some space below the input */
}
#myInput1 {
    background-image: url('/css/buscar.png'); /* Add a search icon to input */
    background-position: 0px 0px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 1px 1px 1px 1px; /* Add some padding */
    border: 0px solid #ddd; /* Add a grey border */
    margin-bottom: 0px; /* Add some space below the input */
}

#myInput2 {
    background-image: url('/css/buscar.png'); /* Add a search icon to input */
    background-position: 0px 0px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 1px 1px 1px 1px; /* Add some padding */
    border: 0px solid #ddd; /* Add a grey border */
    margin-bottom: 0px; /* Add some space below the input */
}

#myInput3 {
    background-image: url('/css/buscar.png'); /* Add a search icon to input */
    background-position: 0px 0px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 1px 1px 1px 1px; /* Add some padding */
    border: 0px solid #ddd; /* Add a grey border */
    margin-bottom: 0px; /* Add some space below the input */
}

#myInput4 {
    background-image: url('/css/buscar.png'); /* Add a search icon to input */
    background-position: 0px 0px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 1px 1px 1px 1px; /* Add some padding */
    border: 0px solid #ddd; /* Add a grey border */
    margin-bottom: 0px; /* Add some space below the input */
}

#myInput5 {
    background-image: url('/css/buscar.png'); /* Add a search icon to input */
    background-position: 0px 0px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 1px 1px 1px 1px; /* Add some padding */
    border: 0px solid #ddd; /* Add a grey border */
    margin-bottom: 0px; /* Add some space below the input */
}

#myInput6 {
    background-image: url('/css/buscar.png'); /* Add a search icon to input */
    background-position: 0px 0px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 1px 1px 1px 1px; /* Add some padding */
    border: 0px solid #ddd; /* Add a grey border */
    margin-bottom: 0px; /* Add some space below the input */
}

#myInput7 {
    background-image: url('/css/buscar.png'); /* Add a search icon to input */
    background-position: 0px 0px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 1px 1px 1px 1px; /* Add some padding */
    border: 0px solid #ddd; /* Add a grey border */
    margin-bottom: 0px; /* Add some space below the input */
}

#myInput8 {
    background-image: url('/css/buscar.png'); /* Add a search icon to input */
    background-position: 0px 0px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 1px 1px 1px 1px; /* Add some padding */
    border: 0px solid #ddd; /* Add a grey border */
    margin-bottom: 0px; /* Add some space below the input */
}

#myInput9 {
    background-image: url('/css/buscar.png'); /* Add a search icon to input */
    background-position: 0px 0px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 1px 1px 1px 1px; /* Add some padding */
    border: 0px solid #ddd; /* Add a grey border */
    margin-bottom: 0px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th{
  text-align: left;
  padding: 1px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;

}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

#myTable tr:nth-child(even) {
  background-color: #bdbdbd;
}
</style>

<style>
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
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
      <a href="mantenedores_genericos.php">Mantenedores Genericos</a>
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


<header>
	<h1>Registro Asistencia Comedor</h1>
</header> 

<section>

<div id="BuscarFuncionario">
<form action="asistencia_junaeb_registrada.php" method="post" role="form" name="f1" id="f1">

  <div class="form-row">

    <div class="form-group col-md-2">
      <label for="rut">Rut </label>
      <input type="text" class="form-control" id="rut" name="rut" placeholder="RUT" value="" required maxlength="9">
    </div>

    <div class="form-group col-md-1">
      <label for="dv">DV</label>
      <input type="text" class="form-control" id="dv" name="dv" placeholder="DV" value="" disabled required>
    </div>

    <div class="form-group col-md-7">
      <label for="rut">Alumno</label>
      <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="NOMBRE COMPLETO" value="" disabled required> <div id="resultado"> </div>
    </div>

    <div class="form-group col-md-1">
      <label for="nombre_curso">Curso</label>
      <input type="text" class="form-control" id="nombre_curso" name="nombre_curso" placeholder="Curso" value="" disabled required>
    </div>  
    
    <!-- SE AGREGA CAMPO PARA BECA JUNAEB -->
    <div class="form-group col-md-1">
      <label for="junaeb">JUNAEB</label>
      <input type="text" class="form-control" id="junaeb" name="junaeb" placeholder="Junaeb" value="" disabled required>
    </div>
    

    <div class="form-row">
    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="grabar"> <b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" id="Borrar"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>    
    </div>
    

</form>
</div>

</section>

<br></br>


<div class="panel panel-default">

<?php

// CONSULTA SQL QUE TIENE QUE SER PARA CONSULTAR ASISTENCIA
$sql_tabla = "select 
asistencia_junaeb.id_asistencia,
alumno.id_alumno,
alumno.rut_alumno,
alumno.dv_rut_alumno,
alumno.apellido_paterno_alumno,
alumno.apellido_materno_alumno,
alumno.nombres_alumno,
alumno.id_curso,
curso.nombre_curso,
asistencia_junaeb.fecha_hora_actual
from alumno,curso,asistencia_junaeb
where alumno.id_curso=curso.id_curso
and alumno.id_alumno=asistencia_junaeb.id_alumno
order by asistencia_junaeb.fecha_hora_actual desc;";

$resultado_tabla = pg_query ($sql_tabla);
$total_registros=pg_num_rows($resultado_tabla);
?>

<div class="panel-heading">
<form action="atraso_justificar.php" method="get">
<table>
  <tr>
    <td id="cabeza_panel_1"> <h1>Asistencia de Estudiantes al comedor <h5> 
      <!-- Consulta para cantidad de estudiantes -->
      <strong> Se encontraron <?php echo $total_registros; ?> registros en total. </strong> </h5> </h1> </td>
  </tr>
</table>
</div>

<div style="overflow-x:auto;"><!-- inicio tabla responsive -->
<table id="myTable">
  
  <tr>
    <th style="width:6%;"> <input type="text" id="myInput1" onkeyup="myFunction1();" placeholder="Buscar"> </th>
    <th style="width:4%;"> <input type="text" id="myInput2" onkeyup="myFunction2();" placeholder="Buscar"> </th>
    <th style="width:15%;"> <input type="text" id="myInput3" onkeyup="myFunction3();" placeholder="Buscar"> </th>
    <th style="width:15%;"> <input type="text" id="myInput4" onkeyup="myFunction4();" placeholder="Buscar"> </th>
    <th style="width:24%;"> <input type="text" id="myInput5" onkeyup="myFunction5();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput6" onkeyup="myFunction6();" placeholder="Buscar"> </th>
    <th style="width:16%;"> <input type="text" id="myInput7" onkeyup="myFunction7();" placeholder="Buscar"> </th>
  </tr>


  <tr class="header">
    <th style="width:6%;" id="cabecera_tabla_1"> <p> RUT </p> </th>
    <th style="width:4%;" id="cabecera_tabla_1"> <p> DV </p> </th>
    <th style="width:15%;" id="cabecera_tabla_1"> <p> APE. PAT. </p> </th>
    <th style="width:15%;" id="cabecera_tabla_1"> <p> APE. MAT. </p> </th>
    <th style="width:24%;" id="cabecera_tabla_1"> <p> NOMBRES </p> </th>
    <th style="width:4%;" id="cabecera_tabla_1"> <p> CURSO </p> </th>
    <th style="width:17%;" id="cabecera_tabla_1"> <p> FECHA_HORA </p> </th>
  </tr>

  <?php
  
  // REVISAR TABLA DE DATOS EXTRAIDA DESDE SQL

  while ($row = pg_fetch_assoc($resultado_tabla)){
    $fecha_atraso = date($row['fecha_hora_actual']);
  ?>
  <tr>
    <td id="tabla_td_center"> <p> <?php echo $row ['rut_alumno']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['dv_rut_alumno']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_paterno_alumno']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_materno_alumno']?> </p> </td>
    <td> <p> <?php echo $row ['nombres_alumno']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['nombre_curso']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $fecha_atraso; ?> </p> </td>
  </tr>
  <?php
  }
  ?>

</table> 
</form>

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