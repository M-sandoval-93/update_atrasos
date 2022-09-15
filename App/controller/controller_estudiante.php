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
                // controlar que la variable venga vacia
                $_POST['fecha_ingreso'], $_POST['matricula'], $_POST['rut_e'], $_POST['rut_dv_e'], $_POST['nombres'], 
                $_POST['ap'], $_POST['am'], $_POST['nombre_social'], $_POST['id_curso'], $_POST['fecha_nacimiento'],
                $_POST['sexo'], $_POST['junaeb'], $_POST['rut_at'], $_POST['rud_dv_at'], $_POST['rut_as'], $_POST['rut_dv_as']
            );
            print json_encode($estudiante);
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