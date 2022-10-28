import { spanish, LibreriaFunciones, generar_dv } from './librerias/librerias.js';

// ==================== FUNCIONES INTERNAS ===============================//
function cantidadAtrasos(tipo, id_campo) {
    let datos = 'getAtrasos';

    $.ajax({
        url: "./controller/controller_atrasos.php",
        method: "post",
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

function get_info_estudiante(rut, input_nombre, input_curso) {
    let datos = 'getEstudiante';
    // let alerta = '<div class="alert alert-danger alert-dismissible" role="alert">' + "prueba" + '</div>';

    if (rut != '' && rut.length > 7) {
        if (input_nombre.val() == '') {
            $.ajax({
                url: "./controller/controller_atrasos.php",
                type: "post",
                dataType: "json",
                data: {rut: rut, datos: datos},
                success: function(info) {
                    if (info != false) {
                        input_nombre.val(info[0].nombre_estudiante);
                        input_curso.val(info[0].curso);

                        if (info[0].nombre_social != null) {
                            input_nombre.val('(' + info[0].nombre_social + ') ' + info[0].nombre_estudiante);
                        }

                        if (info[0].id_estado = 5) {
                            $('#alerta').show();
                        } 

                    } else {
                        input_nombre.val('Sin datos');
                        input_curso.val('N/A');
                        $('#alerta').hide();
                    }
                }
            });
        }

    } else {
        input_nombre.val('');
        input_curso.val('');
        $('#alerta').hide();
    }

}

function prepararModalAtraso() {
    let fecha_hora_actual = new Date();
    
    $('#modal_registro_atraso').trigger('reset');
    $('#alerta').hide();
    $('#staticFecha').val(fecha_hora_actual.toLocaleDateString());
    $('#staticHora').val(fecha_hora_actual.toLocaleTimeString());

    autofocus();
    validarRut();


}




// function alertBoostrap(elemento, message, type) {
//     let componente = document.getElementById(elemento);

//     let wrapper = document.createElement('div');
//     wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '</div>';
//     componente.append(wrapper);
// }



function estudianteSuspendido() {
    // deshabilitar componentes para poder registrar atraso e ingreso del estudiante
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

function autofocus() {      // LISTO
    $('#modal_atraso').on('shown.bs.modal', function(e) {
        $('#rut_estudiante_atraso').focus();
    });
}



// ==================== FUNCIONES INTERNAS ===============================//

$(document).ready(function() {
    // variables globales
    let modal = $('#modal_atraso'); 
    let datos = 'showAtrasos'; 
    let registrar; 
    let id_atraso;

    // LLENAR DATATABLE CON INFORMACIÓN =============================== 
    let tabla_atrasos = $('#atraso_estudiante').DataTable({     // LISTO
        ajax: {
            url: "./controller/controller_atrasos.php",
            method: "post",
            dateType: "json",
            data: {datos: datos}
        },
        columns: [
            {   
                data: "id_atraso",
                visible: false
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
        order: [[6, 'desc'], [7, 'desc']],
        language: spanish
    });


    // Btn nuevo atraso
    $('#btn_nuevo_atraso').click(function() {
        prepararModalAtraso();
        



    });



    $('#registrar_atraso').click(function(e) {
        e.preventDefault();
        console.log("registrar");
    });






    // CANTIDAD DE ATRASOS DEL DÍA
    cantidadAtrasos('diario', '#atraso_diario');
    cantidadAtrasos('total', '#atraso_total');



});