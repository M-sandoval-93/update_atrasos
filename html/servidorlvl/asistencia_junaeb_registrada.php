<?php
include ("conexion.php");
$conexion=Conectarse();

session_start();
error_reporting (0);

//GUARDAR NUEVO Y ACTUALIZAR FUNCIONARIO EN BD
if($_SESSION['Usuario']){ //INICIO CONDICION PRINCIPAL SESION USUARIO

    //INICIO RECEPCION DE VARIBALES DEL FORMULARIO REGISTRO FUNCIONARIOS
    $rut = $_POST['rut'];
    $dv = $_POST['dv'];
    $curso = $_POST['nombre_curso'];  // revisar dato traido




    if($rut== ""){
?>
        <meta charset="utf-8">
        <script language="javascript"> alert("Error en la operación"); window.location="asistencia_junaeb.php"</script>
<?php
    }

    $sql_id_alumno="select * from alumno where rut_alumno='".$rut."' ";
    $sql_res_id_alumno=pg_query($sql_id_alumno);

    if($row=pg_fetch_assoc($sql_res_id_alumno)){
        $id_alumno=$row['id_alumno'];	
        $nombre_alumno = $row['nombres_alumno']." ".$row['apellido_paterno_alumno']." ".$row['apellido_materno_alumno'];
        $rut_alumno = $row['rut_alumno']."-"-$row['dv_rut_alumno'];
    }

    $fecha_actual=date("Y-m-d H:i:s");

    if (pg_num_rows($sql_res_id_alumno)>0){
        $sql_insertar_asistencia = "insert into asistencia_junaeb (
        fecha_hora_actual,
        id_alumno) 
        values (
        '".$fecha_actual."',
        ".$id_alumno.")";

        $sql_res_insertar_atraso = pg_query($sql_insertar_asistencia);

        ?>

        <meta charset="utf-8">
        <script language="javascript"> 


        alert("Se ha registrado la asistencia del estudiante: \n Nombre: <?php echo $nombre_alumno; ?> \n Rut: <?php echo $rut_alumno; ?> \n Curso: <?php echo $curso; ?>"); 
        window.location="asistencia_junaeb.php"</script>
<?php

    } else {
        exit("No se pudo realizar la operación. Vuelva a intentarlo");
    }

    pg_close($conexion);
    //CONDICION IF PRINCIPAL SESION USUARIO
} else {
    //FIN SI PRINCIPAL SESIÓN USUARIO

?>
    <meta charset="utf-8">
    <script language="javascript"> alert("Acceso Restringido. Debe Iniciar Sesión para Acceder."); window.location="index.php"</script>
<?php
}
?>
