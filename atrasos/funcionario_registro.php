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
<meta name="viewport" content="width=device-width, initial-scale=1">
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
 showMonthAfterYear: true,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fecha_nac").datepicker({});
});
 
//<!--inicio validacion formulario-->
$(document).ready(function(){

    jQuery.validator.addMethod("letras", function(value, element) {
      return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Solo letras");

    jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
    }, "Value must not equal arg.");


//<!--BOTON IR ARRIBA-->
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
//<!--BOTON IR ARRIBA-->
    
//<!--VALIDAR INPUT VACIOS-->
$("#rut").submit(function () {

if($("#rut").val().length < 7) {  
	alert("Debe Ingresar Rut");  
	return false;  
}

if($("#dv").val().length < 1) {  
	alert("Debe Ingresar DV");  
	return false;  
}

if($("#apellido_paterno").val().length < 1) {  
	alert("Debe Ingresar Apellido Paterno");  
	return false;  
}
if($("#apellido_materno").val().length < 1) {  
	alert("Debe Ingresar Apellido Materno");  
	return false;  
}
if($("#nombres").val().length < 1) {  
	alert("Debe Ingresar Nombres");  
	return false;  
}
if($("#sexo").val().length < 1 ) {  
	alert("Debe Seleccionar Sexo");  
	return false;  
}
if($("#fecha_form").val().length < 1) {  
	alert("Debe Ingresar Fecha Nacimiento");  
	return false;  
}
if($("#horas_contrato").val().length < 1) {  
	alert("Debe Ingresar Horas Contrato");  
	return false;  
}
if($("#grupo_horario").val().length < 1) {  
	alert("Debe Seleccionar Grupo Horario");  
	return false;  
}
if($("#tipo_funcionario").val().length < 1) {  
	alert("Debe Seleccionar Tipo Funcionario");  
	return false;  
}
if($("#detalle_tipo_funcionario").val().length < 1) {  
	alert("Debe Seleccionar Detalle Tipo Funcionario");  
	return false;  
}
if($("#telefono").val().length < 1) {  
	alert("Debe Ingresar Número Telefónico");  
	return false;  
}
if($("#email").val().length < 1) {  
	alert("Debe Ingresar Email Funcionario");  
	return false;  
}
if($("#estado_vigencia").val().length < 1) {  
	alert("Debe Seleccionar Estado Vigencia");  
	return false;  
}

return true;  
});
//<!--VALIDAR INPUT VACIOS-->

});
//<!--fin validacion formulario-->


function confirmDel(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Desea eliminar el Registro Seleccionado? Los datos personales serán eliminados"))
  return true; //con esto se ejecuta el href de link
else
  return false ;
}

function confirmEdit(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Desea Modificar los Datos Personales?"))
  return true; //con esto se ejecuta el href de link
else
  return false ;
}

</script>


<!--ESTILOS TABLA Y BUSCADORES TABLA -->
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

#myInput10 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput11 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput12 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput13 {
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
<!--ESTILOS TABLA Y BUSCADORES TABLA -->

<!-- VALIDADOR DE RUT. ASIGNA Digito Verificador DE MANERA AUTOMATICA EN INPUT #dv -->
<script language="javascript"> 
function validar(formulario) {
var rut = f1.rut.value;
var count = 0;
var count2 = 0;
var factor = 2;
var suma = 0;
var sum = 0;
var digito = 0;
count2 = rut.length - 1;
  while(count < rut.length) {
    sum = factor * (parseInt(rut.substr(count2,1)));
    suma = suma + sum;
    sum = 0;
    count = count + 1;
    count2 = count2 - 1;
    factor = factor + 1;
    if(factor > 7) {
      factor=2;
    }
  }
digito = 11 - (suma % 11);

if (digito == 11) {
  digito = 0;
}
if (digito == 10) {
  digito = "K";
}
f1.dv.value = digito;
} 

</script>
<!-- VALIDADOR DE RUT. ASIGNA Digito Verificador DE MANERA AUTOMATICA EN INPUT #dv -->

<!-- VALIDAR SOLO INGRESO NUMEROS -->
<script>
  function validarSiNumero(numero){
    if (!/^([0-9])*$/.test(numero))
    //alert("El rut " + numero + " ingresado no es válido");
    alert("La Información ingresada no es Válida");
    }
</script>
<!-- VALIDAR SOLO INGRESO NUMEROS -->

