import {LibreriaFunciones, generar_dv, spanish } from './librerias/librerias.js';

// ==================== FUNCIONES INTERNAS ===============================//
function getInfoSecundaria(data) { // Terminado...
    let documento = 'NO';
    let pruebas = 'SIN PRUEBAS PENDIENTES';

    if (data.presenta_documento == true) {
        documento = 'SI';
    }

    if (data.prueba_pendiente == true) {
        pruebas = data.asignatura;
    }

    return(
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
                '<td>Fecha justificación:</td>' +
                '<td>' + data.fecha_justificacion + '</td>' +
            '</tr>' +
        
            '<tr>' +
                '<td>Apoderado:</td>' +
                '<td>' + data.apoderado + '</td>' +
            '</tr>' +

            '<tr>' +
                '<td>Motivo falta:</td>' +
                '<td>' + data.motivo_falta + '</td>' +
            '</tr>' +

            '<tr>' +
                '<td>Documento presentado:</td>' +
                '<td>' + documento + '</td>' +
            '</tr>' +

            '<tr>' +
                '<td>Pruebas por asignatura:</td>' +
                '<td>' + pruebas + '</td>' +
            '</tr>' +
        '</table>'
    );
}

function getCantidadJustificacion(id_campo) { // Terminado...
    let datos = 'getCantidadJustificacion';
    let valor = 0;

    $.ajax({
        url: "./controller/controller_justificacion.php",
        type: "POST",
        dataType: "json",
        data: {datos: datos},
        success: function(data) {
            if (data != false) {
                valor = data;
            }
            $(id_campo).text(valor);
        }
    }).fail(() => {
        $(id_campo).text('Error !!');
    });
}

function expandInfoSecundaria(tabla) { // Terminado...
    $('#justificacion_estudiante tbody').on('click', 'td.dt-control', function() {
        let dataRow = tabla.row($(this).parents()).data();
        let tr = $(this).closest('tr');
        let row = tabla.row(tr);
        let datos = 'getInfoAdicional';

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('show');
        } else {

            $.ajax({
                url: "./controller/controller_justificacion.php",
                type: "POST",
                dataType: "json",
                data: {datos: datos, id_justificacion: dataRow.id_justificacion},
                success: function(data) {
                    row.child(getInfoSecundaria(data[0])).show();
                }
            });
            
            tr.addClass('shown');
        }
    });
}

function prepararModalJustificacion() { // Terminado...
    let fecha_actual = new Date();

    $('#btn_nueva_justificacion').click(() => {
        $('#form_registro_justificacion_falta').trigger('reset');
        $('#justificacion_fecha').val(fecha_actual.toLocaleDateString());
        $('#justificacion_rut_estudiante').removeClass('is-invalid');
        LibreriaFunciones.autoFocus($('#modal_registro_justificacion_falta'), $('#justificacion_rut_estudiante'));
    });

    $('#justificacion_documento').click(function() {
        if ($(this).is(':checked')) {
            $('#justificacion_prueba_pendiente').prop('disabled', false);
        } else {
            $('#justificacion_prueba_pendiente').prop('disabled', true);
            $('#justificacion_prueba_pendiente').prop('checked', false);
        }
    });

    prepararModalAsignatura();

}

function prepararModalAsignatura() {
    let datos = "getAsignatura";
    
    $('#justificacion_prueba_pendiente').click(function (e) {
        if ($(this).is(':checked')) {

            if ($('#justificacion_asignatura_nombre').val() == '' && $('#justificacion_curso_estudiante').val() == '') {
                LibreriaFunciones.alertPopUp('warning', 'Ingresar rut del estudiante !!');
                return false
            }

            $('#form_justificacion_asignatura').trigger('reset')

            $('#justificacion_asignatura_nombre').val($('#justificacion_nombre_estudiante').val());
            $('#justificacion_asignatura_curso').val($('#justificacion_curso_estudiante').val());

            $.ajax({
                url: "./controller/controller_asignatura.php",
                type: "POST",
                dataType: "json",
                data: {datos: datos},
                success: function(data) {
                    $.each(data, (obj, datos) => {
                        $('#group_of_the_check').append(`<div class="col-6">
                                                            <div class="form-check">
                                                                <input type="checkbox" id="check_` + datos['id_asignatura'] + `" class="form-check-input" value="` + datos['id_asignatura'] + `">
                                                                <label for="check_` + datos['id_asignatura'] + `" class="form-check-label">` + datos['asignatura'] + `</label>
                                                            </div>
                                                        </div>`);
                    });
                }
            }).fail(() => {
                $('#group_of_the_check').append('<h2>Error al consultar datos</h2>');
            });
            
            $('#modal_registro_justificacion_falta').modal('hide');
            $('#modal_justificacion_asignatura').modal('show');

        }
    });
}

function getModalAsignatura(asignatura) {
    $('#close_modal_justificacion_asignatura').click(() => {
        $('#justificacion_prueba_pendiente').prop('checked', false);
        $('#group_of_the_check').empty();
        $('#modal_registro_justificacion_falta').modal('show');
        asignatura = [];
    });

    $('#btn_seleccion_asignatura').click(() => {
        $('#group_of_the_check input[type=checkbox]').each(function() {
            if ($(this).is(':checked')) {
                asignatura.push($(this).val());
            }
        });

        if (asignatura.length == 0) {
            LibreriaFunciones.alertPopUp('warning', 'Seleccione alguna asignatura !!');
            return false;
        }

        $('#modal_justificacion_asignatura').modal('hide');
        $('#group_of_the_check').empty();
        $('#modal_registro_justificacion_falta').modal('show');

    });

}

