import { spanish, LibreriaFunciones, generar_dv } from './librerias/librerias.js';

// ==================== FUNCIONES INTERNAS ===============================//
function cantidadAtrasos(tipo, id_campo) {
    let datos = 'getAtrasos';

    $.ajax({
        url: "./controller/controller_atrasos.php",
        type: "post",
        dataType: "json",
        data: {datos: datos, tipo: tipo},
        success: function(data) {
            let valor = data;
            if (data == false) {
                valor = 0;
            } 
            $(id_campo).text(valor);
        }
    });
}

function atrasosSinJustificar(rut) {
    let datos = 'showAtrasosSinJustificar';
    $('#atraso_sinJustificar').DataTable().destroy();

    $('#atraso_sinJustificar').DataTable({
        searching: false,
        info: false,
        lengthChange: false,
        iDisplayLength: 5,
        ajax: {
            url: "./controller/controller_atrasos.php",
            type: "post",
            dateType: "json",	
            data: {datos: datos, rut: rut}
        },
        columns: [
            {data: "fecha_atraso", className: 'text-center'},
            {data: "hora_atraso", className: 'text-center'},
            {data: "id_atraso", className: 'text-center'}
        ],
        columnDefs: [
            {
                target: 2,
                checkboxes: {selectRow: true}
            }
        ],
        select: {style: 'multi'},


        order: [[0, 'asc'], [1, 'asc']],
        language: spanish
    });

}

function get_info_estudiante(rut, input_nombre, input_curso) { // REVISAR INFORMACIÓN, PROCESOS Y FUNCIONAMIENTOS
    let datos = 'getEstudiante';

    if (rut != '' && rut.length > 7 && rut.length < 9) {
        if (input_nombre.val() == '') {
            $.ajax({
                url: "./controller/controller_atrasos.php",
                type: "post",
                dataType: "json",
                cache: false,
                data: {datos: datos, rut: rut},
                success: function(info) {
                    if (info != false) {
                        input_nombre.val(info[0].nombre_estudiante);
                        input_curso.val(info[0].curso);

                        if (info[0].nombre_social != null) {
                            input_nombre.val('(' + info[0].nombre_social + ') ' + info[0].nombre_estudiante);
                        }

                        if (info[0].cantidad_atraso >= 1) {
                            $('#alerta_atraso_cantidad').text('Atrasos sin justificar: ' + info[0].cantidad_atraso);
                            $('#alerta_atraso_cantidad').show();
                        }

                        if (info[0].id_estado == 5) {
                            $('#registrar_atraso').prop('disabled', true);
                            $('#alerta_suspencion_activa').text('Estudiante suspendido !!!');
                            $('#alerta_suspencion_activa').show();
                        } 

                    } else {
                        input_nombre.val('Sin datos');
                        input_curso.val('N/A');
                    }
                }
            });
        }
    } else {
        input_nombre.val('');
        input_curso.val('');
        $('#alerta_atraso_cantidad').hide();
        $('#alerta_suspencion_activa').hide();
        $('#registrar_atraso').removeAttr('disabled');
    }
}

function prepararModalAtraso() {    // LISTO    preparar el modal de atraso antes de mostrarlo
    let fecha_hora_actual = new Date();
    $('#form_registro_atraso').trigger('reset');
    $('#staticFecha').val(fecha_hora_actual.toLocaleDateString());
    $('#staticHora').val(fecha_hora_actual.toLocaleTimeString());
    $('#registrar_atraso').removeAttr('disabled');
    $('#alerta_atraso_cantidad').hide();
    $('#alerta_suspencion_activa').hide();
    $('#rut_estudiante_atraso').removeClass('is-invalid');
    $('#informacion_rut').removeClass('text-danger');
    $('#informacion_rut').text('Rut sin puntos, sin guión y sin dígito verificador');
    $('#informacion_rut').addClass('form-text');
    LibreriaFunciones.autoFocus($('#modal_registro_atraso'), $('#rut_estudiante_atraso'));

}

function prepararModalJustificar(data) {
    $('#modal_justificar_atraso').modal('show');
    $('#rut_estudiante_justifica').val(data.rut);
    $('#curso_estudiante_justifica').val(data.curso);
    $('#nombre_estudiante_justifica').val(data.nombre + ' ' + data.ap_paterno + ' ' + data.ap_materno);
    $('#marcar_desmarcar_atrasos').removeClass('active');
    $('#marcar_desmarcar_atrasos').text('Marcar todo');
    
}

function cargarApodaerado(rut) {
    let datos = 'getApoderado_justifica';

    $.ajax({
        url: "./controller/controller_apoderado.php",
        type: "post",
        dataType: "json",
        data: {datos: datos, rut: rut},
        success: function(data) {
            $('#apoderado_justifica').html(data);
        }
    });
}

function validarRut() {     // LISTO
    $('#rut_estudiante_atraso').keyup(function(e) {
        e.preventDefault();
        generar_dv('#rut_estudiante_atraso', '#dv_rut_estudiante_atraso');
        get_info_estudiante($('#rut_estudiante_atraso').val(), $('#nombre_estudiante_atraso'), $('#curso_estudiante_atraso'));

        if ($('#dv_rut_estudiante_atraso').val() == '' && $('#rut_estudiante_atraso').val() != '') {
            $('#rut_estudiante_atraso').addClass('is-invalid');
            $('#informacion_rut').removeClass('form-text');
            $('#informacion_rut').text('Rut inválido, revisar !!');
            $('#informacion_rut').addClass('text-danger');
    
        }  else {
            $('#rut_estudiante_atraso').removeClass('is-invalid');
            $('#informacion_rut').removeClass('text-danger');
            $('#informacion_rut').text('Rut sin puntos, sin guión y sin dígito verificador');
            $('#informacion_rut').addClass('form-text');
        }    
    });
}

