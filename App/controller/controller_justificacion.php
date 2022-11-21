<?php

// Incluimos el modelo que utilizara el controlador
include_once '../model/model_justificacion.php';
include_once "../model/model_session.php";

$session = new Session();
$id_usuario = $session->getId();

$type = $_POST['datos'];
$datosJustificacion = new JustificacionEstudiante();

switch ($type) {
    case "showJustificaciones":
        // print json_encode(true);
        print $datosJustificacion->showJustificacion();
        break;

    case "getInfoAdicional":
        print $datosJustificacion->infoAdicional($_POST['id_justificacion']);
        break;

    case "getJustificaciones":
        print $datosJustificacion->getJustificaciones();
        break;
}



?>