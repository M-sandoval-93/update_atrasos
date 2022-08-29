<?php

    // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    include_once '../model/model_estudiantes.php';

    $type = $_POST['datos']; // SE RECIBE EL TIPO DE ACCIÓN
    $datosEstudiantes = new Estudiantes(); // SE CREA EL OBJETO PARA TRABAJAR CON DATATABLE

    switch ($type) {
        case "mostrar_estudiantes":
            print $datosEstudiantes->consultaEstudiantes();
            break;

        case "editar_estado":
            // AGREGAR LOS DATOS QUE MANDARÉ AL CONTROLADOR
            print $datosEstudiantes->updateEstadoEstudiante();
    }


?>