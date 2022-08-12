<?php

    // // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    // if (file_exists('./model/model_datosTablas.php')) {
    //     include_once './model/model_datosTablas.php';

    // } else if (file_exists(include_once '../model/model_datosTablas.php')) {
    //     include_once '../model/model_datosTablas.php';
    // }

    // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    include_once '../model/model_datosTablas.php';

    $type = $_POST['datos'];
    $datosTabla = new DatosTablas();


    switch ($type) {
        case "mostrar_apoderados":
            // $datosTabla = new DatosTablas();
            print $datosTabla->consultaApoderados();
            break;

        case "editar_estado":
            print json_encode("false");
            break;

    }



    






?>