<!-- VALIDAR SOLO INGRESO LETRAS -->
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<!-- VALIDAR SOLO INGRESO LETRAS -->

<!-- VALIDAR INGRESO EMAIL VALIDO -->
<script type="text/javascript">
//function validateMail(email){
  //object=document.getElementById(email);
  //valueForm=object.value;
  // Patron para el correo
  //var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  //if(valueForm.search(patron)==0){
    //object.style.color="#000";
    //return;
  //}
  //object.style.color="#f00";
//}
</script>
<!-- VALIDAR INGRESO EMAIL VALIDO -->

</head>

<body onload="document.getElementById('rut').focus(); f1.dig.value='' " >

<span class="ir-arriba icon-chevron-up"></span>

<!-- FUNCIONES PARA BUSCADORES TABLA -->
<script>
function myFunction0() {//FILTRO BUSQUEDA POR RUT
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

 function myFunction10() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput10");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[12];

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

 function myFunction11() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput11");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[13];

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

 function myFunction12() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput12");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[14];

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

 function myFunction13() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput13");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[15];

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
<!-- FUNCIONES PARA BUSCADORES TABLA -->

<!-- FUNCION PARA LLENAR INPUT CON BUSQUEDA MEDIANTE JSON -->
<script>
$(document).ready(function(){
    // generamos un evento cada vez que se pulse una tecla
    $("#rut").blur(function(){
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

        if(data.fecha_nac)
          $("#fecha_nac").val(data.fecha_nac);
        else
          $("#fecha_nac").val("");

        if(data.telefono)
          $("#telefono").val(data.telefono);
        else
          $("#telefono").val("");

        if(data.email)
          $("#email").val(data.email);
        else
          $("#email").val("");

        if(data.tipo_funcionario)
          $("#tipo_funcionario").val(data.tipo_funcionario);
        else
          $("#tipo_funcionario").val("");

        if(data.detalle_tipo_funcionario)
          $("#detalle_tipo_funcionario").val(data.detalle_tipo_funcionario);
        else
          $("#detalle_tipo_funcionario").val("");

        if(data.horas_contrato)
          $("#horas_contrato").val(data.horas_contrato);
        else
          $("#horas_contrato").val("");

        if(data.grupo_horario)
          $("#grupo_horario").val(data.grupo_horario);
        else
          $("#grupo_horario").val("");

        if(data.fecha_ingreso)
          $("#fecha_form").val(data.fecha_ingreso);
        else
          $("#fecha_form").val("");

        if(data.fecha_retiro)
          $("#fecha_form2").val(data.fecha_retiro);
        else
          $("#fecha_form2").val("");

      },"json");
    });

  });
</script>
<!-- FUNCION PARA LLENAR INPUT CON BUSQUEDA MEDIANTE JSON -->

<!-- FUNCIONES PARA LLENAR SELECT CON BUSQUEDA MEDIANTE JSON -->
<script type="text/javascript">
$(document).ready(function() {
  $("#rut").blur(function(){
      // envio una petición al servidor
      $.post("ConsultaCmb.php", {"rut":$("#rut").val()}, function(datos){
      // recibo valores en respuesta
        $.each(datos, function(id,descripcion){
          //Revisar si el ID es igua al que tiene el personaje
        $("#sexo").append('<option value="'+id+'" selected>'+descripcion+' </option>');
        });
      },"json");
    });
});

$(document).ready(function() {
  $("#rut").blur(function(){
      // envio una petición al servidor
      $.post("ConsultaCmb2.php", {"rut":$("#rut").val()}, function(datos){
      // recibo valores en respuesta
        $.each(datos, function(id,descripcion){
          //Revisar si el ID es igua al que tiene el personaje
        $("#tipo_funcionario").append('<option value="'+id+'" selected>'+descripcion+' </option>');
        });
      },"json");
    });
});

$(document).ready(function() {
  $("#rut").blur(function(){
      // envio una petición al servidor
      $.post("ConsultaCmb3.php", {"rut":$("#rut").val()}, function(datos){
      // recibo valores en respuesta
        $.each(datos, function(id,descripcion){
          //Revisar si el ID es igua al que tiene el personaje
        $("#detalle_tipo_funcionario").append('<option value="'+id+'" selected>'+descripcion+' </option>');
        });
      },"json");
    });
});

