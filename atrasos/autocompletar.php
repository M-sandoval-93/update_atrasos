<?php
header( 'Content-type: text/html; charset=iso-8859-1' );

include ("conexion.php");
$conexion=Conectarse();

$rut = $_POST['rut'];

$sql="select id_funcionario,rut_funcionario from funcionario where rut_funcionario like '".$rut."%' order by rut_funcionario ASC";

$query_rut = pg_query($sql);
//$query_services = pg_query("SELECT id_funcionario,rut_funcionario FROM funcionario WHERE rut_funcionario like '" . $search . "%' AND status=1 ORDER BY rut_funcionario ASC", $conexion);

while ($row_rut = pg_fetch_array($query_rut)) {
    echo '<div class="suggest-element"> 
    <a data="'.$row_rut['rut_funcionario'].'" id="rut'.$row_rut['id_funcionario'].'"> '.($row_rut['rut_funcionario']).' </a> </div>';
}

?>