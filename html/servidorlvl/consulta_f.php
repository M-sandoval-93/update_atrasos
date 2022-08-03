<?php

include ("conexion.php");
$conexion=Conectarse();

$rut = $_POST['rut'];

$sql="select 
funcionario.rut_funcionario,
funcionario.dv_rut_funcionario,
funcionario.apellido_paterno_funcionario,
funcionario.apellido_materno_funcionario,
funcionario.nombres_funcionario,
contrato.fecha_ingreso,
contrato.fecha_retiro,
contrato.horas_contrato,
contrato.observaciones_contrato
from contrato,funcionario
where contrato.id_funcionario=funcionario.id_funcionario
and funcionario.rut_funcionario = '".$rut."' 
order by contrato.id_contrato desc limit 1";

$resultado=pg_query($sql);



if($row = pg_fetch_array($resultado))
{
	if($row['fecha_retiro']==null){
		$fecha_r='';  
	}
	else{
		$fecha_r=date("d-m-Y",strtotime($row['fecha_retiro']));  
	}

  echo json_encode(array("dv"=>$row['dv_rut_funcionario'], "nombre_completo"=>$row['apellido_paterno_funcionario']." ".$row['apellido_materno_funcionario']." ".$row['nombres_funcionario'], "fecha_ingreso"=>date("d-m-Y",strtotime($row['fecha_ingreso'])), "fecha_retiro"=>$fecha_r, "horas_contrato"=>$row['horas_contrato'], "observaciones_contrato"=>$row['observaciones_contrato']));
}

else
{
  echo json_encode(array("fecha_ingreso"=>"", "fecha_retiro"=>"", "horas_contrato"=>"", "observaciones_contrato"=>""));
}




pg_close($conexion);

?>