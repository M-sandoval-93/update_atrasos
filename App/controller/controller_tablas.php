<?php

    // // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    // if (file_exists('./model/model_datosTablas.php')) {
    //     include_once './model/model_datosTablas.php';

    // } else if (file_exists(include_once '../model/model_datosTablas.php')) {
    //     include_once '../model/model_datosTablas.php';
    // }

    // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    include_once '../model/model_datosTablas.php';

    $type = $_POST['datos']; // SE RECIBE EL TIPO DE ACCIÓN
    $datosTabla = new DatosTablas(); // SE CREA EL OBJETO PARA TRABAJAR CON DATATABLE


    switch ($type) {
        case "mostrar_apoderados":
            print $datosTabla->consultaApoderados();
            break;

        case "nuevo_apoderado":

            break;

        case "editar_apoderado":

            break;

        case "editar_estado":
            $id = $_POST['id_apoderado'];
            $estado = $_POST['estado'];
            print $datosTabla->updateEstadoApoderado($id, $estado); 
            break;

        case "eliminar_apoderado":
            $id = $_POST['id_apoderado'];
            // print $datosTabla->deleteApoderado($id);
            print json_encode(false);
            break;

    }



    






?>
