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
            $inasistencia = array(
                $_POST['tipoI'], $_POST['rutF'], $_POST['fechaI'], $_POST['fechaT'], $_POST['diasI'], 
                (isset($_POST['ord'])) ? $_POST['ord'] : '', (isset($_POST['rutR'])) ? $_POST['rutR'] : '');
            // print json_encode($inasistencia);
            print $datosInasistenciaF->newInaistenciaF($inasistencia);
            break;
    }

?>