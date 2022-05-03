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
header("Pragma: public");
header("Expires: 0");
$permisos_registros="permisos_registros.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$permisos_registros");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Liceo Valentin Letelier</title>
<link rel="shortcut icon" href="favicon.png" type="image/png"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript"></script>



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

<div class="container-fluid">


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


<div class="panel panel-default">

<div class="panel-heading"> <h1>Histórico de Permisos General</h1> </div>

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

  <tr class="header">
    <th style="width:4%;" id="cabecera_tabla_1"> <p> Fecha </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> Día S. </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Pat. </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Ape. Mat. </p> </th>
    <th style="width:17%;" id="cabecera_tabla_1"> <p> Nombres </p> </th>
    <th style="width:8%;" id="cabecera_tabla_1"> <p> Tipo Permiso </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> H. Salida </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> H. Llegada </p> </th>
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