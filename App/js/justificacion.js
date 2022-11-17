import {LibreriaFunciones, generar_dv, spanish } from './librerias/librerias.js';

// ==================== FUNCIONES INTERNAS ===============================//



// ==================== FUNCIONES INTERNAS ===============================//



$(document).ready(function() {
    let datos = 'showJustificaciones';
    let id_justificacion;


    // Cantidad de atrasos diarios y total
    // cantidadAtrasos('diario', '#atraso_diario');

    // LLENAR DATATABLE CON INFORMACIÓN =============================== 
    let tabla_justificacion = $('#justificacion_estudiante').DataTable({
        ajax: {
            url: "./controller/controller_justificacion.php",
            type: "post",
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
                // data: null,
                // defaultContent: `<button class="btn btn-success btn-xpand" id="btn_show_info_justificar" type="button"><i class="fas fa-plus-circle"></i></button>`,
                // className: "text-center"
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

});


