<?php

if ($_GET['ruta'] == 'home' ||
    $_GET['ruta'] == 'funcionarios' ||
    $_GET['ruta'] == 'cursos' ||
    $_GET['ruta'] == 'login' ||
    $_GET['ruta'] == 'test' ||
    $_GET['ruta'] == 'mantenimiento') {
        include_once "views/".$_GET['ruta'].".php";
}

?>