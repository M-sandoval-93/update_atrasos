<?php

include ("conexion.php");
$conexion=Conectarse();

$rut = $_POST['rut'];

$sql="select 
estado_vigencia.id_estado_vigencia,
estado_vigencia.descripcion_estado_vigencia
from 
contrato,funcionario,estado_vigencia
where funcionario.id_funcionario=contrato.id_funcionario
and contrato.id_estado_vigencia=estado_vigencia.id_estado_vigencia
and funcionario.rut_funcionario = '".$rut."' 
order by contrato.id_contrato desc limit 1";

$result = pg_query($sql)
        or die("Ocurrio un error en la consulta SQL");
pg_close();
 
$combos = array();
if (($fila = pg_fetch_array($result)) != NULL) {
    $combos[$fila['id_estado_vigencia']] = $fila['descripcion_estado_vigencia'];
}
print_r(json_encode($combos));

// Liberar resultados
pg_free_result($result);

//echo $fila['codigo_sexo'];

pg_close($conexion);

?>