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
header("Pragma: public");
header("Expires: 0");
$usuarios_registros="usuarios_registros.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$usuarios_registros");
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

<body onload="document.getElementById('rut').focus();">

<div class="panel panel-default">
 
<div class="panel-heading"> <h1>Registro de Usuarios - Vigentes / No Vigentes </h1> </div>

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

?>


<div style="overflow-x:auto;"><!-- inicio tabla responsive -->
<table id="myTable">

  <tr class="header">
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