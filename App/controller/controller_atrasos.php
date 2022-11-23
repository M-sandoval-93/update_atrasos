<?php
    // Incluimos el modelo que utilizara el controlador
    include_once '../model/model_atraso.php';
    include_once "../model/model_session.php";

    $session = new Session();
    $id_usuario = $session->getId();


    $type = $_POST['datos']; // Recibimos la acción a realizar por el controlador
    $datosAtraso = new AtrasoEstudiante(); // Creamos el objeto para trabajar con datatable

    switch ($type) {
        case "getAtraso": // Terminado...
            print $datosAtraso->getAtraso();
            break;

        case "getAtrasosSinJustificar"; // Terminado...
            print $datosAtraso->getAtrasoSinJustificar($_POST['rut']);
            break;

        case "getCantidadAtraso": // Terminado...
            print $datosAtraso->getCantidadAtraso($_POST['tipo']);
            break;

        case "setAtraso":
            print $datosAtraso->setAtraso($_POST['rut']);
            break;

        case "deleteAtraso": // Terminado...
            print $datosAtraso->deleteAtraso($_POST['id_atraso']);
            break;

        case "setJustificar": // Terminado...
            print $datosAtraso->setJustificar($_POST['id_apoderado'], $_POST['atrasos'], $id_usuario);
            break;

        case "getDocument":
            print $datosAtraso->getExcelAtraso($_POST['ext']);
            break;


    }

?>