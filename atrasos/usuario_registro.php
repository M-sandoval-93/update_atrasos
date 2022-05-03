<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);

if($_SESSION['Id_Tipo_Usuario'] != 1){
?>
<meta charset="utf-8">
  <script language="javascript"> alert("Acceso Restringido"); window.location="panel_principal.php"</script>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>

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
 showMonthAfterYear: true,
 yearSuffix: ''
 };
$.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fecha_atraso").datepicker({});
});


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

if($("#fecha_atraso").val().length < 1) {  
  alert("Debe Ingresar Fecha");  
  return false;  
}

if($("#hora_atraso").val().length < 1) {  
  alert("Debe Ingresar Hora");  
  return false;  
}

return true;  
});

//INICIO VALIDAR INGRESO DE RUT

});
//<!--FIN VALIDACION FORMULARIO-->


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

<script>
//inicio funcion para llenar input con ajax
$(document).ready(function(){
  
    // generamos un evento cada vez que se pulse una tecla
    $("#rut").keyup(function(){
    
      // enviamos una petición al servidor mediante AJAX enviando el id
      // introducido por el usuario mediante POST
      $.post("funcionario_editar.php", {"rut":$("#rut").val()}, function(data){
      
        if(data.dv)
          $("#dv").val(data.dv);
        else
          $("#dv").val("");

        if(data.apellido_paterno)
          $("#apellido_paterno").val(data.apellido_paterno);
        else
          $("#apellido_paterno").val("");

        if(data.apellido_materno)
          $("#apellido_materno").val(data.apellido_materno);
        else
          $("#apellido_materno").val("");

        if(data.nombres)
          $("#nombres").val(data.nombres);
        else
          $("#nombres").val("");

        if(data.detalle_tipo_funcionario)
          $("#funcion").val(data.detalle_tipo_funcionario);
        else
          $("#funcion").val("");

      },"json");

      $.post("consulta_u.php", {"rut":$("#rut").val()}, function(data2){
      
        if(data2.usuario)
          $("#nom_usu").val(data2.usuario);
        else
          $("#nom_usu").val("");

        if(data2.password)
          $("#pass_usu").val(data2.password);
        else
          $("#pass_usu").val("");

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

$(function(){

        $('#f1').validate({
            rules :{
                rut : {
                    required : true,
                    digits  : true,
                    minlength : 7,
                    maxlength: 8
                }
                
                                
            },
            messages : {
                rut : {
                    required : "Debe ingresar un Rut",
                    digits : "Solo numeros",
                    minlength : "Minimo 7 caracteres",
                    maxlength   : "Solo 8 caracteres"
                }
                               
            }
        });    
  });


});

//fin funcion para llenar input con ajax
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

#myTable th, #myTable td {
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

<script type="text/javascript">
$(document).ready(function() {
  $("#rut").keyup(function(){
      // envio una petición al servidor
      
      $.post("ConsultaCmb5.php", {"rut":$("#rut").val()}, function(datos){
      // recibo valores en respuesta        
        $.each(datos, function(id,descripcion){
          //Revisar si el ID es igua al que tiene el personaje
        $("#tipo_usuario").append('<option value="'+id+'" selected>'+descripcion+' </option>');
        });
      },"json");

    });

});
</script>




<script type="text/javascript">
  $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      $("#nom_usu").focus();
                                                 
      //comprobamos si se pulsa una tecla
      $("#nom_usu").keyup(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#nom_usu").val();
                                      
             //hace la búsqueda
             $("#resultado").delay(0).queue(function(n) {      
                                           
                  //$("#resultado").html('<img src="imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "ConsultaUsu.php",
                              data: "b="+consulta,
                              dataType: "html",
                              
                              error: function(){
                                    alert("error petición ajax");
                              },
                              
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});
</script>

 
</head>

<body onload="document.getElementById('rut').focus();">
<?php
$sql_tipo_usuario = "select * from tipo_usuario order by id_tipo_usuario asc";
?>
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
    <h1>Gestión de Usuarios</h1>
</header> 

<section>

<?php

$id_usu_tab = $_GET['id_usu_tab'];
$_SESSION['id_usu_tab'] = $id_usu_tab;

$sql_editar_usuario = "select 
usuario.id_usuario,
usuario.nombre_usuario,
usuario.password_usuario,
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
funcionario.nombres_funcionario,
funcionario.id_detalle_tipo_funcionario,
detalle_tipo_funcionario.detalle_tipo_funcionario,
usuario.fecha_creacion,
usuario.id_tipo_usuario,
tipo_usuario.tipo_usuario,
contrato.id_estado_vigencia,
estado_vigencia.descripcion_estado_vigencia
from funcionario,usuario,tipo_usuario,estado_vigencia,detalle_tipo_funcionario,contrato
where funcionario.id_funcionario=usuario.id_funcionario
and usuario.id_tipo_usuario=tipo_usuario.id_tipo_usuario
and contrato.id_estado_vigencia=estado_vigencia.id_estado_vigencia
and funcionario.id_funcionario=contrato.id_funcionario
and funcionario.id_detalle_tipo_funcionario=detalle_tipo_funcionario.id_detalle_tipo_funcionario
and usuario.id_usuario = ".$id_usu_tab."
order by id_contrato desc limit 1 ";

$res_editar_usuario = pg_query ($sql_editar_usuario);

if ($row = pg_fetch_assoc($res_editar_usuario)){
$fecha_creacion=date("d-m-Y",strtotime($row['fecha_creación']));

$id_usuario=$row['id_usuario'];
$nombre_usuario=$row['nombre_usuario'];
$password_usuario=$row['password_usuario'];
$rut_funcionario=$row['rut_funcionario'];
$dv_rut_funcionario=$row['dv_rut_funcionario'];
$apellido_paterno_funcionario=$row['apellido_paterno_funcionario'];
$apellido_materno_funcionario=$row['apellido_materno_funcionario'];
$nombres_funcionario=$row['nombres_funcionario'];
$id_detalle_tipo_funcionario=$row['id_detalle_tipo_funcionario'];
$detalle_tipo_funcionario=$row['detalle_tipo_funcionario'];
$id_tipo_usuario=$row['id_tipo_usuario'];
$tipo_usuario=$row['tipo_usuario'];
}

?>

<div id="BuscarFuncionario">
<form action="usuario_registrado.php" method="post" role="form" name="f1" id="f1">

    <div class="form-row">

    <div class="form-group col-md-2">
      <label for="rut">Rut</label>
      <input type="text" class="form-control" id="rut" name="rut" placeholder="RUT" value="<?php echo $rut_funcionario?>" required>
    </div>

    <div class="form-group col-md-1">
      <label for="dv">DV</label>
      <input type="text" class="form-control" id="dv" name="dv" placeholder="DV" value="<?php echo $dv_rut_funcionario?>" disabled required>
    </div>

    <div class="form-group col-md-2">
      <label for="apellido_paterno">Apellido Paterno</label>
      <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="APE. PATERNO" value="<?php echo $apellido_paterno_funcionario?>" disabled required>
    </div>

    <div class="form-group col-md-2">
      <label for="apellido_materno">Apellido Materno</label>
      <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="APE. MATERNO" value="<?php echo $apellido_materno_funcionario?>" disabled required>
    </div>

    <div class="form-group col-md-5">
      <label for="nombres">Nombres</label>
      <input type="text" class="form-control" id="nombres" name="nombres" placeholder="NOMBRES" value="<?php echo $nombres_funcionario?>" disabled required>
    </div>   
    
    </div>

    <div class="form-row">

    <div class="form-group col-md-3">
      <label for="funcion">Labor/Función</label>
      <input type="text" class="form-control" id="funcion" name="funcion" placeholder="FUNCION" value="<?php echo $detalle_tipo_funcionario?>" disabled required>
    </div>

    <div class="form-group col-md-3 has-error">
      <label for="nom_usu">Nombre Usuario</label>
      <b> <input type="text" class="form-control" id="nom_usu" name="nom_usu" placeholder="Nombre Usuario" value="<?php echo $nombre_usuario?>" required> </b>
      <div id="resultado"> </div>
    </div>

    <div class="form-group col-md-3 has-error">
      <label for="pass_usu">Contraseña</label>
      <b> <input type="password" class="form-control" id="pass_usu" name="pass_usu" placeholder="Contraseña" value="<?php echo $password_usuario?>" required> </b>
    </div> 

    <div class="form-group col-md-3 has-error">
    <label for="tipo_usuario">Tipo Usuario</label>
    <select class="form-control" name="tipo_usuario" id="tipo_usuario" style="text-transform:uppercase;" required="required">
    <option value="<?php echo $id_tipo_usuario?>"> <?php echo $tipo_usuario?> </option>
    <?php
    $res_tipo_usuario = pg_query($sql_tipo_usuario);       
    while ($row = pg_fetch_assoc($res_tipo_usuario)){   
        echo "<option value=\"".$row['id_tipo_usuario']."\">";
        echo $row['tipo_usuario']."</option>";
    }
    ?>
    </select>
    </div>

  </div>

    <div class="form-row">

    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="grabar"> <b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" onclick="location.href = 'usuario_registro.php'; return false"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>
    
    </div>
    

</form>
</div>

</section>

<br></br>


<div class="panel panel-default">

<?php
$sql_tabla = "select 
usuario.id_usuario,
usuario.nombre_usuario,
usuario.password_usuario,
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
funcionario.nombres_funcionario,
usuario.fecha_creacion,
tipo_usuario.tipo_usuario,
contrato.id_estado_vigencia,
estado_vigencia.descripcion_estado_vigencia
from funcionario,usuario,tipo_usuario,estado_vigencia,contrato
where id_contrato in (select max(id_contrato)from contrato group by id_funcionario)
and funcionario.id_funcionario=usuario.id_funcionario
and funcionario.id_funcionario=contrato.id_funcionario
and usuario.id_tipo_usuario=tipo_usuario.id_tipo_usuario
and contrato.id_estado_vigencia=estado_vigencia.id_estado_vigencia
order by funcionario.apellido_paterno_funcionario asc";

$resultado_tabla = pg_query ($sql_tabla);
$total_usuarios=pg_num_rows($resultado_tabla);
?>

<div class="panel-heading">  
<table>
<?php
//$sql_contar_usuario="select * from usuario";
//$resultado_contar_usuario=pg_query($sql_contar_usuario);

?>
  <tr>
    <td id="cabeza_panel_1"> <h1>Registro de Usuarios <h5> <strong> Vigentes - No Vigentes / Se encontraron <?php echo $total_usuarios ?> registros totales. </strong> </h5>  </h1> </td>
    <td id="cabeza_panel_2"> <a class="btn btn-info" href="usuario_registro_xls.php" value="Exportar Excel"> Exportar <img src="imagenes/logoexcel.png" width="20" height="20"> </td>
  </tr>
</table>
</div>

<div style="overflow-x:auto;"><!-- inicio tabla responsive -->
 
<table id="myTable">

  <tr>
    <th style="width:2%;"> </th>
    <th style="width:2%;"> </th>
    <th style="width:6%;"> <input type="text" id="myInput0" onkeyup="myFunction0();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput1" onkeyup="myFunction1();" placeholder="Buscar"> </th>
    <th style="width:8%;"> <input type="text" id="myInput2" onkeyup="myFunction2();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput3" onkeyup="myFunction3();" placeholder="Buscar"> </th>
    <th style="width:2%;"> <input type="text" id="myInput4" onkeyup="myFunction4();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput5" onkeyup="myFunction5();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput6" onkeyup="myFunction6();" placeholder="Buscar"> </th>
    <th style="width:14%;"> <input type="text" id="myInput7" onkeyup="myFunction7();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput8" onkeyup="myFunction8();" placeholder="Buscar"> </th>
    <th style="width:4%;"> <input type="text" id="myInput9" onkeyup="myFunction9();" placeholder="Buscar"> </th>
  </tr>

  <tr class="header">
    <th style="width:2%;" id="cabecera_tabla_1"> <p> Edit </p> </th>
    <th style="width:2%;" id="cabecera_tabla_1"> <p> Elim </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Usuario </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Contraseña </p> </th>
    <th style="width:8%;" id="cabecera_tabla_1"> <p> Tipo Usuario </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> Rut </p> </th>
    <th style="width:2%;" id="cabecera_tabla_1"> <p> DV </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Pat. </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Mat. </p> </th>
    <th style="width:14%;" id="cabecera_tabla_1"> <p> Nombres </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> F.Creación </p> </th>
    <th style="width:4%;" id="cabecera_tabla_1"> <p> Estado </p> </th>
  </tr>

    <?php
  while ($row = pg_fetch_assoc($resultado_tabla)){
  $fecha_creacion=date("d-m-Y",strtotime($row['fecha_creacion']));
  
  ?>
  
  <tr>
    <td> 
    <p> 
      <a href='usuario_registro.php?id_usu_tab=<?php echo $row['id_usuario']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit() == false){return false;}">
    </p> 
    </td>
    <td>
    <p> 
      <a href='usuario_eliminar.php?id_usu_tab=<?php echo $row['id_usuario']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
    </p> 
    </td>
    <td> <p> <?php echo $row ['nombre_usuario']?> </p> </td>
    <td> <p> <?php echo $row ['password_usuario']?> </p> </td>
    <td> <p> <?php echo $row ['tipo_usuario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['rut_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['dv_rut_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_paterno_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_materno_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['nombres_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $fecha_creacion ?> </p> </td>
    <td> <p> <?php echo $row ['descripcion_estado_vigencia']?> </p> </td>
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
