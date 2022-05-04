function cargar_departamento(cod_departamento){
	$("#wrapper").load("php/datos_esp.php?cod_departamento="+cod_departamento);
}
