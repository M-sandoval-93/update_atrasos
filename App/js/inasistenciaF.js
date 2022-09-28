
// const libreria = require('./librerias/spanishDataTable');
import { spanish, LibreriaFunciones } from './librerias/librerias.js';

$(document).ready(function() {
    // ASIGNAR VARIABLES
    let modal = $('#modal_form_inasistenciaF');
    let datos = 'mostrar_inasistencias';
    let registrar;
    let id_inasistencia;

    // LLENAR DATATABLE CON INFORMACIÓN
    let tabla_inasistencia = $('#inasistencias_funcionarios').DataTable({
        ajax: {
            url: "./controller/controller_inasistenciaF.php",
            method: "post",
            dateType: "json",
            data: {datos: datos}
        },
        columns: [
            {
                data: "id_inasistencia",
                visible: false
            },
            {data: "funcionario"},
            {data: "tipo_inasistencia"},
            {data: "fecha_inicio"},
            {data: "fecha_termino"},
            {data: "dias_inasistencia"},
            {data: null,
                bSortable: false,
                defaultContent: // BOTONES
                                `<button class="btn btn-s btn-data" id="" type="button"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-s btn-delete" id="" type="button"><i class="fas fa-trash-alt"></i></button>`
            }
        ],
        order: [[3, 'asc']],
        language: spanish
    });

    $('#btn_nueva_inasistencia').click(function(e) {
        e.preventDefault();
        $('#form_inasistenciaF').trigger('reset');
        $('#titulo-modal_inasistenciaF').text('Registrar nueva inasistencia');

        modal.addClass('modal-show');

        console.log("prueba");
    })


    $('#btn_modal_cancelar_inaistenciaF').click(function(e) {
        e.preventDefault();
        modal.removeClass('modal-show');
    })


});