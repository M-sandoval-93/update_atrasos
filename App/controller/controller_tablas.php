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

    if ($type == "mostrar_apoderados") {
         $consulta = new DatosTablas();
        //  $data = $consulta->consultaApoderados();
        //  print $data;
        print $consulta->consultaApoderados();
     }

    // $prueba = new DatosTablas();
    // $data = $prueba->consultaApoderados();

    // print $data;


    






?>