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
 showMonthAfterYear: false,
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


//Al escribr dentro del input con id="service"
    $('#rut').keypress(function(){
        //Obtenemos el value del input
        var rut = $(this).val();        
        var dataString = 'rut='+rut;

        //Le pasamos el valor del input al ajax
        $.ajax({
            type: "POST",
            url: "autocompletar.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').live('click', function(){
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#rut').val($('#'+id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                });              
            }
        });
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
if($("#dia_semana").val().length < 1) {  
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
//<!--fin validacion formulario-->

function confirmDel(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Realmente desea eliminar el Registro?"))
  return true; //con esto se ejecuta el href de link
else
  return false ;
}

function confirmEdit(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Desea Modificar el Registro Seleccionado?"))
  return true; //con esto se ejecuta el href de link
else
  return false ;
}


// INICIO VALIDAR HORA
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
//FIN VALIDAR HORA

function myFunction0() {//FILTRO BUSQUEDA POR RUT RAPIDA EN TABLA RESUMEN
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput0");
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
 }//FIN FUNCION PARA BUSCAR RUT

 function myFunction1() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput1");
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
 }//FIN FUNCION

 function myFunction2() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
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
 }//FIN FUNCION

 function myFunction3() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput3");
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
 }//FIN FUNCION

 function myFunction4() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput4");
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
 }//FIN FUNCION

 function myFunction5() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput5");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
  }
 }//FIN FUNCION

 function myFunction6() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput6");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[8];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
  }
 }//FIN FUNCION

 function myFunction7() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput7");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[9];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
  }
 }//FIN FUNCION

 function myFunction8() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput8");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[10];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
  }
 }//FIN FUNCION

 function myFunction9() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput9");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[11];

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else {
        tr[i].style.display = "none";
      }
    }       
  }
 }//FIN FUNCION

</script>

<style>
* {
  box-sizing: border-box;
}

#myInput-2 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput-1 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput0 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput1 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput2 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput3 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput4 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput5 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput6 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput7 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput8 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput9 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th {
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

</head>

<body onload="tablas();">

<?php
$sql_funcionario = "select
funcionario.id_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
funcionario.nombres_funcionario,
contrato.id_estado_vigencia 
from funcionario,contrato
where funcionario.id_funcionario=contrato.id_funcionario
and contrato.id_estado_vigencia = 1 
order by apellido_paterno_funcionario asc";

$sql_tipo_permiso = "select * from tipo_permiso order by tipo_permiso asc";
?>

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
	<h1>Registro Permisos Funcionarios</h1>
</header> 

<section>
<?php

$id_perm_tab = $_GET['id_perm_tab'];
$_SESSION['id_perm_tab'] = $id_perm_tab;

$sql_editar_permiso = "select
permiso.id_permiso,
permiso.fecha_permiso,
permiso.dia_permiso,
permiso.hora_salida,
permiso.hora_llegada,
permiso.observaciones_permiso,
funcionario.id_funcionario,
funcionario.nombres_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
usuario.nombre_usuario,
tipo_permiso.id_tipo_permiso,
tipo_permiso.tipo_permiso
from funcionario,permiso,tipo_permiso,usuario 
where permiso.id_funcionario=funcionario.id_funcionario
and permiso.id_tipo_permiso=tipo_permiso.id_tipo_permiso
and permiso.id_usuario=usuario.id_usuario
and permiso.id_permiso = ".$id_perm_tab."";

$res_editar_permiso = pg_query ($sql_editar_permiso);

if ($row = pg_fetch_assoc($res_editar_permiso)){
$fecha_a=$row['fecha_permiso'];
$fecha_b=date("d-m-Y",strtotime($fecha_a));

$hora_salida=substr($row ['hora_salida'], 0, -3);
$hora_llegada=substr($row ['hora_llegada'], 0, -3);

$id_funcionario=$row['id_funcionario'];
$fecha_permiso=$row['fecha_permiso'];
$dia_permiso=$row['dia_permiso'];
$apellido_paterno=$row['apellido_paterno_funcionario'];
$apellido_materno=$row['apellido_materno_funcionario'];
$nombres=$row['nombres_funcionario'];
$id_tipo_permiso=$row['id_tipo_permiso'];
$tipo_permiso=$row['tipo_permiso'];
$observaciones=$row['observaciones_permiso'];

}

