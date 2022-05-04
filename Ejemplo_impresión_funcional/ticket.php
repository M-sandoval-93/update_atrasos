<?php

require __DIR__ . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

// Designación de la fecha
date_default_timezone_set("America/Santiago");



// Integración con AJAX
$type = $_POST['valor'];
$resultado;

if ($type == true) {
	$resultado = 1;
	impresion();
} else {
	$resultado = null;
}

print json_encode($resultado);


function impresion() {
	// Variable con el nombre de la impresora térmica (La impresora debe estar compratida desde panel de control)
	$nombre_impresora = "Printer Epson";


	$connector = new WindowsPrintConnector($nombre_impresora);
	$printer = new Printer($connector);
	#Mando un numero de respuesta para saber que se conecto correctamente.
	//echo 1; // Revisar respuesta devuelta
    echo 1;
	/*
		Vamos a imprimir un logotipo
		opcional. Recuerda que esto
		no funcionará en todas las
		impresoras

		Pequeña nota: Es recomendable que la imagen no sea
		transparente (aunque sea png hay que quitar el canal alfa)
		y que tenga una resolución baja. En mi caso
		la imagen que uso es de 250 x 250
	*/

	# Vamos a alinear al centro lo próximo que imprimamos
	$printer->setJustification(Printer::JUSTIFY_CENTER);

	// Cargar e imprimir el logo
	try{
		$logo = EscposImage::load("liceo_1.png", false);
		$printer->bitImage($logo);
	}catch(Exception $e){
		// Si existe un error, no se imprime ningúna imagen.......
	}


	// Impresión del encabezado
	$printer->text("\n"."Liceo Bicentenario" . "\n");
	$printer->text("Valentín Letelier Madariaga" . "\n");
	//$printer->text("Direccion: Lautaro #288" . "\n");
	$printer->text("\n"."PASE DE ATRASO" . "\n");
	$printer->text("-------------------------------------------" . "\n\n");


	// Impresión del contenido
	$printer->setJustification(Printer::JUSTIFY_LEFT);
	$printer->text("     NOMBRE: Alejandra Troncoso". "\n");
	$printer->text("\n");
	$printer->text("     CURSO:  4° D  /  HORA INGRESO: ". date("H:i:s"). "\n");
	$printer->text("\n");
	$printer->text("     FECHA INGRESO: ". date("d-m-Y"). "\n");
	$printer->text("\n");


	// Impresión del pie de página
	$printer->setJustification(Printer::JUSTIFY_CENTER);
	$printer->text("-------------------------------------------" . "\n");
	$printer->text("Inspectoría General\n");


	// Alimentación del papel
	$printer->feed(2);

	// Corte de la hoja, si existe la opción en la impresora
	$printer->cut();

	// Permite enviar un pulso, para el caso de uso de gabetas 
	//$printer->pulse();

	// Se cierra la conexión para generar la impresión
	$printer->close();
}


?>