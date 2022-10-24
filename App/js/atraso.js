import { spanish, LibreriaFunciones, generar_dv } from './librerias/librerias.js';

// ==================== FUNCIONES INTERNAS ===============================//
function atrasoDiario(datos, id_campo) {
    $.ajax({
        url: "./controller/controller_atrasos.php",
        method: "post",
        dataType: "json",
        data: {datos: datos},
        success: function(data) {
            let valor = data;
            if (data == false) {
                valor = 0;
            } 
            $(id_campo).text(valor);
        }
    });
}

function prepararModalAtraso() {
    let fecha_hora_actual = new Date();
    
    $('#modal_registro_atraso').trigger('reset');
    $('#staticFecha').val(fecha_hora_actual.toLocaleDateString());
    $('#staticHora').val(fecha_hora_actual.toLocaleTimeString());

    validarRut();
    autofocus();


    // $('#rut_estudiante_atraso').find('[autofocus]').focus();
}

function alertBoostrap(elemento, message, type) {
    let componente = document.getElementById(elemento);

    let wrapper = document.createElement('div');
    wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '</div>';
    componente.append(wrapper);
}

function estudianteSuspendido() {
    // deshabilitar componentes para poder registrar atraso e ingreso del estudiante
}

function validarRut() {
    $('#rut_estudiante_atraso').keyup(function() {
        generar_dv('#rut_estudiante_atraso', '#dv_rut_estudiante_atraso');
        if ($('#dv_rut_estudiante_atraso').val() == '' && $('#rut_estudiante_atraso').val() != '') {
            $('#rut_estudiante_atraso').addClass('is-invalid');
            $('#informacion_rut').removeClass('form-text');
            // $('#informacion_rut').text('Rut inválido, revisar !!');
            // $('#informacion_rut').addClass('invalid-feedback');

        }  else {
            $('#rut_estudiante_atraso').removeClass('is-invalid');
        }
    });

}

function autofocus() {
    $('#modal_atraso').on('shown.bs.modal', function(e) {
        $('#rut_estudiante_atraso').focus();
    });
}



// ==================== FUNCIONES INTERNAS ===============================//

$(document).ready(function() {
    // variables globales
    let modal = $('#modal_atraso'); 
    let datos = 'show_atrasos'; 
    let registrar; 
    let id_atraso;

    // LLENAR DATATABLE CON INFORMACIÓN =============================== LISTO
    let tabla_atrasos = $('#atraso_estudiante').DataTable({
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
    $('#btn_nueva_inasistencia').click(function() {
        prepararModalAtraso();
        // $('#cantidad_atrasos').text('Existne 8 atrasos sin justificar !!');
        // alertBoostrap('alerta_suspencion', 'Estudiante suspendido', 'danger'); // prueba de alert



    });



    $('#registrar_atraso').click(function(e) {
        e.preventDefault();
        console.log("registrar");
    });






    // CANTIDAD DE ATRASOS DEL DÍA
    atrasoDiario('getAtrasosDiario', '#atraso_diario');
    atrasoDiario('getAtrasosTotal', '#atraso_total');



});