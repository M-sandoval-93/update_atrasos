<?php

    // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    if (file_exists('./model/model_cursos.php')) {
        include_once './model/model_cursos.php';

    } else if (file_exists(include_once '../model/model_cursos.php')) {
        include_once '../model/model_cursos.php';
    }

 
    // SE OBTIENEN LOS DATOS ENVIADOS POR AJAX
    $grado = (isset($_POST['grado'])) ? $_POST['grado'] : '';
    $letra = (isset($_POST['letra'])) ? $_POST['letra'] : '';

    $cursos = new Curso();

    if ($grado <> "" && $letra == "") {
        $data = $cursos->consultarCurso($grado);

    } else if ($grado <> "" && $letra <> "") {
        $data = $cursos->generarCurso($grado, $letra);
    }

    // SE DEVUELVEN LOS DATOS A LA CONSULTA AJAX
    print json_encode($data);



?>