?>

<form action="permiso_registrado.php" method="post" role="form" name="f1" id="f1">
  <div class="form-row">

    <div class="form-group col-md-6">
    <label for="sexo">Funcionario</label>
    <select class="form-control" name="funcionario" id="funcionario" style="text-transform:uppercase;">
    <option value="<?php echo $id_funcionario?>"> <?php echo $apellido_paterno." ".$apellido_materno." ".$nombres?> </option>
    <?php
    $res_funcionario = pg_query($sql_funcionario);       
    while ($row = pg_fetch_assoc($res_funcionario)){   
      echo "<option value=\"".$row['id_funcionario']."\">";
      echo $row['apellido_paterno_funcionario']." ".$row['apellido_materno_funcionario']." ".$row['nombres_funcionario']."</option>";
      }
    ?>
    </select>
    </div>

    <div class="form-group col-md-3">
    <label for="sexo">Tipo Permiso</label>
    <select class="form-control" name="tipo_permiso" id="tipo_permiso" style="text-transform:uppercase;">
    <option value="<?php echo $id_tipo_permiso?>"> <?php echo $tipo_permiso?> </option>
    <?php
    $res_tipo_permiso = pg_query($sql_tipo_permiso);       
    while ($row = pg_fetch_assoc($res_tipo_permiso)){   
        echo "<option value=\"".$row['id_tipo_permiso']."\">";
        echo $row['tipo_permiso']."</option>";
    }
    ?>
    </select>
    </div>

    

  <div class="form-row">   
    
    <div class="form-group col-md-2">
    <label for="fecha_nacimiento">Fecha Permiso</label>
    <div class='input-group date' id="datepicker">
	  <input type='text' class="form-control" id="fecha_form" name="fecha_permiso" placeholder="DD-MM-AAAA" style="text-transform:uppercase;" value="<?php echo $fecha_b?>" maxlength="10">
	  <span class="input-group-addon">
	  <span class="glyphicon glyphicon-calendar"></span>
	  </span>
	</div>
    </div>

    <div class="form-group col-md-1">
      <label for="dia_permiso">Día Sem.</label>
      <input type="text" class="form-control" id="dia_semana" name="dia_semana" placeholder="Día" value="<?php echo $dia_permiso?>" maxlength="1">
    </div>
    
  </div>

  <div class="form-row">

    <div class="form-group col-md-2">
      <label for="horas_contrato">Inicio Permiso</label>
      <div class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true">
        <input type="text" class="form-control" id="hora_salida" name="hora_salida" placeholder="HH:MM" value="<?php echo $hora_salida?>" maxlength="5">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
          </span>
        </div>
      <script type="text/javascript">
      $('.clockpicker').clockpicker();
      </script>
    </div>

    <div class="form-group col-md-2">
      <label for="horas_contrato">Fin Permiso</label>
        <div class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true">
        <input type="text" class="form-control" id="hora_llegada" name="hora_llegada" placeholder="HH:MM" value="<?php echo $hora_llegada?>" maxlength="5">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
          </span>
        </div>
      <script type="text/javascript">
      $('.clockpicker').clockpicker();
      </script>
    </div>

    <div class="form-group col-md-8">
      <label for="horas_contrato">Observaciones</label>
      <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="OBSERVACIONES" value="<?php echo $observaciones?>">
    </div>


    <div class="form-row">   
    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="grabar"> <b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" id="Borrar" onclick="location.href = 'permiso_registro.php'; return false"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>
    </div>

</form>

</section>

<br></br>


<div class="panel panel-default">

