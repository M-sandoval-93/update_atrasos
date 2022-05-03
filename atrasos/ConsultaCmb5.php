<?php

include ("conexion.php");
$conexion=Conectarse();

$rut = $_POST['rut'];

$sql="select 
usuario.id_tipo_usuario,
tipo_usuario.tipo_usuario
from 
funcionario,usuario,tipo_usuario
where usuario.id_tipo_usuario=tipo_usuario.id_tipo_usuario
and funcionario.id_funcionario=usuario.id_funcionario
and funcionario.rut_funcionario = '".$rut."' ";

$result = pg_query($sql)
        or die("Ocurrio un error en la consulta SQL");
pg_close();
 
$combos = array();
if (($fila = pg_fetch_array($result)) != NULL) {
    $combos[$fila['id_tipo_usuario']] = $fila['tipo_usuario'];
}
print_r(json_encode($combos));

// Liberar resultados
pg_free_result($result);

//echo $fila['codigo_sexo'];

pg_close($conexion);

?>