
// const libreria = require('./librerias/spanishDataTable');
import { spanish, LibreriaFunciones, generar_dv } from './librerias/librerias.js';

// ==================== FUNCIONES INTERNAS ===============================//

function camposVacios() {
    let contador = 0;
    let radio1 = false;
    let radio2 = false;

    $('input[name=tipo_inasistencia]').each(function() {
        if ($(this).is(':checked')) {
            radio1 = true
        }        
    });

    $('input[name=reemplazo]').each(function() {
        if ($(this).is(':checked')) {
            radio2 = true
        }        
    });

    $('#modal_form_inasistenciaF input').each(function() {
        if ($(this).val() == '') {
            contador = contador + 1
        }
    });

    if (radio1 == false) {
        contador = contador + 1;
    }

    if (radio2 == false) {
        contador = contador + 1;
    }

    if ($('input[id=reemplazo_no]').is(':checked')) {
        contador = contador - 3;
    }

    return contador;
}




// ==================== FUNCIONES INTERNAS ===============================//

// MODULO CENTRAL =================== >>>>>>>>>
$(document).ready(function() {
    // ASIGNAR VARIABLES
    let modal = $('#modal_form_inasistenciaF');
    let datos = 'mostrar_inasistencias';
    let registrar;
    let id_inasistencia;

    // LLENAR DATATABLE CON INFORMACIÓN =============================== LISTO
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
                                `<button class="btn btn-s btn-data" id="btn_modificar_inasistencia" type="button"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-s btn-delete" id="btn_eliminar_inasistencia" type="button"><i class="fas fa-trash-alt"></i></button>`
            }
        ],
        order: [[3, 'asc']],
        language: spanish
    });


    // BTN LANZAR MODAL DE NUEVA INSISTENCIA ========================== LISTO
    $('#btn_nueva_inasistencia').click(function(e) {
        e.preventDefault();
        $('#form_inasistenciaF').trigger('reset');
        $('#titulo-modal_inasistenciaF').text('Registrar nueva inasistencia');

        modal.addClass('modal-show');

        // RPEPARAR MODAL
        $('#inasistenciaF_rut_dv').attr('disabled', 'disabled');
        $('#inasistenciaF_reemplazo_rut_dv').attr('disabled', 'disabled');
        $('#btn_mi_agregar_funcionario').attr('hidden', 'hidden');
        $('.reemplazo').addClass('section_hidden');

        // CALCULAR RUT Y BUSCAR FUNCIONARIO
        $('#inasistenciaF_rut').keyup(function() {
            generar_dv('#inasistenciaF_rut', '#inasistenciaF_rut_dv');
            LibreriaFunciones.buscar_info_funcionario($(this).val(), $('#nombre_inasistenciaF'));
        });
        $('#inasistenciaF_reemplazo_rut').keyup(function() {
            generar_dv('#inasistenciaF_reemplazo_rut', '#inasistenciaF_reemplazo_rut_dv');
            LibreriaFunciones.buscar_info_funcionario($(this).val(), $('#inasistenciaF_nombre_reemplazo'), $('#btn_mi_agregar_funcionario'));
        });

        // CALCULAR DÍAS DE INASISTENCIA
        $('#inasistenciaF_fecha_inicio').change(function() {
            $('#inasistenciaF_dias').val(LibreriaFunciones.restarFechas($('#inasistenciaF_fecha_inicio'), $('#inasistenciaF_fecha_termino')));
        });
        $('#inasistenciaF_fecha_termino').change(function() {
            $('#inasistenciaF_dias').val(LibreriaFunciones.restarFechas($('#inasistenciaF_fecha_inicio'), $('#inasistenciaF_fecha_termino')));
        });

        // MOSTRAR U OCULTAR SECCIÓN DE REEMPLAZO
        $('input[name=reemplazo]').click(function() {
            if ($(this).is(':checked') && $(this).attr('id') == 'reemplazo_si') {
                $('.reemplazo').removeClass('section_hidden');
            } else {
                $('.reemplazo').addClass('section_hidden');
            }
        });

        registrar = "ingresar_inasistenciaF";
    });

    // BTN REGISTRAR DE MODAL ========================================= TRABAJAR
    $('#btn_modal_registrar_insistenciaF').click(function(e) {
        e.preventDefault();

        // VALIDAR CAMPOS VACIOS
        if (camposVacios() >= 1) {
            alertPopUp('warning', 'Hay campos vacios !!');
            return false;
        }

        // OBTENER DATOS PARA REGISTRAR
        let tipoI = $('input[name=tipo_inasistencia]:checked').val();
        let rutF = $('#inasistenciaF_rut').val();
        let fechaI = $('#inasistenciaF_fecha_inicio').val();
        let fechaT = $('#inasistenciaF_fecha_termino').val();
        let diasI = $('#inasistenciaF_dias').val();
        let ord = $('#inasistenciaF_ordinario').val();
        let rutR = $('#inasistenciaF_reemplazo_rut').val();


        if (registrar == 'ingresar_inasistenciaF') {
            datos = "registrar_inasistencia";

            $.ajax({
                url: "./controller/controller_inasistenciaF.php",
                method: "post",
                dataType: "json",
                data: {datos: datos, tipoI: tipoI, rutF: rutF, fechaI: fechaI, fechaT: fechaT, diasI: diasI, ord: ord, rutR: rutR},
                success: function(data) {
                    if (data === false) {
                        alertPopUp('error', 'Error al registrar !!');
                    
                    } else {
                        alertPopUp('success', 'Inasistencia registrada !!');
                        modal.removeClass('modal-show');
                        tabla_inasistencia.ajax.reload(null, false);
                    }
                }
            });

        } else if(registrar == 'editar_inasistencia') {
            console.log("modificar inasistencia");
        }
    });


    // BTN OCULTAR MODAL ============================================== LISTO
    $('#btn_modal_cancelar_inaistenciaF').click(function(e) {
        e.preventDefault();
        modal.removeClass('modal-show');
    })


    // BTN LANZAR MODAL PARA EDITAR INAISITENCIA ====================== TRABAJAR
    $('#inasistencias_funcionarios tbody').on('click', '#btn_modificar_inasistencia', function() {
        console.log("editar inasistencia");

        registrar = 'editar_inasistencia';
    });


    // BTN LANZAR MODAL PARA ELIMINAR INAISITENCIA ==================== TRABAJAR
    $('#inasistencias_funcionarios tbody').on('click', '#btn_eliminar_inasistencia', function() {
        console.log("eliminar inasistencia");
    });


    


});