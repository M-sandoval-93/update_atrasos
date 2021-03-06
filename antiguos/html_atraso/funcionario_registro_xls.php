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
$funcionarios_activos="funcionarios_activos.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$funcionarios_activos");
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

<!--ESTILOS TABLA Y BUSCADORES TABLA -->
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
<!--ESTILOS TABLA Y BUSCADORES TABLA -->

</head>

<div class="panel panel-default">

<div class="panel-heading"> <h1>Nómina de Funcionarios Activos</h1> </div>

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
?>

<div style="overflow-x:auto;"> <!-- inicio tabla responsive -->

<table id="myTable">

  <tr class="header">
    <th style="width:5%;" id="cabecera_tabla_1"> <p> Rut </p> </th>
    <th style="width:2%;" id="cabecera_tabla_1"> <p> DV </p> </th>
    <th style="width:8%;" id="cabecera_tabla_1"> <p> Ape. Pat. </p> </th>
    <th style="width:8%;" id="cabecera_tabla_1"> <p> Ape. Mat. </p> </th>
    <th style="width:16%;" id="cabecera_tabla_1"> <p> Nombres </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> Sexo </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> F. Nac. </p> </th>
    <th style="width:5%;" id="cabecera_tabla_1"> <p> Fono </p> </th>
    <th style="width:6%;" id="cabecera_tabla_1"> <p> Tipo Func. </p> </th>
    <th style="width:12%;" id="cabecera_tabla_1"> <p> Función </p> </th>
    <th style="width:3%;" id="cabecera_tabla_1"> <p> H.Cont </p> </th>
    <th style="width:10%;" id="cabecera_tabla_1"> <p> Grupo H. </p> </th>
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