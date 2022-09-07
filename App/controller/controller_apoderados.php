<?php

    // // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    // if (file_exists('./model/model_datosTablas.php')) {
    //     include_once './model/model_datosTablas.php';

    // } else if (file_exists(include_once '../model/model_datosTablas.php')) {
    //     include_once '../model/model_datosTablas.php';
    // }

    // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    include_once '../model/model_apoderados.php';

    $type = $_POST['datos']; // SE RECIBE EL TIPO DE ACCIÓN
    $datosApoderados = new Apoderados(); // SE CREA EL OBJETO PARA TRABAJAR CON DATATABLE


    switch ($type) {
        case "mostrar_apoderados":
            print $datosApoderados->consultaApoderados();
            break;

        case "buscar_apoderado":
            $rut = $_POST['rut'];
            print $datosApoderados->consultaApoderado($rut);
            // print json_encode(false);
            break;

        case "nuevo_apoderado":
            // print json_encode(true);
            $apoderado = array($_POST['rut'], $_POST['dv_rut'], $_POST['nombres'], $_POST['a_paterno'], $_POST['a_materno'], $_POST['fono']);
            print $datosApoderados->newApoderado($apoderado);
            break;

        case "editar_apoderado":
            $apoderado = array($_POST['rut'], $_POST['nombres'], $_POST['a_paterno'], $_POST['a_materno'], $_POST['fono']);
            print $datosApoderados->updateApoderado($apoderado);
            break;

        case "editar_estado":
            $id = $_POST['id_apoderado'];
            $estado = $_POST['estado'];
            print $datosApoderados->updateEstadoApoderado($id, $estado); 
            break;

        case "eliminar_apoderado":
            $id = $_POST['id_apoderado'];
            print $datosApoderados->deleteApoderado($id);
            break;

    }



    






?>