$(document).ready(function() {
  $("#rut").blur(function(){
      // envio una petición al servidor
      $.post("ConsultaCmb4.php", {"rut":$("#rut").val()}, function(datos){
      // recibo valores en respuesta
        $.each(datos, function(id,descripcion){
          //Revisar si el ID es igua al que tiene el personaje
        $("#grupo_horario").append('<option value="'+id+'" selected>'+descripcion+' </option>');
        });
      },"json");
    });
});

</script>
<!-- FUNCIONES PARA LLENAR SELECT CON BUSQUEDA MEDIANTE JSON -->

<?php
$sql_tipo_funcionario = "select * from tipo_funcionario order by tipo_funcionario asc";
$sql_detalle_tipo_funcionario = "select * from detalle_tipo_funcionario order by detalle_tipo_funcionario asc";
$sql_grupo_horario = "select * from grupo_horario order by nombre_grupo_horario asc";
$sql_sexo = "select * from sexo";
$sql_estado_vigencia = "select * from estado_vigencia";

?>

<div class="container-fluid" id="contenedor_principal">

<div id="menu">
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
	<h1>Registro Funcionarios LVL <h5> Ingresar / Buscar / Editar Datos Personales Funcionario </h5> </h1>
</header>

<section>

<?php

$id_fun_tab = $_GET['id_fun_tab'];//PARA PROCESO ACTUALIZACIÓN DATOS SEGÚN SELECCION EN TABLA
$_SESSION['id_fun_tab'] = $id_fun_tab;//PARA PROCESO ACTUALIZACIÓN DATOS SEGÚN SELECCION EN TABLA

$sql = "select 
funcionario.id_funcionario,
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.nombres_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
sexo.id_sexo,
sexo.codigo_sexo,
funcionario.fecha_nacimiento_funcionario,
funcionario.telefono_funcionario,
funcionario.email_funcionario,
estado_vigencia.id_estado_vigencia,
estado_vigencia.descripcion_estado_vigencia,
estado_vigencia.codigo_estado_vigencia,
tipo_funcionario.id_tipo_funcionario,
tipo_funcionario.tipo_funcionario,
detalle_tipo_funcionario.id_detalle_tipo_funcionario,
detalle_tipo_funcionario.detalle_tipo_funcionario,
grupo_horario.id_grupo_horario,
grupo_horario.nombre_grupo_horario,
contrato.id_contrato,
contrato.fecha_ingreso,
contrato.fecha_retiro,
contrato.horas_contrato,
contrato.id_funcionario
from 
funcionario,sexo,tipo_funcionario, detalle_tipo_funcionario,grupo_horario,estado_vigencia,contrato
where funcionario.id_sexo_funcionario=sexo.id_sexo
and funcionario.id_tipo_funcionario=tipo_funcionario.id_tipo_funcionario
and funcionario.id_detalle_tipo_funcionario=detalle_tipo_funcionario.id_detalle_tipo_funcionario
and funcionario.id_grupo_horario_funcionario=grupo_horario.id_grupo_horario
and funcionario.id_funcionario=contrato.id_funcionario
and funcionario.id_funcionario = ".$id_fun_tab." 
order by contrato.id_contrato desc limit 1";

$resultado = pg_query ($sql);//PARA PROCESO ACTUALIZACIÓN DATOS SEGÚN SELECCION EN TABLA

if ($row = pg_fetch_assoc($resultado)){
$fecha_n=date("d-m-Y",strtotime($row['fecha_nacimiento_funcionario']));
$fecha_i=date("d-m-Y",strtotime($row['fecha_ingreso']));

if($row['fecha_retiro']==null){
$fecha_r='';  
}
else{
$fecha_r=date("d-m-Y",strtotime($row['fecha_retiro']));  
}

$rut_f=$row['rut_funcionario'];
$dv_rut_f=$row['dv_rut_funcionario'];
$apellido_paterno_f=$row['apellido_paterno_funcionario'];
$apellido_materno_f=$row['apellido_materno_funcionario'];
$nombres_f=$row['nombres_funcionario'];
$id_sexo_f=$row['id_sexo'];
$codigo_sexo_f=$row['codigo_sexo'];
$horas_contrato_f=$row['horas_contrato'];
$telefono_f=$row['telefono_funcionario'];
$email_f=$row['email_funcionario'];
$id_grupo_horario_f=$row['id_grupo_horario'];
$nombre_grupo_horario_f=$row['nombre_grupo_horario'];
$id_tipo_funcionario_f=$row['id_tipo_funcionario'];
$tipo_funcionario_f=$row['tipo_funcionario'];
$id_detalle_tipo_funcionario_f=$row['id_detalle_tipo_funcionario'];
$detalle_tipo_funcionario_f=$row['detalle_tipo_funcionario'];
$id_estado_vigencia_f=$row['id_estado_vigencia'];
$estado_vigencia_f=$row['descripcion_estado_vigencia'];
}

