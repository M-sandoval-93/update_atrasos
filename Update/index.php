<?php

// SETEAR LA ZONA HORARIA
date_default_timezone_set('America/Santiago');

// INCLUDE DE CONTROLADOR DE SESIÓN


// CONTROLADOR INCIAL DE RUTAS
if (isset($_SESSION['usser'])) {
    if (isset($_GET['ruta'])) {
        include_once "controller/views.php";
    } else {
        header("loaction: home");
    }
} else {
    include_once "views/login.php";
}


?>