function beforeRegistro(tabla) {    // LISTO función para cuando se almacena un registro y se recargan los datos necesarios
    tabla.ajax.reload(null, false);
    cantidadAtrasos('diario', '#atraso_diario');
    cantidadAtrasos('total', '#atraso_total');
    prepararModalAtraso();
}




// ==================== FUNCIONES INTERNAS ===============================//

$(document).ready(function() {
    // variables globales
    let datos = 'showAtrasos'; 
    let id_atraso;

    // Cantidad de atrasos diarios y total
    cantidadAtrasos('diario', '#atraso_diario');
    cantidadAtrasos('total', '#atraso_total');

    // LLENAR DATATABLE CON INFORMACIÓN =============================== 
    let tabla_atrasos = $('#atraso_estudiante').DataTable({     // LISTO
        ajax: {
            url: "./controller/controller_atrasos.php",
            type: "post",
            dateType: "json",
            data: {datos: datos}
        },
        columns: [
            {   
                data: "id_atraso",
                visible: false,
                searchable: false
            },
            {data: "rut"},
            {data: "ap_paterno"},
            {data: "ap_materno"},
            {data: "nombre"},
            {data: "curso"},
            {data: "fecha_atraso"},
            {data: "hora_atraso"},
            {
                data: null,
                defaultContent: `<button class="btn-lg btn-primary btn-delete" id="btn_justificar_atraso" type="button"><span class="text-white">Justificar</span></button>
                                <button class="btn-lg btn-danger btn-delete" id="btn_eliminar_atraso" type="button"><i class="fas fa-trash-alt"></i></button>`,
                className: 'text-center'
            }
        ],
        order: [[6, 'asc'], [7, 'asc']],
        language: spanish
    });

    // Btn nuevo atraso
    $('#btn_nuevo_atraso').click(function() {
        prepararModalAtraso();
    });

    // Btn para registrar un atraso
    $('#btn_registrar_atraso').click(function(e) {  // LISTO
        e.preventDefault();
        datos = 'setAtraso';
        let rut;

        if ($('#rut_estudiante_atraso').val() == '' || $('#nombre_estudiante_atraso').val() == 'Sin datos' || $('#nombre_estudiante_atraso').val() == '') {
            LibreriaFunciones.alertPopUp('info', 'Ingresar rut válido');
            return false;
        }

        rut = $.trim($('#rut_estudiante_atraso').val());

        $.ajax({
            url: "./controller/controller_atrasos.php",
            type: "post",
            dataType: "json",
            data: {datos: datos, rut: rut },
            success: function(data) {
                if (data == false) {
                    LibreriaFunciones.alertPopUp('error', 'Registro no ingresado !!');
                    return false;
                }

                LibreriaFunciones.alertPopUp('success', 'Registro ingresado !!');
                beforeRegistro(tabla_atrasos);
            }
        });
    });

    // Btn para mostrar modal justificaciones
    $('#atraso_estudiante tbody').on('click', '#btn_justificar_atraso', function() {
        let data = tabla_atrasos.row($(this).parents()).data();
        let rut = data.rut.slice(0, -2);
        
        prepararModalJustificar(data);
        cargarApodaerado(rut);
        atrasosSinJustificar(rut);

    });

    // Btn para justificar atrasos
    $('#btn_justificar_atraso').click(function(e) {
        e.preventDefault();
        let row_selected = $('#atraso_sinJustificar').DataTable().column(2).checkboxes.selected();
        let atrasos = [];
        let id_apoderado = $('#apoderado_justifica').val();
        datos = 'setJustificar';

        if ($('#apoderado_justifica').val() == 'Sin apoderados !!' || $('#apoderado_justifica').val() == 'Seleccionar apoderado') {
            LibreriaFunciones.alertPopUp('warning', 'Seleccionar apoderado !!');
            return false;
        }

        if (row_selected.length < 1) {
            LibreriaFunciones.alertPopUp('warning', 'Seleccionar atraso !!');
            return false;
        }

        $.each(row_selected, function(index, rowId) {
            atrasos.push(rowId);
        });

        $.ajax({
            url: "./controller/controller_atrasos.php",
            type: "post",
            dataType: "json",
            cache: false,
            data: {datos: datos, id_apoderado: id_apoderado, atrasos: atrasos},
            success: function(data) {
                // console.log(data);
                if (data == false) {
                    LibreriaFunciones.alertPopUp('error', 'Error de registro !!');
                }

                tabla_atrasos.ajax.reload(null, false);
                $('#modal_justificar_atraso').modal('hide');
                LibreriaFunciones.alertPopUp('success', 'Atrasos justificados !!');
            }
        });    
    });
    
    // Btn para eliminar un registro
    $('#atraso_estudiante tbody').on('click', '#btn_eliminar_atraso', function() {
        let data = tabla_atrasos.row($(this).parents()).data();
        id_atraso = data.id_atraso;

        Swal.fire({
            icon: 'question',
            title: 'Eliminar registro de "' + data.nombre + ' ' + data.ap_paterno + '"',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#2691d9',
            cancelButtonColor: '#adadad'
        }). then(resultado => {
            if (resultado.isConfirmed) {
                datos = "eliminarAtraso";

                $.ajax({
                    url: "./controller/controller_atrasos.php",
                    type: "post",
                    dataType: "json",
                    data: {datos: datos, id_atraso: id_atraso},
                    success: function(data) {
                        if (data == false) {
                            LibreriaFunciones.alertPopUp('error', 'Registro no eliminado !!');
                            return false;
                        }

                        LibreriaFunciones.alertPopUp('success', 'Registro eliminado !!');
                        beforeRegistro(tabla_atrasos);
                    }
                });
            }
        });
    });

    validarRut();

});