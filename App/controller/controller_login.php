<?php

    // SE INCLUYE EL MODELO PARA SER USADO POR EL CONTROLADOR
    include_once '../model/model_session.php';

    // NOTA: AGREGAR PROTECCIÓN ANTE CARACTERES
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // SE INSTANCIA LA CLASE SESSION Y USA EL MÉTODO PARA COMPROBAR EL USUARIO
    $inicio_sesion = new Session();
    $data = $inicio_sesion->checkUsser($usuario, $clave);

    print json_encode($data);

?>