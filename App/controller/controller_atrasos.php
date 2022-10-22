<?php
    // Incluimos el modelo que utilizara el controlador
    include_once '../model/model_atrasoE.php';

    $type = $_POST['datos']; // Recibimos la acción a realizar por el controlador
    $datosAtrasoE = new AtrasoEstudiante(); // Creamos el objeto para trabajar con datatable

    switch ($type) {
        case "show_atrasos":
            // print $datosInasistenciaF->consultarInasistenciaF();
            // print json_encode("prueba de contenido");
            print $datosAtrasoE->consultarAtrasoE();
            break;

        // case "buscar_funcionario":
        //     $rut = $_POST['rut'];
        //     print $datosInasistenciaF->buscarFuncionario($rut);
        //     break;

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