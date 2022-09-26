<?php

if ($_GET['ruta'] == 'home' ||
    $_GET['ruta'] == 'estudiantes' ||
    $_GET['ruta'] == 'atrasos' ||
    $_GET['ruta'] == 'justificaciones' ||
    $_GET['ruta'] == 'horario' ||
    $_GET['ruta'] == 'apoderados' ||
    $_GET['ruta'] == 'cursos' ||
    $_GET['ruta'] == 'junaeb' ||
    $_GET['ruta'] == 'funcionarios' ||
    $_GET['ruta'] == 'inasistencias' ||
    $_GET['ruta'] == 'cambioFunciones' ||
    $_GET['ruta'] == 'usuarios' ||
    $_GET['ruta'] == 'departamentos' ||
    $_GET['ruta'] == 'cargosFunciones' ||

    $_GET['ruta'] == 'profile' ||
    $_GET['ruta'] == 'login' ||
    $_GET['ruta'] == 'mantenimiento') {
        include_once "views/".$_GET['ruta'].".php";
}

?>