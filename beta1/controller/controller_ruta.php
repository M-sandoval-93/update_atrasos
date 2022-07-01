<?php

if ($_GET['ruta'] == 'home' ||
    $_GET['ruta'] == 'login') {
    
        include_once "views/".$_GET['ruta']."php";
}

?>