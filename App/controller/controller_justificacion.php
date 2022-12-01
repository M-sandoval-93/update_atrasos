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
        print $datosJustificacion->showJustificacion();
        break;

    case "getInfoAdicional":
        print $datosJustificacion->infoAdicional($_POST['id_justificacion']);
        break;

    case "getCantidadJustificacion":
        print $datosJustificacion->getJustificaciones();
        break;

    case "setJustificacion":
        $justificacion = array(
            $_POST['rut'], $_POST['fecha_inicio'], $_POST['fecha_termino'], $_POST['apoderado'], $_POST['motivo'],
            $_POST['documento'], $_POST['pruebas'], (isset($_POST['asignatura'])) ? $_POST['asignatura'] : "false"
        );

        print $datosJustificacion->setJustificacion($justificacion);
        break;

    // case "getEstudiante":
    //     print $datosJustificacion->getEstudiante($_POST['rut']);
    //     break;

}



?>