import { spanish, LibreriaFunciones, generar_dv } from './librerias/librerias.js';

// ==================== FUNCIONES INTERNAS ===============================//




// ==================== FUNCIONES INTERNAS ===============================//

$(document).ready(function() {
    // variables globales
    let modal = $('#modal_atraso'); 
    // let modal_funcionario = $('#modal_form_funcionario'); 
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
            {
                data: "inasistencias",
                defaultContent: "",
                mRender: function(data) {
                    let btn_expand;
                    if (data != 0) {
                        btn_expand = '<button class="btn btn-s btn-expand" id="btn_detalle_atraso"><i class="fas fa-plus-circle"></i></button>';
                        return btn_expand;
                    }
                }
            },
            {data: "rut"},
            {data: "estudiante"},
            {data: "curso"},
            {data: "fecha_atraso"},
            {data: "hora_atraso"},
            {data: "estado_atraso"},
            {
                data: null,
                defaultContent: '<button class="btn btn-danger btn-s btn-delete" id="btn_eliminar_atraso" type="button"><i class="fas fa-trash-alt"></i></button>'
            }
        ],
        // order: [[4, 'asc']],
        language: spanish
    });



});