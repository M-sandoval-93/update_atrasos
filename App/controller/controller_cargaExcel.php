<?php

    $tipo = $_FILES['excel']['type'];
    $tamaño = $_FILES['excel']['size'];
    $filetmp = $_FILES['excel']['tmp_name'];
    $lines = file($filetmp);

    echo ($lines);

    // $i = 0;

    // foreach ($lines as $line) {
    //     $cantidad_registros = count($lines);
    //     $cantidad_registros_agregados = ($cantidad_registros - 1);

    //     if ($i != 0) {
    //         $datos = explode(";", $line);

    //     }
    // }

    include_once "../model/model_conexion.php";
    $conexion = new Conexion();
    
    $sql_estudiantes = "insert into estudiantes
    (rut_estudiante, dv_rut_estudiante, apellido_paterno_estudiante, apellido_materno_estudiante, nombres_estudiante, 
    fechanacimiento_estudiante, beneficio_junaeb) values (?, ?, ?, ?, ?, ?, ?);";

    $sql_apoderados = "";

    $sql_matricula = "";

    $sentencia_SQL = $conexion->conexion_db->prepare()



?>