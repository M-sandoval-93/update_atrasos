import {LibreriaFunciones, generar_dv, spanish } from './librerias/librerias.js';

// ==================== FUNCIONES INTERNAS ===============================//
function infoSecundaria(data) {
    return(
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
                '<td>Full name:</td>' +
                '<td>' + data.rut_apoderado_titular + '</td>' +
            '</tr>' +
        
            '<tr>' +
                '<td>Extension number:</td>' +
                '<td>' + data.rut_apoderado_suplente + '</td>' +
            '</tr>' +

            // '<tr>' +
            //     '<td>Extra info:</td>' +
            //     '<td>And any further details here (images etc)...</td>' +
            // '</tr>' +
        '</table>'
    );
}


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
        let data = tabla_justificacion.row($(this).parents()).data();
        let tr = $(this).closest('tr');
        let row = tabla_justificacion.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('show');
        } else {

            $.



            row.child(infoSecundaria(row.data())).show();
            tr.addClass('shown');
            // console.log(data.id_justificacion);
        }
    });



});