?>

<div id="formulario_registro"> <!--INICIO FRF --> 	

<form action="funcionario_registrado.php" method="post" role="form" name="f1" id="f1">

  <div class="form-row">   
    <div class="form-group col-md-2">
      <label for="rut">Rut</label>
      <input type="text" class="form-control" id="rut" name="rut" placeholder="RUT" style="text-transform:uppercase;" value="<?php echo $rut_f?>" required onblur="validar()" onChange="validarSiNumero(this.value);" maxlength="8"> <!--<div id="suggestions"> </div>-->
    </div>

    <div class="form-group col-md-1">
      <label for="dv">Dv</label>
      <input type="text" class="form-control" id="dv" name="dv" placeholder="DV" style="text-transform:uppercase;" value="<?php echo $dv_rut_f?>" required onblur="validar()" maxlength="1">
    </div>

    <div class="form-group col-md-2">
      <label for="apellido_paterno">Apellido Paterno</label>
      <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="APELLIDO PATERNO" style="text-transform:uppercase;" value="<?php echo $apellido_paterno_f?>" required onkeypress="return soloLetras(event)">
    </div>

    <div class="form-group col-md-2">
      <label for="apellido_materno">Apellido Materno</label>
      <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="APELLIDO MATERNO" style="text-transform:uppercase;" value="<?php echo $apellido_materno_f?>" required onkeypress="return soloLetras(event)">
    </div>

    <div class="form-group col-md-5">
      <label for="nombres">Nombres</label>
      <input type="text" class="form-control" id="nombres" name="nombres" placeholder="NOMBRES" style="text-transform:uppercase;" value="<?php echo $nombres_f?>" required onkeypress="return soloLetras(event)">
    </div>
  </div>

  <div class="form-row">   
    <div class="form-group col-md-1">
    <label for="sexo">Sexo</label>
    <select class="form-control" name="sexo" id="sexo" style="text-transform:uppercase;">
        <option value="<?php echo $id_sexo_f?>" required> <?php echo $codigo_sexo_f?> </option>
        <?php
        $res_sexo = pg_query($sql_sexo);       
            while ($row = pg_fetch_assoc($res_sexo)){
    	        echo "<option value=\"".$row['id_sexo']."\">";
        	    echo $row['codigo_sexo']."</option>";
			}
		?>
    </select>
    </div>

    <div class="form-group col-md-2">
    <label for="fecha_nacimiento">Fecha Nac.</label>
    <div class='input-group date' id="datepicker">
	  <input type='text' class="form-control" id="fecha_nac" name="fecha" placeholder="DD-MM-AAAA" style="text-transform:uppercase;" value="<?php echo $fecha_n?>" maxlength="10">
	  <span class="input-group-addon">
	  <span class="glyphicon glyphicon-calendar"></span>
	  </span>
	</div>
    </div>

    <div class="form-group col-md-2">
      <label for="telefono">Teléfono</label>
      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="TELÉFONO" value="<?php echo $telefono_f?>">
    </div>

    <div class="form-group col-md-5">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="EMAIL" value="<?php echo $email_f?>">
    </div>
  </div>

  <div class="form-group col-md-2">
      <label for="tipo_funcionario">Tipo Funcionario</label>
      <select class="form-control" name="tipo_funcionario" id="tipo_funcionario" style="text-transform:uppercase;">
    <option value="<?php echo $id_tipo_funcionario_f?>" required> <?php echo $tipo_funcionario_f?> </option>
    <?php
    $res_tipo_funcionario = pg_query($sql_tipo_funcionario);       
    while ($row = pg_fetch_assoc($res_tipo_funcionario)){   
      echo "<option value=\"".$row['id_tipo_funcionario']."\">";
      echo $row['tipo_funcionario']."</option>";
    }
    ?>
    </select>
    </div>

  <div class="form-row">

    <div class="form-group col-md-3">
      <label for="funcion">Función</label>
		<select class="form-control" name="detalle_tipo_funcionario" id="detalle_tipo_funcionario" style="text-transform:uppercase;">
		<option value="<?php echo $id_detalle_tipo_funcionario_f?>" required> <?php echo $detalle_tipo_funcionario_f?> </option>
		<?php
		$res_detalle_tipo_funcionario = pg_query($sql_detalle_tipo_funcionario);       
		while ($row = pg_fetch_assoc($res_detalle_tipo_funcionario)){   
			echo "<option value=\"".$row['id_detalle_tipo_funcionario']."\">";
			echo $row['detalle_tipo_funcionario']."</option>";
		}
		?>
		</select>
    </div>

    <div class="form-group col-md-1 has-error">
      <label for="horas_contrato">H.Cont.</label>
      <input type="text" class="form-control" id="horas_contrato" name="horas_contrato" placeholder="H.CONT" value="<?php echo $horas_contrato_f?>" disabled onChange="validarSiNumero(this.value);">
    </div>

    <div class="form-group col-md-4">
      <label for="grupo_horario">Grupo Horario</label>
      	<select class="form-control" name="grupo_horario" id="grupo_horario" style="text-transform:uppercase;">
		<option value="<?php echo $id_grupo_horario_f?>"> <?php echo $nombre_grupo_horario_f?> </option>
		<?php
		$res_grupo_horario = pg_query($sql_grupo_horario);       
		while ($row = pg_fetch_assoc($res_grupo_horario)){   
			echo "<option value=\"".$row['id_grupo_horario']."\">";
			echo $row['nombre_grupo_horario']."</option>";
		}
		?>
		</select>
    </div>

    <div class="form-group col-md-2 has-error">
    <label for="fecha_nacimiento">Fecha Ingreso</label>
    <div class='input-group date' id="datepicker">
    <input type='text' class="form-control" id="fecha_form" name="fecha_ingreso" placeholder="DD-MM-AAAA" style="text-transform:uppercase;" value="<?php echo $fecha_i?>" disabled>
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-calendar"></span>
    </span>
  </div>
    </div>

    <div class="form-group col-md-2 has-error" >
    <label for="fecha_nacimiento">Fecha Retiro</label>
    <div class='input-group date' id="datepicker">
    <input type='text' class="form-control" id="fecha_form2" name="fecha_retiro" placeholder="DD-MM-AAAA" style="text-transform:uppercase;" value="<?php echo $fecha_r?>" disabled>
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-calendar"></span>
    </span>
  </div>
    </div>

    <div class="form-row">   
    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="btnform"><b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" id="btnform" onclick="location.href = 'funcionario_registro.php'; return false"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>
    </div>

