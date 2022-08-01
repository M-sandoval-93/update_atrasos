<?php

if ($_GET['ruta'] == 'home' ||
    $_GET['ruta'] == 'prueba' ||
    $_GET['ruta'] == 'cursos' ||
    $_GET['ruta'] == 'login' ||
    $_GET['ruta'] == 'test' ||
    $_GET['ruta'] == 'funcionarios') {
        include_once "views/".$_GET['ruta'].".php";
}

?>