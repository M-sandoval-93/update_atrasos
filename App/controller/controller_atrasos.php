<?php
    // Incluimos el modelo que utilizara el controlador
    include_once '../model/model_atraso.php';

    $type = $_POST['datos']; // Recibimos la acción a realizar por el controlador
    $datosAtraso = new AtrasoEstudiante(); // Creamos el objeto para trabajar con datatable

    switch ($type) {
        case "showAtrasos":
            print $datosAtraso->consultarAtraso();
            break;

        case "getAtrasos":
            print $datosAtraso->cantidadAtrasos($_POST['tipo']);
            break;

        case "getEstudiante":
            // print json_encode(false);
            print $datosAtraso->getEstudiante($_POST['rut']);
            break;

        // case "registrar_inasistencia":
        //     $inasistencia = array(
        //         $_POST['tipoI'], $_POST['rutF'], $_POST['fechaI'], $_POST['fechaT'], $_POST['diasI'], 
        //         ($_POST['ord'] != '') ? $_POST['ord'] : null, ($_POST['rutR'] != '') ? $_POST['rutR'] : null);
        //     print $datosInasistenciaF->newInaistenciaF($inasistencia);

        //     // AGREGAR FUNCIÓN PARA ENVIAR CORREO SI LA RESPUESTA ES VERDADERA, VER SI SE AGREGA POR JAVASCRIPT
        //     break;

        // case "getInasistencia":
        //     $id_inasistencia = $_POST['id_inasistencia'];
        //     print $datosInasistenciaF->getInasistencia($id_inasistencia);
        //     break;

        // case "getTipoInasistencia":
        //     print $datosInasistenciaF->getTipoInasistencia();
        //     break;

        // case "editar_inasistencia":
        //     // eliminar el rut del funcionario que no es necesario
        //     $inasistencia = array(
        //         $_POST['tipoI'], $_POST['rutF'], $_POST['fechaI'], $_POST['fechaT'], $_POST['diasI'], 
        //         ($_POST['ord'] != '') ? $_POST['ord'] : null, ($_POST['rutR'] != '') ? $_POST['rutR'] : null, $_POST['id_inasistencia']);
        //     print $datosInasistenciaF->updateInasistenciaF($inasistencia);
        //     break;

        // case "eliminar_inasistencia":
        //     $id_inasistencia = $_POST['id_inasistencia'];
        //     print $datosInasistenciaF->deleteInasistenciaF($id_inasistencia);
        //     break;
    }

?>