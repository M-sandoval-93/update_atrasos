<?php
include ("conexion.php");
$conexion=Conectarse();
session_start();
error_reporting (0);
if($_SESSION['Usuario']){

header("Pragma: public");
header("Expires: 0");
$asistencia_junaeb="asistecia_junaeb.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$asistencia_junaeb");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Liceo Valentin Letelier</title>
<link rel="shortcut icon" href="favicon.png" type="image/png"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<script type="text/javascript">

</script>


<style>
* {
  box-sizing: border-box;
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

 
</head>

<body>


<div class="container-fluid">




<header>
	
</header> 

<div class="panel panel-default">

<div class="panel-heading"> <h1>Registro Asistencia Junaeb</h1> </div>

<?php
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

?>

<div style="overflow-x:auto;"><!-- inicio tabla responsive -->
<table id="myTable">
  <meta charset="utf-8">
  <tr class="header">
    <th style="width:6%;" id="cabecera_tabla_1"> <p> RUT </p> </th>
    <th style="width:4%;" id="cabecera_tabla_1"> <p> DV </p> </th>
    <th style="width:15%;" id="cabecera_tabla_1"> <p> APE. PAT. </p> </th>
    <th style="width:15%;" id="cabecera_tabla_1"> <p> APE. MAT. </p> </th>
    <th style="width:32%;" id="cabecera_tabla_1"> <p> NOMBRES </p> </th>
    <th style="width:4%;" id="cabecera_tabla_1"> <p> CURSO </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> FECHA </p> </th>
  </tr>

  <?php
  
  while ($row = pg_fetch_assoc($resultado_tabla)){
    $fecha_atraso = date($row['fecha_hora_actual']);
  ?>
  
  <tr>
    <td> <p> <?php echo $row ['rut_alumno']?> </p> </td>
    <td> <p> <?php echo $row ['dv_rut_alumno']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_paterno_alumno']?> </p> </td>
    <td> <p> <?php echo $row ['apellido_materno_alumno']?> </p> </td>
    <td> <p> <?php echo $row ['nombres_alumno']?> </p> </td>
    <td> <p> <?php echo $row ['nombre_curso']?> </p> </td>
    <td> <p> <?php echo $fecha_atraso ?> </p> </td>
  </tr>
  <?php
  }
  ?>
</table> 
</div><!-- fin tabla responsive -->
  
</div>

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