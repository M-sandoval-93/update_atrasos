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

function prepararModalJustificacion() { // Terminado...
    let fecha_actual = new Date();

    $('#form_registro_justificacion_falta').trigger('reset');
    $('#justificacion_fecha').val(fecha_actual.toLocaleDateString());
    $('#justificacion_rut_estudiante').removeClass('is-invalid');
    LibreriaFunciones.autoFocus($('#modal_registro_justificacion_falta'), $('#justificacion_rut_estudiante'));

    $('#justificacion_documento').click(function() {
        if ($(this).is(':checked')) {
            $('#justificacion_prueba_pendiente').prop('disabled', false);
        } else {
            $('#justificacion_prueba_pendiente').prop('disabled', true);
            $('#justificacion_prueba_pendiente').prop('checked', false);
        }
    });

}

function prepararModalAsignatura() {
    let datos = "getAsignatura";
    
    $('#justificacion_prueba_pendiente').click(function (e) {
        if ($(this).is(':checked')) {

            if ($('#justificacion_asignatura_nombre').val() == '' && $('#justificacion_curso_estudiante').val() == '') {
                LibreriaFunciones.alertPopUp('warning', 'Ingresar rut del estudiante !!');
                return false
            }

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
                                                                <input type="checkbox" id="check_asignatura" class="form-check-input" value="` + datos['id_asignatura'] + `">
                                                                <label for="check_asignatura" class="form-check-label">` + datos['asignatura'] + `</label>
                                                            </div>
                                                        </div>`);
                    });
                }
            }).fail(() => {
                $('#group_of_the_check').append('<h2>Error al consultar datos</h2>');
            });
            
            
            $('#modal_justificacion_asignatura').modal('show');


        }
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
                        cargarApoderado(rut);
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

function cargarApoderado(rut) {
    let datos = 'getApoderado_justifica';

    $.ajax({
        url: "./controller/controller_apoderado.php",
        type: "POST",
        dataType: "json",
        data: {datos: datos, rut: rut},
        success: (data) => {
            $('#justificacion_apoderado').html(data);
        }
    });
}




// ==================== FUNCIONES INTERNAS ===============================//



$(document).ready(function() {
    let datos = 'showJustificaciones';
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

    // Traer información al hacer click en el boton de expand
    $('#justificacion_estudiante tbody').on('click', 'td.dt-control', function() {
        let dataRow = tabla_justificacion.row($(this).parents()).data();
        let tr = $(this).closest('tr');
        let row = tabla_justificacion.row(tr);
        datos = 'getInfoAdicional';

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

    $('#btn_nueva_justificacion').click((e) => {
        prepararModalJustificacion();
    });




    prepararModalAsignatura();

    validarRut();

});