function comprobarFormJustificacion() {
    let rut = $.trim($('#justificacion_rut_estudiante').val());
    let nombre = $.trim($('#justificacion_nombre_estudiante').val());
    let fecha_inicio = $.trim($('#justificacion_fecha_inicio').val());
    let fecha_termino = $.trim($('#justificacion_fecha_termino').val());
    let apoderado = $.trim($('#justificacion_apoderado').val());

    if (rut == '' || nombre == '' || nombre == 'sin datos' || fecha_inicio == '' || fecha_termino == '' || apoderado == 'Seleccionar apoderado' || apoderado == 'Sin apoderado !!') {
        return false;
    }

    return true;

}

function comprobarCheck(check) {
    if ($(check).is(':checked')) {
        return true;
    }

    return false;

}

function setModalJustificacion(asignatura) {

    $('#btn_cancelar_justificacion').click(() => {
        asignatura = [];
    });

    // generar función para registrar justificación
    $('#btn_registrar_justificacion').click(() => {
        if (!comprobarFormJustificacion()) {
            LibreriaFunciones.alertPopUp('warning', 'Faltan campos obligatorios !!');
            return false;
        } 

        let rut = $.trim($('#justificacion_rut_estudiante').val());
        let fecha_inicio = $.trim($('#justificacion_fecha_inicio').val());
        let fecha_termino = $.trim($('#justificacion_fecha_termino').val());
        let apoderado = $.trim($('#justificacion_apoderado').val());
        let motivo = $.trim($('justificacion_motivo_causa').val());
        let documento = comprobarCheck('#justificacion_documento');

        // generar consulta ajax, controlador y modelo. !!!!!



    });


}

function getInfoEstudiante(rut, input_nombre, input_curso) { // Terminado...
    let datos = 'getEstudiante';

    if (rut != '' && rut.length > 7 && rut.length <= 9) {
        if (input_nombre.val() == '') {
            $.ajax({
                url: "./controller/controller_estudiante.php",
                type: "POST",
                dataType: "json",
                cache: false,
                data: {datos: datos, rut: rut, tipo: 'justificacion'},
                success: function(data) {
                    if (data != false) {
                        input_nombre.val(data[0].nombre_estudiante);
                        input_curso.val(data[0].curso);
                        LibreriaFunciones.loadApoderado(rut, '#justificacion_apoderado');
                    } else {
                        input_nombre.val('sin datos');
                        input_curso.val('N/A');
                    }
                }
            });
        }
    
    } else {
        input_nombre.val('');
        input_curso.val('');
    }
}

function validarRut() { // Terminado...
    $('#justificacion_rut_estudiante').keyup((e) => {
        e.preventDefault();
        generar_dv($('#justificacion_rut_estudiante'), $('#justificacion_dv_rut_estudiante'));
        getInfoEstudiante($('#justificacion_rut_estudiante').val(), $('#justificacion_nombre_estudiante'), $('#justificacion_curso_estudiante'));
        LibreriaFunciones.validarNumberRut($('#justificacion_rut_estudiante'));
    });
}


// ==================== FUNCIONES INTERNAS ===============================//



$(document).ready(function() {
    let datos = 'showJustificaciones';
    let asignatura = new Array();
    // let id_justificacion;


    // Cantidad de atrasos diarios y total
    getCantidadJustificacion('#justificacion_diaria');

    // LLENAR DATATABLE CON INFORMACIÓN =============================== 
    let tabla_justificacion = $('#justificacion_estudiante').DataTable({
        ajax: {
            url: "./controller/controller_justificacion.php",
            type: "POST",
            dataType: "json",
            data: {datos: datos},
        },
        columns: [
            {
                data: "id_justificacion",
                visible: false,
                searchable: false
            },
            {
                className: "dt-control",
                orderable: false,
                data: null,
                defaultContent: ""
            },
            {data: "rut"},
            {data: "ap_paterno"},
            {data: "ap_materno"},
            {data: "nombre"},
            {data: "curso"},
            {data: "fecha_inicio"},
            {data: "fecha_termino"},
            {
                data: null,
                defaultContent: `<button class="btn btn-primary btn-justify px-3" id="btn_download_justificar" type="button"><i class="fas fa-file-download"></i></button>
                                <button class="btn btn-danger btn-delete px-3" id="btn_delete_justificar" type="button"><i class="fas fa-trash-alt"></i></button>`,
                className: "text-center"
            }
        ],
        order: [[7, 'asc']],
        lenguage: spanish
    });

    // Expandir información adicional sobre la justificación del estudiante
    expandInfoSecundaria(tabla_justificacion);

    // Prepara el modal para ingresar una justificación
    prepararModalJustificacion();

    // Obtener valores del modal asignatura
    getModalAsignatura(asignatura);

    // Registrar justificación
    setModalJustificacion(asignatura);

    // Función para validar rut del estudiante
    validarRut();

});


