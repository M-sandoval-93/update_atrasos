<?php

include ("conexion.php");
$conexion=Conectarse();

$rut = $_POST['rut'];

$sql="select 
curso.id_curso,
curso.nombre_curso
from 
alumno,curso
where alumno.id_curso=curso.id_curso
and alumno.rut_alumno = '".$rut."' ";

$result = pg_query($sql)
        or die("Ocurrio un error en la consulta SQL");
pg_close();
 
$combos = array();
if (($fila = pg_fetch_array($result)) != NULL) {
    $combos[$fila['id_curso']] = $fila['nombre_curso'];
}
print_r(json_encode($combos));

// Liberar resultados
pg_free_result($result);

//echo $fila['codigo_sexo'];

pg_close($conexion);

?>