</form>

</div> <!--fin FRF -->
</section>

<br></br>

<div class="panel panel-default">

<?php
$sql = "select 
funcionario.id_funcionario,
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.nombres_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
funcionario.telefono_funcionario,
funcionario.email_funcionario,
contrato.id_contrato,
contrato.fecha_ingreso,
contrato.fecha_retiro,
contrato.horas_contrato,
contrato.id_funcionario,
sexo.codigo_sexo,
funcionario.fecha_nacimiento_funcionario,
tipo_funcionario.id_tipo_funcionario,
tipo_funcionario.tipo_funcionario,
detalle_tipo_funcionario.id_detalle_tipo_funcionario,
detalle_tipo_funcionario.detalle_tipo_funcionario,
grupo_horario.id_grupo_horario,
grupo_horario.nombre_grupo_horario,
estado_vigencia.id_estado_vigencia,
estado_vigencia.codigo_estado_vigencia,
estado_vigencia.descripcion_estado_vigencia 
from funcionario,sexo,tipo_funcionario,detalle_tipo_funcionario,grupo_horario,estado_vigencia,contrato
where funcionario.id_sexo_funcionario=sexo.id_sexo
and funcionario.id_tipo_funcionario=tipo_funcionario.id_tipo_funcionario
and funcionario.id_detalle_tipo_funcionario=detalle_tipo_funcionario.id_detalle_tipo_funcionario
and funcionario.id_grupo_horario_funcionario=grupo_horario.id_grupo_horario
and funcionario.id_funcionario=contrato.id_funcionario
and contrato.id_estado_vigencia=estado_vigencia.id_estado_vigencia
and contrato.id_estado_vigencia='1'
order by funcionario.apellido_paterno_funcionario asc";

