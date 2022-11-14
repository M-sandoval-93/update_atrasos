<?php

require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

// use Mike42\Escpos\PrintConnectors\FilePrintConnector;
// use Mike42\Escpos\Printer;

// $connector = new FilePrintConnector("php://stdout");
// $printer = new Printer($connector);

function imprimir($mensaje) {
    
    $nombre_impresora = "Printer_termal"; 
    
    $connector = new WindowsPrintConnector($nombre_impresora);
    $printer = new Printer($connector);
    
    $printer -> text($mensaje);
    $printer->feed(2);
    $printer -> cut();
    $printer->feed(2);
    $printer -> close();


}


// if (isset($_POST['data'])) {
//     imprimir($_POST['data']);
//     print json_encode(true);
// } 

$nombre = $_POST['nombre'];

if ($nombre == '') {
    print json_encode(false);
} else {
    // imprimir($nombre);
    print json_encode(true);
}





?>


