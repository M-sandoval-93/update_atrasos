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
            $estudiante = array(
                $_POST['fecha_ingreso'], $_POST['matricula'], $_POST['rut_e'], $_POST['rut_dv_e'], $_POST['nombres'], 
                $_POST['ap'], $_POST['am'], (isset($_POST['nombre_social'])) ? $_POST['nombre_social'] : '', 
                $_POST['id_curso'], $_POST['fecha_nacimiento'], $_POST['sexo'], $_POST['junaeb'], 
                (isset($_POST['rut_at'])) ? $_POST['rut_at'] : '', (isset($_POST['rut_as'])) ? $_POST['rut_as'] : '');
            print $datosEstudiantes->newEstudiante($estudiante);
            break;

        case "editar_estado":
            // $estudiante = array($_POST['id_estudiante'], $_POST['estado']);
            // print $datosEstudiantes->updateEstadoEstudiante($estudiante);
            print json_encode(true); // HABILITAR SECCIÓN PARA MODIFICAR ESTADO
            break;

        case "eliminar_estudiante":
            $id = $_POST['id_estudiante'];
            print $datosEstudiantes->deleteEstudiante($id);
            break;

        case "getEstudianteAtraso":
            print $datosEstudiantes->getEstudianteAtraso($_POST['rut']);
            break;

    }


    // AGREGAR EN LOS CONTROLADORES LAS VALIDACIONES ANTE INYECCIÓN SQL


?>