<?php

    // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    include_once '../model/model_inasistenciaF.php';

    $type = $_POST['datos']; // SE RECIBE EL TIPO DE ACCIÓN
    $datosInasistenciaF = new InasistenciaFuncionario(); // SE CREA EL OBJETO PARA TRABAJAR CON DATATABLE


    switch ($type) {
        case "mostrar_inasistencias":
            print $datosInasistenciaF->consultarInasistenciaF();
            break;

        case "buscar_funcionario":
            print json_encode(false);
            break;

        case "registrar_inasistencia":
            print json_encode(true);
            break;
    }

?>