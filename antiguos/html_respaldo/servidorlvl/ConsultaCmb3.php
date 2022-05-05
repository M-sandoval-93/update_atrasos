<?php

include ("conexion.php");
$conexion=Conectarse();

$rut = $_POST['rut'];

$sql="select 
funcionario.rut_funcionario,
funcionario.id_sexo_funcionario,
sexo.codigo_sexo,
funcionario.id_tipo_funcionario,
tipo_funcionario.tipo_funcionario,
funcionario.id_detalle_tipo_funcionario,
detalle_tipo_funcionario.detalle_tipo_funcionario,
funcionario.id_grupo_horario_funcionario,
grupo_horario.nombre_grupo_horario
from 
funcionario,sexo,tipo_funcionario,detalle_tipo_funcionario,grupo_horario
where funcionario.id_sexo_funcionario=sexo.id_sexo
and funcionario.id_tipo_funcionario=tipo_funcionario.id_tipo_funcionario
and funcionario.id_detalle_tipo_funcionario=detalle_tipo_funcionario.id_detalle_tipo_funcionario
and funcionario.id_grupo_horario_funcionario=grupo_horario.id_grupo_horario
and funcionario.rut_funcionario = '".$rut."' ";

$result = pg_query($sql)
        or die("Ocurrio un error en la consulta SQL");
pg_close();
 
$combos = array();
if (($fila = pg_fetch_array($result)) != NULL) {
    $combos[$fila['id_detalle_tipo_funcionario']] = $fila['detalle_tipo_funcionario'];
}
print_r(json_encode($combos));

// Liberar resultados
pg_free_result($result);

//echo $fila['codigo_sexo'];

pg_close($conexion);

?>