<?php
    // Incluimos el modelo que utilizara el controlador
    include_once '../model/model_atraso.php';
    include_once "../model/model_session.php";

    $session = new Session();
    $id_usuario = $session->getId();


    $type = $_POST['datos']; // Recibimos la acción a realizar por el controlador
    $datosAtraso = new AtrasoEstudiante(); // Creamos el objeto para trabajar con datatable

    switch ($type) {
        case "showAtrasos":
            print $datosAtraso->consultarAtraso();
            break;

        case "showAtrasosSinJustificar";
            print $datosAtraso->atrasosSinJustificar($_POST['rut']);
            break;

        case "getAtrasos":
            print $datosAtraso->cantidadAtrasos($_POST['tipo']);
            break;

        case "getEstudiante":
            if (is_numeric($_POST['rut'])) {
                print $datosAtraso->getEstudiante($_POST['rut']);
            } else {
                print json_encode(false);
            }
            break;

        case "setAtraso":
            print $datosAtraso->setAtraso($_POST['rut']);
            break;

        case "eliminarAtraso":
            print $datosAtraso->eliminarAtraso($_POST['id_atraso']);
            break;

        case "setJustificar":
            print $datosAtraso->setJustificar($_POST['id_apoderado'], $_POST['atrasos'], $id_usuario);
            break;

        case "getDocument":
            print $datosAtraso->getExcelAtraso($_POST['ext']);
            break;


    }

?>