<div class="panel-heading"> 
<table>
  <tr>
    <td id="cabeza_panel_1"> <h1>Histórico de Permisos General</h1> </td>
    <td id="cabeza_panel_2"> <a class="btn btn-info" href="permiso_registro_xls.php" value="Exportar Excel"> Exportar <img src="imagenes/logoexcel.png" width="20" height="20"> </td>
  </tr>
</table>

</div>

<?php
$sql_tabla = "select
permiso.id_permiso,
permiso.fecha_permiso,
permiso.dia_permiso,
permiso.hora_salida,
permiso.hora_llegada,
permiso.observaciones_permiso,
funcionario.id_funcionario,
funcionario.nombres_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
usuario.nombre_usuario,
tipo_permiso.id_tipo_permiso,
tipo_permiso.tipo_permiso
from funcionario,permiso,tipo_permiso,usuario 
where permiso.id_funcionario=funcionario.id_funcionario
and permiso.id_tipo_permiso=tipo_permiso.id_tipo_permiso
and permiso.id_usuario=usuario.id_usuario
order by permiso.fecha_permiso desc";

$resultado_tabla = pg_query ($sql_tabla);

?>

<div style="overflow-x:auto;"><!-- inicio tabla responsive -->
<table id="myTable">

  <tr>
    <th style="width:3%;"> </th>
    <th style="width:3%;"> </th>
    <th style="width:4%;"> <input type="text" id="myInput0" onkeyup="myFunction0();" placeholder="Buscar"> </th>
    <th style="width:3%;"> <input type="text" id="myInput1" onkeyup="myFunction1();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput2" onkeyup="myFunction2();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput3" onkeyup="myFunction3();" placeholder="Buscar"> </th>
    <th style="width:17%;"> <input type="text" id="myInput4" onkeyup="myFunction4();" placeholder="Buscar"> </th>
    <th style="width:8%;"> <input type="text" id="myInput5" onkeyup="myFunction5();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput6" onkeyup="myFunction6();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput7" onkeyup="myFunction7();" placeholder="Buscar"> </th>
    <th style="width:35%;"> <input type="text" id="myInput8" onkeyup="myFunction8();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput9" onkeyup="myFunction9();" placeholder="Buscar"> </th>
  </tr>


  <tr class="header">
    <th style="width:3%;" id="cabecera_tabla_1"> <p> Edit </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> Elim </p> </th>
    <th style="width:4%;" id="cabecera_tabla_1"> <p> Fecha </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> Día S. </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Pat. </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Mat. </p> </th>
    <th style="width:17%;" id="cabecera_tabla_1"> <p> Nombres </p> </th>
    <th style="width:8%;" id="cabecera_tabla_1"> <p> Tipo Permiso </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> Ini Perm. </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> Fin Perm. </p> </th>
    <th style="width:35%;" id="cabecera_tabla_1"> <p> Observaciones </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> Usuario </p> </th>
  </tr>

  <?php
  while ($row = pg_fetch_assoc($resultado_tabla)){
  $fecha=$row['fecha_permiso'];
  $fecha2=date("d-m-Y",strtotime($fecha));
  $hora_salida=substr($row ['hora_salida'], 0, -3);
  $hora_llegada=substr($row ['hora_llegada'], 0, -3);
  ?>
  
  <tr>
    <td align="center"> 
    <p> 
      <a href='permiso_registro.php?id_perm_tab=<?php echo $row['id_permiso']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit() == false){return false;}">
    </p> 
    </td>
    <td align="center">
    <p> 
      <a href='permiso_eliminar.php?id_perm_tab=<?php echo $row['id_permiso']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
    </p> 
    </td>
    <td id="tabla_td_center"> <p> <?php echo $fecha2 ?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['dia_permiso']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_paterno_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_materno_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['nombres_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['tipo_permiso']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $hora_salida?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $hora_llegada?> </p> </td>
    <td> <p> <?php echo $row ['observaciones_permiso']?> </p> </td>
    <td> <p> <?php echo $row ['nombre_usuario']?> </p> </td>
  </tr>
  <?php
  }
  ?>
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
