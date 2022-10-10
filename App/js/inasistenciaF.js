
import { spanish, LibreriaFunciones, generar_dv } from './librerias/librerias.js';

// ==================== FUNCIONES INTERNAS ===============================//

function camposVacios() {
    let contador = 0;
    let radio = false;

    if ($('#tipo_inasistencia').val() == 'Seleccionar tipo') {
        contador = contador + 1;
    }

    $('#modal_form_inasistenciaF input').each(function() {
        if ($(this).val() == '') {
            contador = contador + 1
        }
    });

    $('input[name=reemplazo]').each(function() {
        if ($(this).is(':checked')) {
            radio = true
        }        
    });

    if (radio == false) {
        contador = contador + 1;
    }

    if ($('input[id=reemplazo_no]').is(':checked')) {
        contador = contador - 3;
    }

    return contador;
}

function format(d) {
    return (
        '<table class="expand_columna" cellpadding="4" cellspacing="2" border="0"">' +
            '<tr>' +
                '<td>FUNCIONARIO REEMPLAZANTE: </td>' +
                '<td>' + d.reemplazante + '</td>' +
            '</tr>' +
        '</table>'
    );
}

function prepararModalInasistencia(modal, titulo) {
    $('#form_inasistenciaF').trigger('reset');
    $('#titulo-modal_inasistenciaF').text(titulo);
    $('#inasistenciaF_rut_dv').attr('disabled', 'disabled');
    $('#inasistenciaF_reemplazo_rut_dv').attr('disabled', 'disabled');
    $('#btn_agregar_funcionario_ausente').attr('hidden', 'hidden');
    $('#btn_agregar_funcionario_reemplazo').attr('hidden', 'hidden');
    $('.section .check').attr('hidden', 'hidden');
    $('.reemplazo').addClass('section_hidden');

    modal.addClass('modal-show');
}


// ==================== FUNCIONES INTERNAS ===============================//

