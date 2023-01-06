import {LibreriaFunciones, generar_dv, spanish } from './librerias/librerias.js';
let asignatura = new Array();

// ==================== FUNCIONES INTERNAS ===============================//
function getInfoSecundaria(data) { // Terminado y revisado !!
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

function getCantidadJustificacion(id_campo) { // Terminado y revisado !!
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

function expandInfoSecundaria(tabla) { // Terminado y revisado !!
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
            }).fail(() => {
                LibreriaFunciones.alertPopUp('error', 'Datos dañados !!');
            });
            
            tr.addClass('shown');
        }
    });
}

function prepararModalJustificacion() { // Terminado y revisado !!
    let fecha_actual = new Date();

    $('#btn_nueva_justificacion').click(() => {
        $('#form_registro_justificacion_falta').trigger('reset');
        $('#justificacion_fecha').val(fecha_actual.toLocaleDateString());
        $('#justificacion_rut_estudiante').removeClass('is-invalid');
        $('#justificacion_prueba_pendiente').prop('disabled', true);
        LibreriaFunciones.autoFocus($('#modal_registro_justificacion_falta'), $('#justificacion_rut_estudiante'));
        asignatura = [];
    });

    $('#justificacion_documento').click(function() {
        if (LibreriaFunciones.comprobarCheck(this)) {
            $('#justificacion_prueba_pendiente').prop('disabled', false);
        } else {
            $('#justificacion_prueba_pendiente').prop('disabled', true);
            $('#justificacion_prueba_pendiente').prop('checked', false);
            asignatura = [];
        }
    });

    prepararModalAsignatura();

}

function prepararModalAsignatura() { // Terminado y revisado !!
    let datos = "getAsignatura";
    
    $('#justificacion_prueba_pendiente').click(function () {
        if (LibreriaFunciones.comprobarCheck(this)) {
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
        } else {
            asignatura = [];
        }
    });
}

function getModalAsignatura() { // Terminado y revisado !!
    $('#close_modal_justificacion_asignatura').click(() => {
        $('#justificacion_prueba_pendiente').prop('checked', false);
        $('#group_of_the_check').empty();
        $('#modal_registro_justificacion_falta').modal('show');
        asignatura = [];
    });

    $('#btn_seleccion_asignatura').click(() => {
        $('#group_of_the_check input[type=checkbox]').each(function() {
            if (LibreriaFunciones.comprobarCheck(this)) {
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

function comprobarFormJustificacion() { // Terminado y revisado !!
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


function setModalJustificacion() { // En desarrollo ....
    $('#btn_registrar_justificacion').click(() => {
        // if (!comprobarFormJustificacion()) {
        //     LibreriaFunciones.alertPopUp('warning', 'Faltan campos obligatorios !!');
        //     return false;
        // }

        // let rut = $.trim($('#justificacion_rut_estudiante').val());
        // let fecha_inicio = $.trim($('#justificacion_fecha_inicio').val());
        // let fecha_termino = $.trim($('#justificacion_fecha_termino').val());
        // let apoderado = $.trim($('#justificacion_apoderado').val());
        // let motivo = $.trim($('#justificacion_motivo_causa').val());
        // let documento = LibreriaFunciones.comprobarCheck('#justificacion_documento');
        // let pruebas = true;
        // let datos  = "setJustificacion";

        // if (!LibreriaFunciones.comprobarCheck('#justificacion_prueba_pendiente')) {
        //     asignatura = [];
        //     pruebas = false;
        // }


        // $.ajax({
        //     url: "./controller/controller_justificacion.php",
        //     type: "POST",
        //     dataType: "json",
        //     data: {datos: datos, rut: rut, fecha_inicio: fecha_inicio, fecha_termino: fecha_termino,
        //             apoderado: apoderado, motivo: motivo, documento: documento, pruebas: pruebas, asignatura: asignatura},
        //     success: function(data) {
        //         if (data == false) {
        //             LibreriaFunciones.alertPopUp('error', 'Registro no almacenado !!!');
        //             return false;
        //         }

        //         LibreriaFunciones.alertPopUp('success', 'Registro almacenado !!');
        //     }

        // }). fail (() => {
        //     LibreriaFunciones.alertPopUp('error', 'Error en la operación !!');
        // });


        console.log(asignatura);


        // OBSERVACIONES PARA LA FUNCIÓN PRINCIPAL
        // Revisar información enviada al controlador y al modelo
        // Revisar donde se envia la información y qué información 



    });


}

function getInfoEstudiante(rut, input_nombre, input_curso) { // Terminado y revisado !!
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

function validarRut() { // Terminado y revisado !!
    $('#justificacion_rut_estudiante').keyup((e) => {
        e.preventDefault();
        generar_dv($('#justificacion_rut_estudiante'), $('#justificacion_dv_rut_estudiante'));
        getInfoEstudiante($('#justificacion_rut_estudiante').val(), $('#justificacion_nombre_estudiante'), $('#justificacion_curso_estudiante'));
        LibreriaFunciones.validarNumberRut($('#justificacion_rut_estudiante')); // Ver si es necesaria o revisar función
    });
}

// ==================== FUNCIONES INTERNAS ===============================//



$(document).ready(function() {
    let datos = 'showJustificaciones';

    // Cantidad de atrasos diarios y total
    getCantidadJustificacion('#justificacion_diaria');

    // LLENAR DATATABLE CON INFORMACIÓN =============================== 
    let tabla_justificacion = $('#justificacion_estudiante').DataTable({ // Terminado y revisado !!
        aaSorting: [], // Para evitar que dataTable ordene la información
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
        // order: [[7, 'asc']],
        lenguage: spanish
    });

    // Expandir información adicional sobre la justificación del estudiante
    expandInfoSecundaria(tabla_justificacion);

    // Prepara el modal para ingresar una justificación
    prepararModalJustificacion();

    // Obtener valores del modal asignatura
    getModalAsignatura();

    // Registrar justificación
    setModalJustificacion();

    // Eliminar registro
    // enviar id del registro con el que se elimina de la tabla justificación y de las asignaturas pendientes en caso de que exista alguna

    // Generar PDF con información o DOC
    // Ver como generar un pdf o generar u word
    // Para descargar word link: 
    // Parte 1: https://www.youtube.com/watch?v=ABsk2ajYAGQ
    // Parte 2: https://www.youtube.com/watch?v=3fmsZ6fZz1w

    // Opción para PDF https://www.youtube.com/watch?v=PvI3nbffuqk



    // Función para validar rut del estudiante
    validarRut();

});


