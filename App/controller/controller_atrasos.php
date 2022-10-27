<?php
    // Incluimos el modelo que utilizara el controlador
    include_once '../model/model_atraso.php';

    $type = $_POST['datos']; // Recibimos la acción a realizar por el controlador
    $datosAtraso = new AtrasoEstudiante(); // Creamos el objeto para trabajar con datatable

    switch ($type) {
        case "showAtrasos":
            print $datosAtraso->consultarAtraso();
            break;

        case "getAtrasos":
            print $datosAtraso->cantidadAtrasos($_POST['tipo']);
            break;

        case "getEstudiante":
            print $datosAtraso->getEstudiante($_POST['rut']);
            // print json_encode(true);
            break;
    }

?>