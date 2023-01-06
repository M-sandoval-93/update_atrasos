import { spanish, LibreriaFunciones, generar_dv } from './librerias/librerias.js';

// ==================== FUNCIONES INTERNAS ===============================//
// obtener atraso diario y anual
function getCantidadAtraso(tipo, id_campo) { // Terminado y revisado ...
    let datos = 'getCantidadAtraso';
    let valor = 0;

    $.ajax({
        url: "./controller/controller_atrasos.php",
        type: "post",
        dataType: "json",
        data: {datos: datos, tipo: tipo},
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

// trae información de los atrasos de un estudiante sin justificar
function getAtrasosSinJustificar(rut) { // Terminado y revisado !!
    let datos = 'getAtrasosSinJustificar';
    $('#atraso_sinJustificar').DataTable().destroy();

    $('#atraso_sinJustificar').DataTable({
        searching: false,
        info: false,
        lengthChange: false,
        aaSorting: [], // evitar que se ordenen las filas
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
        language: spanish
    });
}

// traer información del estudiante al ingresar nuevo atraso
function getEstudiante(rut, input_nombre, input_curso) { // Terminado y revisado !!
    let datos = 'getEstudiante';

    if (rut != '' && rut.length > 7 && rut.length < 9) {
        if (input_nombre.val() == '') {
            $.ajax({
                url: "./controller/controller_estudiante.php",
                type: "post",
                dataType: "json",
                cache: false,
                data: {datos: datos, rut: rut, tipo: 'atraso'},
                success: function(info) {
                    if (info != false) {
                        input_nombre.val(info[0].nombre_estudiante);
                        input_curso.val(info[0].curso);

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

// funcion para preparar el modal antes de ingresar datos
function prepararModalAtraso() { // Terminado y revisado !!
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

// funcion que prepara el modal de justificación de atrasos
function prepararModalJustificar(data) { // Terminado y revisado !!
    $('#modal_justificar_atraso').modal('show');
    $('#rut_estudiante_justifica').val(data.rut);
    $('#curso_estudiante_justifica').val(data.curso);
    $('#nombre_estudiante_justifica').val(data.nombre + ' ' + data.ap_paterno + ' ' + data.ap_materno);
    $('#marcar_desmarcar_atrasos').removeClass('active');
    $('#marcar_desmarcar_atrasos').text('Marcar todo');
}

// función para validar el rut y consultar datos del mismo
function validarRut() { // Terminado y revisado !!
    $('#rut_estudiante_atraso').keyup(function(e) {
        e.preventDefault();
        generar_dv('#rut_estudiante_atraso', '#dv_rut_estudiante_atraso');
        getEstudiante($('#rut_estudiante_atraso').val(), $('#nombre_estudiante_atraso'), $('#curso_estudiante_atraso'));

        LibreriaFunciones.validarNumberRut($('#rut_estudiante_atraso'), $('#informacion_rut'));  
    });
}

// función para cuando se almacena un registro y se recargan los datos necesarios
function beforeRegistro(tabla) { // Terminado y revisado !!
    tabla.ajax.reload(null, false);
    getCantidadAtraso('diario', '#atraso_diario');
    getCantidadAtraso('total', '#atraso_total');
    prepararModalAtraso();
}

// función para generar documento, ver si se puede generalizar !!!!
function generarDocumento(ext) {
    let datos = 'getDocument';

    $.ajax({
        url: "./controller/controller_atrasos.php",
        type: "post",
        dataType: "html",
        cache: false,
        data: {datos: datos, ext: ext},
        success: (data) => {
            let opResult = JSON.parse(data);
            let $a = $("<a>");

            $a.attr("href", opResult.data);
            $("body").append($a);
            $a.attr("download", "Registro atrasos." + ext);
            $a[0].click();
            $a.remove();
        }
    }). fail(() => {
        LibreriaFunciones.alertPopUp('error', 'Error al generar documento');
    });
}

// ==================== FUNCIONES INTERNAS ===============================//


$(document).ready(function() {
    // variables globales
    let datos = 'getAtraso'; 
    let id_atraso;

    // Cantidad de atrasos diarios y total
    getCantidadAtraso('diario', '#atraso_diario');
    getCantidadAtraso('total', '#atraso_total');

    // LLENAR DATATABLE CON INFORMACIÓN =============================== 
    let tabla_atrasos = $('#tabla_atraso_estudiante').DataTable({ // Terminado y revisado !!
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
                // searchable: false
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
                defaultContent: `<button class="btn btn-primary btn-justify" id="btn_justificar_atraso" type="button"><i class="fas fa-user-check"></i></button>
                                <button class="btn btn-danger btn-delete" id="btn_eliminar_atraso" type="button"><i class="fas fa-trash-alt"></i></button>`,
                className: 'text-center'
            }
        ],
        order: [0, 'desc'],
        language: spanish
    });

    // Btn nuevo atraso
    $('#btn_nuevo_atraso').click(() => { // Terminado y revisado !!
        prepararModalAtraso();
    });




    // Btn para registrar un atraso
    $('#btn_registrar_atraso').click((e) => {  // En progreso ... implementar impresión de ticket !!!
        e.preventDefault();
        datos = 'setAtraso';
        let rut;

        if ($('#rut_estudiante_atraso').val() == '' || $('#nombre_estudiante_atraso').val() == 'Sin datos' || $('#nombre_estudiante_atraso').val() == '') {
            LibreriaFunciones.alertPopUp('info', 'Ingresar rut válido');
            return false;
        }

        rut = $.trim($('#rut_estudiante_atraso').val());

        // Agregar aquí la función para imprimir ticket, la cual, puede ser en respuesta al ajax

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

                // ver la posibilidad de generear función ajax/fetch para impresión de tiket
            }
        });
    });




    // Btn para mostrar modal justificaciones
    $('#tabla_atraso_estudiante tbody').on('click', '#btn_justificar_atraso', function() { // Terminado y revisado !!
        let data = tabla_atrasos.row($(this).parents()).data();
        let rut = data.rut.slice(0, -2);
        
        prepararModalJustificar(data);
        LibreriaFunciones.loadApoderado(rut, '#apoderado_justifica');
        getAtrasosSinJustificar(rut); // revisar el orden en que se presentan

    });

    // Btn para justificar atrasos
    $('#btn_justificar_atraso').click(function(e) { // Terminado y revisado !!
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
                if (data != false) {
                    LibreriaFunciones.alertPopUp('error', 'No registrado !!');
                }

                tabla_atrasos.ajax.reload(null, false);
                $('#modal_justificar_atraso').modal('hide');
                LibreriaFunciones.alertPopUp('success', 'Atrasos justificados !!');
            }
        }).fail(() => {
            LibreriaFunciones.alertPopUp('error', 'Error de registro, revisar !!');
        });    
    });
    
    // Btn para eliminar un registro
    $('#tabla_atraso_estudiante tbody').on('click', '#btn_eliminar_atraso', function() { // Terminado y revisado !!
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
                datos = "deleteAtraso";

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

    // Btn para generar EXCEL
    $('#btn_excel_atraso').click((e) => { // Terminado y revisado !!
        e.preventDefault();
        generarDocumento('xlsx');
    });

    $('#btn_csv_atraso').click((e) => { // Terminado y revisado !!
       e.preventDefault();
       generarDocumento('csv'); 
    });






    
    // Btn para generar PDF
    $('#btn_pdf_atraso').click(function(e) { // En progreso...
        e.preventDefault();
        console.log("generar pdf");

        // // trabajando para probar fetch !!!!!!!
        // const data = new FormData();
        // data.append('nombre', 'juan manuel');

        // // let data = {nombre: 'juan manuel'};


        // fetch('http://localhost/update_atrasos/impresion/', {
        //     method: 'POST',
        //     body: data
        //     // body: JSON.stringify(data)
        // })
        // .then(response => response.json())
        // .then(data => {
        //     if (data == true) {
        //         console.log('impresion ejecutada');
        //     } else {
        //         console.log('impresión no ejecutada');
        //     }
        // });


    });

    validarRut();

});