// MODULO CENTRAL =================== >>>>>>>>>
$(document).ready(function() {
    // ASIGNAR VARIABLES
    let modal = $('#modal_form_inasistenciaF');
    let modal_funcionario =$('#modal_form_funcionario');
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
            { // BTN PARA EXPANDIR Y CONTRAER TABLA
                orderable: false,
                data: "reemplazante",
                defaultContent: '',
                mRender: function(data) {
                    let btn;
                    if (data != null) {
                        btn = '<button class="btn-expand" id="mostrar_reemplazante"><i class="fas fa-plus-circle"></i></button>';
                        return btn;
                    }
                }
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
        order: [[4, 'asc']],
        language: spanish
    });


    // BTN PARA EXPANDIR Y CONTRAER SECCIÓN DE REEMPLAZANTE ====================== LISTO
    $('#inasistencias_funcionarios tbody').on('click', 'td button#mostrar_reemplazante', function () {
        let tr = $(this).closest('tr');
        let row = tabla_inasistencia.row(tr);
 
        if (row.child.isShown()) {
            // ACCIÓN PARA CUANDO SE CONTRAE LA TABLA
            row.child.hide();
            tr.removeClass('shown');
            $(this).addClass('btn-expand');
            $(this).removeClass('btn-retract');

        } else {
            // ACCIÓN PARA CUANDO SE EXPANDE LA TABLA
            row.child(format(row.data())).show();
            tr.addClass('shown');
            $(this).removeClass('btn-expand');
            $(this).addClass('btn-retract');
            $('.expand_columna').parents('td').css('background-color', 'var(--opacidad)');
        }
    });


    // BTN LANZAR MODAL DE NUEVA INSISTENCIA ========================== LISTO
    $('#btn_nueva_inasistencia').click(function(e) {
        e.preventDefault();
        $('#form_inasistenciaF').trigger('reset');
        $('#titulo-modal_inasistenciaF').text('Registrar nueva inasistencia');

        prepararModalInasistencia(modal);

        // CALCULAR RUT Y BUSCAR FUNCIONARIO
        $('#inasistenciaF_rut').keyup(function() {
            generar_dv('#inasistenciaF_rut', '#inasistenciaF_rut_dv');
            LibreriaFunciones.buscar_info_funcionario($(this).val(), $('#nombre_inasistenciaF'), $('#btn_agregar_funcionario_ausente'));
        });
        $('#inasistenciaF_reemplazo_rut').keyup(function() {
            generar_dv('#inasistenciaF_reemplazo_rut', '#inasistenciaF_reemplazo_rut_dv');
            LibreriaFunciones.buscar_info_funcionario($(this).val(), $('#inasistenciaF_nombre_reemplazo'), $('#btn_agregar_funcionario_reemplazo'));
        });


        // CALCULAR DÍAS DE INASISTENCIA
        $('#inasistenciaF_fecha_inicio').change(function() {
            $('#inasistenciaF_dias').val(LibreriaFunciones.restarFechas($('#inasistenciaF_fecha_inicio'), $('#inasistenciaF_fecha_termino')));
        });

        $('#inasistenciaF_fecha_termino').change(function() {
            $('#inasistenciaF_dias').val(LibreriaFunciones.restarFechas($('#inasistenciaF_fecha_inicio'), $('#inasistenciaF_fecha_termino')));
        });

        $('#modal_form_inasistenciaF').change(function() {
            if (($('#tipo_inasistencia').val() != "1" && $('#tipo_inasistencia').val() != "Seleccionar tipo") && ($('#inasistenciaF_dias').val() == "1" || $('#inasistenciaF_dias').val() == "0.5")) {
                $('.section .check').removeAttr('hidden', 'hidden');
                // ASIGNAR MEDIA DÍA SI ESTA SELECCIONADO EL CHECK
                if ($('#check_medio_dia').prop('checked')) {
                    $('#inasistenciaF_dias').val(0.5);
                } else {
                    // $('#inasistenciaF_dias').val(LibreriaFunciones.restarFechas($('#inasistenciaF_fecha_inicio'), $('#inasistenciaF_fecha_termino')));
                    $('#inasistenciaF_dias').val(1);
                }
                
            } else {
                $('.section .check').attr('hidden', 'hidden');
            }
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

    
    // BTN REGISTRAR DE MODAL ========================================= TRABAJANDO
    $('#btn_modal_registrar_insistenciaF').click(function(e) {
        e.preventDefault();

        // VALIDAR CAMPOS VACIOS
        if (camposVacios() >= 1) { 
            LibreriaFunciones.alertPopUp('warning', 'Hay campos vacios !!');
            return false;
        }

        // VALIDAR QUE LOS FUNCIONARIOS ESTEN INGRESADOS
        if ($('#nombre_inasistenciaF').text() == 'Apoderado sin registros !!' || $('#inasistenciaF_nombre_reemplazo').text() == 'Apoderado sin registros !!') {
            LibreriaFunciones.alertPopUp('warning', 'El rut no se encuentra registrado !!');
            return false;
        }

        // OBTENER DATOS PARA REGISTRAR
        let tipoI = $('#tipo_inasistencia').val();
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
                        LibreriaFunciones.alertPopUp('error', 'Error al registrar !!');
                    
                    } else {
                        LibreriaFunciones.alertPopUp('success', 'Inasistencia registrada !!');
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


    // BTN LANZAR MODAL PARA EDITAR INAISITENCIA ====================== TRABAJANDO ....!!!!!
    $('#inasistencias_funcionarios tbody').on('click', '#btn_modificar_inasistencia', function() {

        $('#titulo-modal_inasistenciaF').text('Editar inasistencia');
        let data = tabla_inasistencia.row($(this).parents()).data();

        prepararModalInasistencia(modal, 'Editar inasistencia');
        // console.log(data.id_inasistencia);

        datos = "getInasistencia"; 
        $.ajax({
            url: './controller/controller_inasistenciaF.php',
            method: 'post',
            dataType: 'json',
            data: {datos: datos, id_inasistencia: data.id_inasistencia},
            success: function (info) {
                console.log(info);
                // for (var i=0; i< info; i++) {
                //     console.log(info['r_funcionario']);
                // }
                console.log(info['id_inasistencia']);
                

            }

        });



        registrar = 'editar_inasistencia';
    });


    // BTN LANZAR MODAL PARA ELIMINAR INAISITENCIA ==================== LISTO
    $('#inasistencias_funcionarios tbody').on('click', '#btn_eliminar_inasistencia', function() {
        console.log("eliminar inasistencia");

        let data = tabla_inasistencia.row($(this).parents()).data();
        id_inasistencia = data.id_inasistencia;
        Swal.fire({
            icon: 'question',
            title: 'Se eliminará el registro de \n "' + data.funcionario + '"',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#2691d9',
            cancelButtonColor: '#adadad'
        }).then(resultado => {
            if (resultado.isConfirmed) {
                datos = "eliminar_inasistencia";

                $.ajax({
                    url: './controller/controller_inasistenciaF.php',
                    type: 'post',
                    dataType: 'json',
                    data: {datos: datos, id_inasistencia: id_inasistencia},
                    success: function(data) {
                        if (data == false) {
                            LibreriaFunciones.alertPopUp('error', 'No se pudo eliminar el registro !!');
                        } else {
                            LibreriaFunciones.alertPopUp('success', 'Registro eliminado !!');
                            tabla_inasistencia.ajax.reload(null, false);
                        }
                    }
                });
            }
        })
    });


    // BTN LANZAR MODAL DE FUNCIONARIO ================================ TRABAJAR
    $('#btn_agregar_funcionario_ausente').click(function(e) {
        e.preventDefault();
        modal.removeClass('modal-show');
        modal_funcionario.addClass('modal-show');
        // AGREGAR VALIDACIONES NECESARIAS

    });


    // BTN LANZAR MODAL DE FUNCIONARIO REEMPLAZANTE =================== TRABAJAR
    $('#btn_agregar_funcionario_reemplazo').click(function(e) {
        e.preventDefault();
        modal.removeClass('modal-show');
        modal_funcionario.addClass('modal-show');
        // BLOQUEAR EL TIPO DE FORMULARIO EN DOCENTE REEMPLAZANTE
    }); 

    // BTN PARA OCULTAR MODAL FUNCIONARIO ============================= TRABAJAR


    


});
