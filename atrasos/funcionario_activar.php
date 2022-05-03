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
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
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
$("#fecha_form2").datepicker({});
});



//<!--inicio validacion formulario-->
$(document).ready(function(){

    jQuery.validator.addMethod("letras", function(value, element) {
      return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Solo letras");

    jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg != value;
    }, "Value must not equal arg.");

	//$("#rut").Rut({
    //on_error: function(){ alert('El Rut ingresado no es valido'); },
    //format_on: 'true',
    //format_on: 'change'
  	//});


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
//<!--FIN VALIDACION FORMULARIO-->
function confirmNew(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Desea Añadir un Nuevo Contrato al Funcionario Seleccionado?"))
  return true; //con esto se ejecuta el href de link
else
  return false ;
}

function confirmDel(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Desea Eliminar el Contrato Seleccionado?"))
  return true; //con esto se ejecuta el href de link
else
  return false ;
}

function confirmEdit(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Desea Activar el Contrato Seleccionado (1er. Contrato)?"))
  return true; //con esto se ejecuta el href de link
else
  return false ;
}

function confirmEdit2(){
//var agree = confirm("¿Realmente desea eliminarlo?");
if (confirm("¿Desea Editar el Contrato Seleccionado?"))
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

 function myFunction0a() {//FILTRO BUSQUEDA POR RUT RAPIDA EN TABLA RESUMEN
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput0a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction1a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput1a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction2a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction3a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput3a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction4a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput4a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction5a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput5a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction6a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput6a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction7a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput7a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction8a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput8a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction9a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput9a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction10a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput10a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

 function myFunction11a() {//FILTRO BUSQUEDA
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput11a");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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

</script>

<script>
//inicio funcion para llenar input con ajax
$(document).ready(function(){
  
    // generamos un evento cada vez que se pulse una tecla
    $("#rut").blur(function(){
    
      // enviamos una petición al servidor mediante AJAX enviando el id
      // introducido por el usuario mediante POST
      $.post("consulta_f.php", {"rut":$("#rut").val()}, function(data){
      
        if(data.dv)
          $("#dv").val(data.dv);
        else
          $("#dv").val("");

        if(data.nombre_completo)
          $("#nombre_completo").val(data.nombre_completo);
        else
          $("#nombre_completo").val("");

        if(data.fecha_ingreso)
          $("#fecha_form").val(data.fecha_ingreso);
        else
          $("#fecha_form").val("");

        if(data.fecha_retiro)
          $("#fecha_form2").val(data.fecha_retiro);
        else
          $("#fecha_form2").val("");

        // Si devuelve un nombre lo mostramos, si no, vaciamos la casilla
        if(data.horas_contrato)
          $("#horas_contrato").val(data.horas_contrato);
        else
          $("#horas_contrato").val("");
          
        // Si devuelve un apellido lo mostramos, si no, vaciamos la casilla
        if(data.observaciones_contrato)
          $("#observaciones_contrato").val(data.observaciones_contrato);
        else
          $("#observaciones_contrato").val("");

      },"json");
    });
  });

//fin funcion para llenar input con ajax

$(document).ready(function() {
  $("#rut").blur(function(){
      // envio una petición al servidor
      $.post("ConsultaVigencia.php", {"rut":$("#rut").val()}, function(datos){
      // recibo valores en respuesta
        $.each(datos, function(id,descripcion){
          //Revisar si el ID es igua al que tiene el personaje
        $("#estado_vigencia").append('<option value="'+id+'" selected>'+descripcion+' </option>');
        });
      },"json");
    });
});

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

#myInput10 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput11 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput12 {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput-3a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput-2a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput-1a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput0a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput1a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput2a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput3a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput4a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput5a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput6a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput7a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput8a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput9a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput10a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput11a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myInput12a {
    background-image: url('/css/buscar.png'); background-position: 0px 0px; background-repeat: no-repeat; width: 100%; font-size: 12px; padding: 1px 1px 1px 1px; border: 0px solid #ddd; margin-bottom: 0px;
}

#myTable {border-collapse: collapse; width: 100%; border: 1px solid #ddd; font-size: 18px; }

#myTable th{text-align: left; padding: 1px; }

#myTable tr { border-bottom: 1px solid #ddd; }

#myTable tr.header, #myTable tr:hover { background-color: #f1f1f1; }

#myTable tr:nth-child(even) { background-color: #bdbdbd; }

#myTable2 {border-collapse: collapse; width: 100%; border: 1px solid #ddd; font-size: 18px; }

#myTable2 th{text-align: left; padding: 1px; }

#myTable2 tr { border-bottom: 1px solid #ddd; }

#myTable2 tr.header, #myTable tr:hover { background-color: #f1f1f1; }

#myTable2 tr:nth-child(even) { background-color: #bdbdbd; }

</style>

 
</head>

<body onload="document.getElementById('rut').focus();">

<div class="container-fluid" id="contenedor_principal">

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
	<h1>Contrato Funcionario <h5>Editar Contrato Actual - Activar/Desactivar Contrato</h5> </h1>
</header> 

<section>
<?php
$sql_estado_vigencia = "select * from estado_vigencia";

$sql_funcionario="select * from funcionario";

$id_fun_tab = $_GET['id_fun_tab'];
$_SESSION['id_fun_tab'] = $id_fun_tab;

$sql_activar_contrato = "select 
funcionario.id_funcionario,
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
funcionario.nombres_funcionario,
contrato.id_contrato,
contrato.fecha_ingreso,
contrato.fecha_retiro,
contrato.horas_contrato,
contrato.observaciones_contrato,
contrato.id_funcionario,
estado_vigencia.descripcion_estado_vigencia
from funcionario,contrato,estado_vigencia
where funcionario.id_funcionario=contrato.id_funcionario
and contrato.id_estado_vigencia=estado_vigencia.id_estado_vigencia
and funcionario.id_funcionario = ".$id_fun_tab."
order by contrato.id_contrato desc limit 1";

$res_activar_contrato = pg_query ($sql_activar_contrato);

if ($row = pg_fetch_assoc($res_activar_contrato)){
$fecha_i=date("d-m-Y",strtotime($row['fecha_ingreso']));

if($row['fecha_retiro'] == null){
$fecha_r='';
}
else{
$fecha_r=date("d-m-Y",strtotime($row['fecha_retiro']));  
}

$id_funcionario=$row['id_funcionario'];
$rut_funcionario=$row['rut_funcionario'];
$dv_rut_funcionario=$row['dv_rut_funcionario'];
$apellido_paterno=$row['apellido_paterno_funcionario'];
$apellido_materno=$row['apellido_materno_funcionario'];
$nombres=$row['nombres_funcionario'];
$horas_contrato=$row['horas_contrato'];
$observaciones=$row['observaciones_contrato'];
$id_estado_vigencia=$row['id_estado_vigencia'];
$descripcion_estado_vigencia=$row['descripcion_estado_vigencia'];
}

$id_fun_tab2 = $_GET['id_fun_tab2'];
$_SESSION['id_fun_tab2'] = $id_fun_tab2;

$sql_nuevo_contrato = "select 
funcionario.id_funcionario,
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
funcionario.nombres_funcionario,
contrato.id_contrato,
contrato.fecha_ingreso,
contrato.fecha_retiro,
contrato.horas_contrato,
contrato.observaciones_contrato,
contrato.id_funcionario
from funcionario,contrato
where funcionario.id_funcionario=contrato.id_funcionario
and funcionario.id_funcionario = ".$id_fun_tab2."
order by contrato.id_contrato desc limit 1";

$res_nuevo_contrato = pg_query ($sql_nuevo_contrato);

if ($row = pg_fetch_assoc($res_nuevo_contrato)){
//$fecha_i=date("d-m-Y",strtotime($row['fecha_ingreso']));

//if($row['fecha_retiro'] == null){
//$fecha_r='';
//}
//else{
//$fecha_r=date("d-m-Y",strtotime($row['fecha_retiro']));  
//}

$id_funcionario=$row['id_funcionario'];
$rut_funcionario=$row['rut_funcionario'];
$dv_rut_funcionario=$row['dv_rut_funcionario'];
$apellido_paterno=$row['apellido_paterno_funcionario'];
$apellido_materno=$row['apellido_materno_funcionario'];
$nombres=$row['nombres_funcionario'];
//$horas_contrato=$row['horas_contrato'];
//$observaciones=$row['observaciones_contrato'];

}


?>
<div id="formulario_registro">
<form action="funcionario_activado.php" method="post" role="form" name="f1" id="f1">

  <div class="form-row">

    <div class="form-group col-md-2">
      <label for="rut">Rut</label>
      <input type="text" class="form-control" id="rut" name="rut" placeholder="RUT" value="<?php echo $rut_funcionario?>" maxlength="8" required>
    </div>

    <div class="form-group col-md-1">
      <label for="dv">DV</label>
      <input type="text" class="form-control" id="dv" name="dv" placeholder="DV" value="<?php echo $dv_rut_funcionario?>" disabled required>
    </div>

    <div class="form-group col-md-4">
      <label for="rut">Funcionario</label>
      <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="NOMBRE COMPLETO" value="<?php echo $apellido_paterno." ".$apellido_materno." ".$nombres?>" disabled required>
    </div>   
    
    <div class="form-group col-md-2">
    <label for="fecha_ingreso">Fecha Ingreso</label>
    <div class='input-group date' id="datepicker">
	  <input type='text' class="form-control" id="fecha_form" name="fecha_ingreso" placeholder="DD-MM-AAAA" style="text-transform:uppercase;" value="<?php echo $fecha_i?>" required maxlength="10">
	  <span class="input-group-addon">
	  <span class="glyphicon glyphicon-calendar"></span>
	  </span>
	  </div>
    </div>

    <div class="form-group col-md-2">
    <label for="fecha_retiro">Fecha Retiro</label>
    <div class='input-group date' id="datepicker">
    <input type='text' class="form-control" id="fecha_form2" name="fecha_retiro" placeholder="DD-MM-AAAA" style="text-transform:uppercase;" value="<?php echo $fecha_r?>" maxlength="10">
    <span class="input-group-addon">
    <span class="glyphicon glyphicon-calendar"></span>
    </span>
    </div>
    </div>

    <div class="form-group col-md-1">
      <label for="dia_permiso">Horas C.</label>
      <input type="text" class="form-control" id="horas_contrato" name="horas_contrato" placeholder="Horas Contrato" value="<?php echo $horas_contrato?>" required maxlength="2">
    </div>
    
  </div>


  <div class="form-row">

    <div class="form-group col-md-10">
      <label for="horas_contrato">Observaciones</label>
      <input type="text" class="form-control" id="observaciones_contrato" name="observaciones_contrato" placeholder="OBSERVACIONES" value="<?php echo $observaciones?>" required>
    </div>
  </div>

  <div class="form-group col-md-2">
    <label for="estado_vigencia">Estado Contrato</label>
    <select class="form-control" name="estado_vigencia" id="estado_vigencia" style="text-transform:uppercase;" required>
        <option value="<?php echo $id_estado_vigencia?>"> <?php echo $descripcion_estado_vigencia?> </option>
        <?php
        $res_estado_vigencia = pg_query($sql_estado_vigencia);       
            while ($row = pg_fetch_assoc($res_estado_vigencia)){
              echo "<option value=\"".$row['id_estado_vigencia']."\">";
              echo $row['descripcion_estado_vigencia']."</option>";
      }
    ?>
    </select>
    </div>

    <div class="form-row">   
    <div class="form-group col-lg-1">
      <button type="submit" class="btn btn-default" id="grabar"> <b> Guardar <span class="glyphicon glyphicon-floppy-disk"> </button>
    </div>

    <div class="form-group col-lg-1">
      <button type="Reset" class="btn btn-default" id="Borrar" onclick="location.href = 'funcionario_activar.php'; return false"> <b> Limpiar <span class="glyphicon glyphicon-remove"> </button>
    </div>
    </div>

</form>
</div>

</section>

<br></br>


<div class="panel panel-default">

<!-- primera tabla -->
<div class="panel-heading"> 
<table>
  <tr>
    <td id="cabeza_panel_1"> <h1>Funcionarios Sin Contrato <h5>Activar Primer Contrato / Eliminar</h5></h1> </td>
    <td id="cabeza_panel_2"> <a class="btn btn-info" href="funcionario_activar_nuevos_xls.php" value="Exportar Excel"> Exportar <img src="imagenes/logoexcel.png" width="20" height="20"> </td>
  </tr>
</table>
</div>

<?php
$sql_tabla = "select
funcionario.id_funcionario,
contrato.id_contrato,
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.nombres_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
funcionario.telefono_funcionario,
contrato.fecha_ingreso,
contrato.fecha_retiro,
contrato.horas_contrato,
contrato.id_estado_vigencia,
estado_vigencia.codigo_estado_vigencia,
estado_vigencia.descripcion_estado_vigencia,
sexo.codigo_sexo,
tipo_funcionario.tipo_funcionario,
detalle_tipo_funcionario.detalle_tipo_funcionario,
grupo_horario.nombre_grupo_horario 
from funcionario,sexo,tipo_funcionario,detalle_tipo_funcionario,grupo_horario,estado_vigencia,contrato
where funcionario.id_sexo_funcionario=sexo.id_sexo
and funcionario.id_tipo_funcionario=tipo_funcionario.id_tipo_funcionario
and funcionario.id_detalle_tipo_funcionario=detalle_tipo_funcionario.id_detalle_tipo_funcionario
and funcionario.id_grupo_horario_funcionario=grupo_horario.id_grupo_horario
and funcionario.id_funcionario=contrato.id_funcionario
and contrato.id_estado_vigencia=estado_vigencia.id_estado_vigencia
and contrato.id_estado_vigencia='2'
and contrato.fecha_ingreso = '1900-01-01'
order by funcionario.apellido_paterno_funcionario asc";

$resultado_tabla = pg_query ($sql_tabla);

?>

<div style="overflow-x:auto;"><!-- inicio tabla responsive -->
<table id="myTable">

  <tr>
    <th style="width:2%;"> </th>
    <th style="width:2%;"> </th>
    <th style="width:5%;"> <input type="text" id="myInput0" onkeyup="myFunction0();" placeholder="Buscar"> </th>
    <th style="width:2%;"> <input type="text" id="myInput1" onkeyup="myFunction1();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput2" onkeyup="myFunction2();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput3" onkeyup="myFunction3();" placeholder="Buscar"> </th>
    <th style="width:19%;"> <input type="text" id="myInput4" onkeyup="myFunction4();" placeholder="Buscar"> </th>
    <th style="width:3%;"> <input type="text" id="myInput5" onkeyup="myFunction5();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput6" onkeyup="myFunction6();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput7" onkeyup="myFunction7();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput8" onkeyup="myFunction8();" placeholder="Buscar"> </th>
    <th style="width:16%;"> <input type="text" id="myInput9" onkeyup="myFunction9();" placeholder="Buscar"> </th>
    <th style="width:3%;"> <input type="text" id="myInput10" onkeyup="myFunction10();" placeholder="Buscar"> </th>
    <th style="width:10%;"> <input type="text" id="myInput11" onkeyup="myFunction11();" placeholder="Buscar"> </th>
    <th style="width:10%;"> <input type="text" id="myInput12" onkeyup="myFunction12();" placeholder="Buscar"> </th>
  </tr>

  <tr class="header">
    <th style="width:2%;" id="cabecera_tabla_1"> <p> Act </p> </th>
    <th style="width:2%;" id="cabecera_tabla_1"> <p> Des </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> Rut </p> </th>
    <th style="width:2%;" id="cabecera_tabla_1"> <p> DV </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Pat. </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Mat. </p> </th>
    <th style="width:19%;" id="cabecera_tabla_1"> <p> Nombres </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> Sexo </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> F. Ingreso </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> F. Retiro </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Tipo Func. </p> </th>
    <th style="width:16%;" id="cabecera_tabla_1"> <p> Función </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> H.Cont </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Grupo H. </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Estado </p> </th>
  </tr>

  <?php
  while ($row = pg_fetch_assoc($resultado_tabla)){
    $fecha_i=date("d-m-Y",strtotime($row['fecha_ingreso']));
    
    if ($row['fecha_retiro']==null){
      $fecha_r='';
    }
    else{
      $fecha_r=date("d-m-Y",strtotime($row['fecha_retiro']));  
    }
    ?>
  
  <tr>
    <td> 
    <p> 
      <a href='funcionario_activar.php?id_fun_tab=<?php echo $row['id_funcionario']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit() == false){return false;}">
    </p> 
    </td>
    <td>
    <p> 
      <a href='contrato_eliminar.php?id_fun_tab=<?php echo $row['id_funcionario']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
    </p> 
    </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['rut_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['dv_rut_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_paterno_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_materno_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['nombres_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['codigo_sexo']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $fecha_i ?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $fecha_r ?> </p> </td>
    <td> <p> <?php echo $row ['tipo_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['detalle_tipo_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['horas_contrato']?> </p> </td>
    <td> <p> <?php echo $row ['nombre_grupo_horario']?> </p> </td>
    <td> <p> <?php echo $row ['descripcion_estado_vigencia']?> </p> </td>
  </tr>
  <?php
  }
  ?>
</table> 
</div> <!-- fin tabla responsive -->
<!-- primera tabla -->


<!-- segunda tabla --> 
<div class="panel-heading"> 
<table>
  <tr>
    <td id="cabeza_panel_1"> <h1>Funcionarios con Contrato No Vigentes <h5> Reactivar Último Contrato / Crear Nuevo Contrato</h5></h1> </td>
    <td id="cabeza_panel_2"> <a class="btn btn-info" href="funcionario_activar_antiguos_xls.php" value="Exportar Excel"> Exportar <img src="imagenes/logoexcel.png" width="20" height="20"> </td>
  </tr>
</table>
</div>

<?php
$sql_tabla = "select
funcionario.id_funcionario,
contrato.id_contrato,
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.nombres_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
contrato.fecha_ingreso,
contrato.fecha_retiro,
contrato.horas_contrato,
sexo.codigo_sexo,
funcionario.fecha_nacimiento_funcionario,
tipo_funcionario.tipo_funcionario,
detalle_tipo_funcionario.detalle_tipo_funcionario,
grupo_horario.nombre_grupo_horario,
estado_vigencia.id_estado_vigencia,
estado_vigencia.codigo_estado_vigencia,
estado_vigencia.descripcion_estado_vigencia 
from funcionario,sexo,tipo_funcionario,detalle_tipo_funcionario,grupo_horario,estado_vigencia,contrato
where id_contrato in (select max(id_contrato)from contrato group by id_funcionario)
and funcionario.id_sexo_funcionario=sexo.id_sexo
and funcionario.id_tipo_funcionario=tipo_funcionario.id_tipo_funcionario
and funcionario.id_detalle_tipo_funcionario=detalle_tipo_funcionario.id_detalle_tipo_funcionario
and funcionario.id_grupo_horario_funcionario=grupo_horario.id_grupo_horario
and funcionario.id_funcionario=contrato.id_funcionario
and contrato.id_estado_vigencia=estado_vigencia.id_estado_vigencia
and contrato.id_estado_vigencia='2'
and contrato.fecha_ingreso > '1900-01-01'
order by funcionario.apellido_paterno_funcionario asc";

$resultado_tabla = pg_query ($sql_tabla);

?>

<div style="overflow-x:auto;"><!-- inicio tabla responsive -->
<table id="myTable2">

  <tr>
    <th style="width:2%;"> </th>
    <th style="width:2%;"> </th>
    <th style="width:2%;"> </th>
    <th style="width:5%;"> <input type="text" id="myInput0a" onkeyup="myFunction0a();" placeholder="Buscar"> </th>
    <th style="width:2%;"> <input type="text" id="myInput1a" onkeyup="myFunction1a();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput2a" onkeyup="myFunction2a();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput3a" onkeyup="myFunction3a();" placeholder="Buscar"> </th>
    <th style="width:17%;"> <input type="text" id="myInput4a" onkeyup="myFunction4a();" placeholder="Buscar"> </th>
    <th style="width:3%;"> <input type="text" id="myInput5a" onkeyup="myFunction5a();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput6a" onkeyup="myFunction6a();" placeholder="Buscar"> </th>
    <th style="width:5%;"> <input type="text" id="myInput7a" onkeyup="myFunction7a();" placeholder="Buscar"> </th>
    <th style="width:6%;"> <input type="text" id="myInput8a" onkeyup="myFunction8a();" placeholder="Buscar"> </th>
    <th style="width:16%;"> <input type="text" id="myInput9a" onkeyup="myFunction9a();" placeholder="Buscar"> </th>
    <th style="width:3%;"> <input type="text" id="myInput10a" onkeyup="myFunction10a();" placeholder="Buscar"> </th>
    <th style="width:10%;"> <input type="text" id="myInput11a" onkeyup="myFunction11a();" placeholder="Buscar"> </th>
    <th style="width:10%;"> <input type="text" id="myInput12a" onkeyup="myFunction12a();" placeholder="Buscar"> </th>
  </tr>

  <tr class="header">
    <th style="width:2%;" id="cabecera_tabla_1"> <p> Nue </p> </th>
    <th style="width:2%;" id="cabecera_tabla_1"> <p> Edi </p> </th>
    <th style="width:2%;" id="cabecera_tabla_1"> <p> Eli </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> Rut </p> </th>
    <th style="width:2%;" id="cabecera_tabla_1"> <p> DV </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Pat. </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Mat. </p> </th>
    <th style="width:17%;" id="cabecera_tabla_1"> <p> Nombres </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> Sexo </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> F. Ingreso </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> F. Retiro </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Tipo Func. </p> </th>
    <th style="width:16%;" id="cabecera_tabla_1"> <p> Función </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> H.Cont </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Grupo H. </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Estado </p> </th>
  </tr>

  <?php
  while ($row = pg_fetch_assoc($resultado_tabla)){
    $fecha_i=date("d-m-Y",strtotime($row['fecha_ingreso']));
    
    if ($row['fecha_retiro']==null){
      $fecha_r='';
    }
    else{
      $fecha_r=date("d-m-Y",strtotime($row['fecha_retiro']));  
    }
    ?>
  
  <tr>
    <td> 
    <p> 
      <a href='funcionario_activar.php?id_fun_tab2=<?php echo $row['id_funcionario']?>'> <img src="imagenes/nuevo.png" width="10" height="10" onclick="if(confirmNew() == false){return false;}">
    </p> 
    </td>

    <td> 
    <p> 
      <a href='funcionario_activar.php?id_fun_tab=<?php echo $row['id_funcionario']?>'> <img src="imagenes/editar.png" width="10" height="10" onclick="if(confirmEdit2() == false){return false;}">
    </p> 
    </td>

    <td>
    <p> 
      <a href='contrato_eliminar.php?id_fun_tab=<?php echo $row['id_funcionario']?>'> <img src="imagenes/eliminar.png" width="10" height="10" onclick="if(confirmDel() == false){return false;}">
    </p> 
    </td>

    <td id="tabla_td_center"> <p> <?php echo $row ['rut_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['dv_rut_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_paterno_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_materno_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['nombres_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['codigo_sexo']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $fecha_i ?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $fecha_r ?> </p> </td>
    <td> <p> <?php echo $row ['tipo_funcionario']?> </p> </td>
    <td> <p> <?php echo $row ['detalle_tipo_funcionario']?> </p> </td>
    <td id="tabla_td_center"> <p> <?php echo $row ['horas_contrato']?> </p> </td>
    <td> <p> <?php echo $row ['nombre_grupo_horario']?> </p> </td>
    <td> <p> <?php echo $row ['descripcion_estado_vigencia']?> </p> </td>
  </tr>
  <?php
  }
  ?>
</table> 
</div> <!-- fin tabla responsive -->
<!-- segunda tabla -->
  
</div> <!-- fin panel default -->





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
