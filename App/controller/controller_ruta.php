<?php

if ($_GET['ruta'] == 'home' ||
    $_GET['ruta'] == 'home2' || // Eliminar luego de usar
    $_GET['ruta'] == 'login' ||
    $_GET['ruta'] == 'prueba') {
        include_once "views/".$_GET['ruta'].".php";
}

?>