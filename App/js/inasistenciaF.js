
// const libreria = require('./librerias/spanishDataTable');
import { spanish, LibreriaFunciones, generar_dv } from './librerias/librerias.js';

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

        // Prepara modal
        $('#inaistenciaF_rut_dv').attr('disables', 'disabled');
        $('#inasistenciaF_reemplazo_rut_dv').attr('disables', 'disabled');
        $('#btn_mi_agregar_funcionario').attr('hidden', 'hidden');
        $('.reemplazo').addClass('section_hidden');

        $('#inasistenciaF_rut').keyup(function() {
            LibreriaFunciones.generar_dv('#inasistenciaF_rut', '#inasistenciaF_rut_dv');
            generar_dv('#inasistenciaF_rut', '#inasistenciaF_rut_dv');
        });
        
        



        // Mostrar u ocultar sección de reemplazo
        $('input[name=reemplazo]').click(function() {
            if ($(this).is(':checked') && $(this).attr('id') == 'reemplazo_si') {
                console.log("checled");
                $('.reemplazo').removeClass('section_hidden');
            } else {
                $('.reemplazo').addClass('section_hidden');
            }
        });
    })


    $('#btn_modal_cancelar_inaistenciaF').click(function(e) {
        e.preventDefault();
        modal.removeClass('modal-show');
    })


});