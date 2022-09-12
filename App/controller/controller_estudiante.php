<?php

    // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    include_once '../model/model_estudiante.php';

    $type = $_POST['datos']; // SE RECIBE EL TIPO DE ACCIÓN
    $datosEstudiantes = new Estudiante(); // SE CREA EL OBJETO PARA TRABAJAR CON DATATABLE

    switch ($type) {
        case "mostrar_estudiantes":
            print $datosEstudiantes->consultaEstudiantes();
            break;

        case "nuevo_estudiante":
            print json_encode(true);
            break;

        case "editar_estado":
            // $estudiante = array($_POST['id_estudiante'], $_POST['estado']);
            // print $datosEstudiantes->updateEstadoEstudiante($estudiante);
            print json_encode(true); // HABILITAR SECCIÓN PARA MODIFICAR ESTADO
            break;

        case "eliminar_estudiante":
            print json_encode(false); // HABILITAR SECCIÓN PARA ELMIMINAR
            break;

    }


?>