$resultado = pg_query ($sql);
$total_funcionarios=pg_num_rows($resultado);
?>

<div class="panel-heading">
<table>
  <tr>
    <td id="cabeza_panel_1"> <h1>Funcionarios con Contrato Vigente</h1> <h5><strong>Se encontraron <?php echo $total_funcionarios?> registros totales.</strong></h5> </td>
    <td id="cabeza_panel_2"> <a class="btn btn-info" href="funcionario_registro_xls.php" value="Exportar Excel"> Exportar <img src="imagenes/logoexcel.png" width="20" height="20"> </td>
  </tr>
</table>
</div>

<div style="overflow-x:auto;"> <!-- inicio tabla responsive -->

<table id="myTable">
  
  <tr>
    <th style="width:2%;"> </th>
    <th style="width:2%;"> </th>
    <th style="width:5%;"> <input type="text" id="myInput0" onkeyup="myFunction0();" placeholder="Buscar"> </th>
    <th style="width:2%;"> <input type="text" id="myInput1" onkeyup="myFunction1();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput2" onkeyup="myFunction2();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput3" onkeyup="myFunction3();" placeholder="Buscar"> </th>
    <th style="width:14%;"> <input type="text" id="myInput4" onkeyup="myFunction4();" placeholder="Buscar"> </th>
    <th style="width:3%;"> <input type="text" id="myInput5" onkeyup="myFunction5();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput6" onkeyup="myFunction6();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput7" onkeyup="myFunction7();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput8" onkeyup="myFunction8();" placeholder="Buscar"> </th>
    <th style="width:12%;"> <input type="text" id="myInput9" onkeyup="myFunction9();" placeholder="Buscar"> </th>
    <th style="width:3%;"> <input type="text" id="myInput10" onkeyup="myFunction10();" placeholder="Buscar"> </th>
    <th style="width:10%;"> <input type="text" id="myInput11" onkeyup="myFunction11();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput12" onkeyup="myFunction12();" placeholder="Buscar"> </th>
    <th style="width:4%;"> <input type="text" id="myInput13" onkeyup="myFunction13();" placeholder="Buscar"> </th>
  </tr>

  <tr class="header">
  	<th style="width:2%;" id="cabecera_tabla_1"> <p> Edit </p> </th>
  	<th style="width:2%;" id="cabecera_tabla_1"> <p> Elim </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> Rut </p> </th>
    <th style="width:2%;" id="cabecera_tabla_1"> <p> DV </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Pat. </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Mat. </p> </th>
    <th style="width:14%;" id="cabecera_tabla_1"> <p> Nombres </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> Sexo </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> F. Nac. </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> Fono </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Tipo Func. </p> </th>
    <th style="width:12%;" id="cabecera_tabla_1"> <p> Función </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> H.Cont </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Grupo Horario </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> F. Cont. </p> </th>
    <th style="width:4%;" id="cabecera_tabla_1"> <p> Estado </p> </th>
  </tr>

  	<?php
	while ($row = pg_fetch_assoc($resultado)){
	$fecha=$row['fecha_nacimiento_funcionario'];
	$fecha2=date("d-m-Y",strtotime($fecha));
  $fecha_contrato=date("d-m-Y",strtotime($row['fecha_ingreso']));
	
	?>
  
  <tr>
  	<td> 
  	<p> 
  		<a href='funcionario_registro.php?id_fun_tab=<?php echo $row['id_funcionario']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit() == false){return false;}">
  	</p> 
  	</td>
  	<td>
    <p> 
  		<a href='funcionario_eliminar.php?id_fun_tab=<?php echo $row['id_funcionario']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
  	</p> 
  	</td>
    <td id="tabla_td_center"> <p> <?php echo $row ['rut_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['dv_rut_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_paterno_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_materno_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['nombres_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['codigo_sexo']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $fecha2 ?> </p> </td>
    <td> <p> <?php echo $row ['telefono_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['tipo_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['detalle_tipo_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['horas_contrato']?> </p> </td>
    <td> <p> <?php echo $row ['nombre_grupo_horario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $fecha_contrato ?> </p> </td>
    <td> <p> <?php echo $row ['descripcion_estado_vigencia']?> </p> </td>
  </tr>
  <?php
  }
  ?>
</table> 

</div><!-- fin tabla responsive -->

  
</div> <!-- FIN PANEL DEFAULT -->

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
