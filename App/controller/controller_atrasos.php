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
            break;

        case "setAtraso":
            print $datosAtraso->setAtraso($_POST['rut']);
            break;

        case "eliminarAtraso":
            print $datosAtraso->eliminarAtraso($_POST['id_atraso']);
            // print json_encode(false);
            break;

    }

?>