// Librería de funciones básicas para validar RUT ==========
let LibreriaFunciones = {
    // Valida el rut con su cadena completa "XXXXXXXX-X"
    validarRut: function(rutCompleto) {
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto )) {
            return false;
        }
        
        let tmp = rutCompleto.split('-');
        let rut = tmp[0];
        let dvRut = tmp[1];

        if (dvRut == 'K') {
            dvRut = 'K';
        }
        return (LibreriaFunciones.dv(rut) == dvRut);
    },

    // Calcula el dígito verificador
    dv: function(T) {
        let M = 0, S = 1;

        for (;T;T = Math.floor(T/10)) {
            S = (S + T % 10 * (9 - M ++ % 6)) % 11;
        }
        return S?S - 1: 'K';
    },

    // Valida que el número sea un entero
    validarEntero: function(value) {
        let regExPattern = /[0-9]+$/;
        return regExPattern.test(value);
    },

    // Formatea un número con puntos de miles
    formatearNumero: function(val) {
        if (LibreriaFunciones.validarEntero(val)) {
            let retorno = '';
            let value = val.toString().split('').reverse().join('');
            let i = value.length;

            while (i > 0) {
                retorno += ((i%3==0&&i!=value.length)?'':'')+value.substring(i--,i);
                // retorno += ((i%3==0&&i!=value.length)?'.':'')+value.substring(i--,i);  //Para ir agregando el punto
            }
            return retorno;
        }
        return val;
    }
}
// Librería de funciones básicas para validar RUT ==========

// FUNCIONES ===============================================

function generar_dv() {
    // Traspasar valor a número entero
    let numero = $('#estudiante_rut').val();
    numero = numero.split('.').join('');

    // Valida que sea realmente entero
    if (LibreriaFunciones.validarEntero(numero)) {
        $('#estudiante_dv_rut').val(LibreriaFunciones.dv(numero));

    } else {
        $('#estudiante_dv_rut').val('');
    }

    // Formatear el valor del rut con sus puntos
    $('#estudiante_rut').val(LibreriaFunciones.formatearNumero(numero));
}

function camposVacios() {
    const form = document.getElementById('modal_form_estudiantes');
    const inputs = form.querySelectorAll('input[type="text"]');
    let contador = 0;

    inputs.forEach(elemento => {
        if (elemento.value === '') {
            contador = contador + 1;
        }
    });
    return contador;
}

// FUNCIONES ===============================================


$(document).ready(function() {

    // VARIABLES GLOBALES
    let modal = $('#modal_form_estudiantes');
    let registrar;
    let id_estudiante;

    // BOTÓN NUEVO ESTUDIANTE /==================================
    $('#btn_nuevo_estudiante').click(function(e) {
        e.preventDefault();
        $('#form_estudiantes').trigger('reset');
        $('#titulo-modal_estudiante').text('Registrar nuevo estudiante');
        
        modal.addClass('modal-show');
        $('#estudiante_rut').removeAttr('disabled', 'disable');
        $('#estudiante_dv_rut').attr('disabled', 'disabled');
        $('#estudiante_rut').focus();
        $('#estudiante_rut').keyup(generar_dv);
        $('#estudiante_rut').blur(generar_dv);

        registrar = 'nuevo_estudiante';
    });

    // BOTÓN MODAL REGISTRAR /===================================
    $('#btn_modal_registrar_estudiante').click(function(e) {
        e.preventDefault();

        // SE CREAN LAS VARIABLES
        console.log('registrar información');

    });




    // BOTÓN MODAL CANCELAR /====================================
    $('#btn_modal_cancelar_estudiante').click(function(e) {
        e.preventDefault();
        modal.removeClass('modal-show');
    });


    // FUNCION PARA GENERAR INFORMCION ADICIONAL
    function format(d) {
        let sexo;
        let junaeb;

        if (d.sexo_estudiante == 'F') {
            sexo = 'Femenina';
        } else {
            sexo = 'Masculino';
        }

        
        return (
            '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                    '<td>Número matrícula:</td>' +
                    '<td>' + d.numero_matricula + '</td>' +
                '</tr>' +

                '<tr>' +
                    '<td>Nombre social:</td>' +
                    '<td>' + d.nombre_social_estudiante + '</td>' +
                '</tr>' +

                '<tr>' +
                    '<td>Sexo estudiante:</td>' +
                    '<td>' + sexo + '</td>' +
                '</tr>' +

                '<tr>' +
                    '<td>Fecha Nacimiento:</td>' +
                    '<td>' + d.fecha_nacimiento_estudiante + '</td>' +
                '</tr>' +

                '<tr>' +
                    '<td>Apoderado titular:</td>' +
                    '<td>' + d.apoderado_titular + '</td>' +
                '</tr>' +

                '<tr>' +
                    '<td>Apoderado: suplente</td>' +
                    '<td>' + d.apoderado_suplente + '</td>' +
                '</tr>' +
            '</table>'
        );
    }

    // DATATABLE /===============================================
    datos = 'mostrar_estudiantes';
    let tabla_estudiantes = $('#estudiantes').DataTable({
        // processing: true,  // PARA MOSTRAR CIRCULOS DE PROCESAMIENTO
        ajax: {
            url: "./controller/controller_estudiantes.php",
            method: "post",
            // dateType: "json",
            data: {datos: datos}
         },
         columns: [ // INFORMACIÓN DE COLUMNAS
            { // BTN PARA EXPANDIR Y CONTRAER TABLA
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
            },
            { // ID DEL ESTUDIANTE QUE NO ES VISIBLE
                data: "id_estudiante",
                visible: false
            },
            {data: "rut_estudiante"}, // CELDA CONVINADA POR CONSULTA SQL
            {data: "apellido_paterno_estudiante"},
            {data: "apellido_materno_estudiante"},
            {data: "nombres_estudiante"},
            {data: "curso"},
            {
                data: 'id_estado',
                bSortable: false,
                mRender: function(data) {
                    let btn_estado;
                    if (data == 1) {
                        btn_estado = `<button class="btn btn-s btn-success" id="btn_editar_estado" type="button"><i class="fas fa-lock-open"></i></button>`;
                    } else if (data == 4) {
                        btn_estado = `<button class="btn btn-s btn-delete" id="btn_editar_estado" type="button"><i class="fas fa-ban"></i></button>`;
                    } else if (data == 4) {
                        btn_estado = `<button class="btn btn-s btn-lock" id="btn_editar_estado" type="button"><i class="fas fa-lock"></i></button>`;
                    }

                    return btn_estado;
                }
            },
            {data: null,
                bSortable: false,
                defaultContent: // BOTONES
                                `<button class="btn btn-s btn-data" id="btn_editar_estudiante" type="button"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-s btn-delete" id="btn_eliminar_estudiante" type="button"><i class="fas fa-trash-alt"></i></button>`
            }
        ],
        order: [[3, 'asc']],

        language: spanish
    });

    // EVENTO PARA EXPANDIR TABLA CUANDO SE PRESIONA BTN
    $('#estudiantes tbody').on('click', 'td.dt-control', function () {
        let tr = $(this).closest('tr');
        let row = tabla_estudiantes.row(tr);
 
        if (row.child.isShown()) {
            // ACCIÓN PARA CUANDO SE CONTRAE LA TABLA
            row.child.hide();
            tr.removeClass('shown');

        } else {
            // ACCIÓN PARA CUANDO SE EXPANDE LA TABLA
            row.child(format(row.data())).show();
            tr.addClass('shown');
    
        }
    });





    // EDITAR UN ESTUDIANTE /====================================



    // ESTADOS DE UN ESTUDIANTE /================================
    $('#estudiantes tbody').on('click', '#btn_editar_estado', function() {
        let data = tabla_estudiantes.row($(this).parents()).data();
        id_estudiante = data.id_estudiante;
        estado = data.id_estado;
        datos = "editar_estado";

        if (estado == 4) {
            Swal.fire({
                icon: 'error',
                title: 'El estudiante esta retirado !!',
                showConfirmButton: false,
                timer: 1500,
            });
            return false;
        } else {
            console.log("alumno para suspender o retirar");
        }

        // $.ajax({
        //     url: "./controller/controller_estudiantes.php",
        //     method: "post",
        //     dataType: "json",
        //     data: {id_estudiante: id_estudiante, estado: estado, datos: datos},
        //     success: function(data) {
        //         if (data === false) {
        //             Swal.fire({
        //                 position: 'top-end',
        //                 icon: 'error',
        //                 title: 'No se pudo desactivar al estudiante',
        //                 toast: true,
        //                 showConfirmButton: false,
        //                 timer: 2000,
        //                 timerProgressBar: true
        //             });
        //         } else {
        //             if (estado == 1) {
        //                 Swal.fire({
        //                     position: 'top-end',
        //                     icon: 'warning',
        //                     title: 'Estudiante Suspendido !!',
        //                     toast: true,
        //                     showConfirmButton: false,
        //                     timer: 2000,
        //                     timerProgressBar: true
        //                 });
        //             } else {
        //                 Swal.fire({
        //                     position: 'top-end',
        //                     icon: 'success',
        //                     title: 'Estudiante reitegrado',
        //                     toast: true,
        //                     showConfirmButton: false,
        //                     timer: 2000,
        //                     timerProgressBar: true
        //                 });
        //             }
        //             tabla_estudiantes.ajax.reload(null, false);
        //         }
        //     }
        // });
    });


    // ELIMINAR UN ESTUDIANTE /==================================
    $('#estudiantes tbody').on('click', '#btn_eliminar_estudiante', function() {
        let data  = tabla_estudiantes.row($(this).parents()).data();
        id_estudiante = data.id_estudiante;
        nombres = data.nombres_estudiante + " " + data.apellido_paterno_estudiante + " " + data.apellido_materno_estudiante;
        Swal.fire({
            icon: 'question',
            title: 'Se eliminará al estudiante \n "' + nombres + '"',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#2691d9',
            cancelButtonColor: '#adadad'
        }).then(resultado => {
            if (resultado.isConfirmed) {
                datos = "eliminar_estudiante";

                $.ajax({
                    url: './controller/controller_estudiantes.php',
                    type: 'post',
                    dataType: 'json',
                    data: {id_estudiante: id_estudiante, datos: datos},
                    success: function(data) {
                        if (data === false) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error al eliminar estudiante !!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Estudiante eliminado !!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            tabla_apoderados.ajax.reload(null, false);
                        }
                    }
                });
            } 
        });
    });


    // CARGAR LETRA DE GRADO EN MODAL /==========================
    $('#estudiante_grado').change(function() {
        let grado = $(this).val();
        let funcion = 'cargar_letras';

        if (grado == 'Grado') {
            $("#estudiante_letra").html('');
        } else {
            $.ajax({
                url: './controller/controller_cursos.php',
                type: 'post',
                dataType: 'json',
                data: { grado: grado, funcion: funcion},
                success: function(data) {
                    $('#estudiante_letra').html(data);
                }
            });
        }
    });
    


})




let spanish = {
    "aria": {
        "sortAscending": ": orden ascendente",
        "sortDescending": ": orden descendente"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Llenar todas las celdas con <i>%d&lt;\\\/i&gt;<\/i>",
        "fillHorizontal": "Llenar celdas horizontalmente",
        "fillVertical": "Llenar celdas verticalmente"
    },
    "buttons": {
        "collection": "Colección <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
        "colvis": "Visibilidad de la columna",
        "colvisRestore": "Restaurar visibilidad",
        "copy": "Copiar",
        "copyKeys": "Presiona ctrl or u2318 + C para copiar los datos de la tabla al portapapeles.<br \/><br \/>Para cancelar, haz click en este mensaje o presiona esc.",
        "copySuccess": {
            "_": "Copió %ds registros al portapapeles",
            "1": "Copió un registro al portapapeles"
        },
        "copyTitle": "Copiado al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "_": "Mostrar %ds registros",
            "-1": "Mostrar todos los registros"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "datetime": {
        "amPm": [
            "AM",
            "PM"
        ],
        "hours": "Horas",
        "minutes": "Minutos",
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "next": "Siguiente",
        "previous": "Anterior",
        "seconds": "Segundos",
        "weekdays": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ]
    },
    "decimal": ",",
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "submit": "Crear",
            "title": "Crear nuevo registro"
        },
        "edit": {
            "button": "Editar",
            "submit": "Actualizar",
            "title": "Editar registro"
        },
        "error": {
            "system": "Ocurrió un error de sistema (&lt;a target=\"\\\" rel=\"nofollow\" href=\"\\\"&gt;Más información)."
        },
        "multi": {
            "info": "Los elementos seleccionados contienen diferentes valores para esta entrada. Para editar y configurar todos los elementos de esta entrada con el mismo valor, haga clic o toque aquí, de lo contrario, conservarán sus valores individuales.",
            "noMulti": "Esta entrada se puede editar individualmente, pero no como parte de un grupo.",
            "restore": "Deshacer cambios",
            "title": "Múltiples valores"
        },
        "remove": {
            "button": "Eliminar",
            "confirm": {
                "_": "¿Está seguro de que desea eliminar %d registros?",
                "1": "¿Está seguro de que desea eliminar 1 registro?"
            },
            "submit": "Eliminar",
            "title": "Eliminar registro"
        }
    },
    "emptyTable": "Sin registros",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
    "infoFiltered": "(filtrado de _MAX_ registros)",
    "infoThousands": ".",
    "lengthMenu": "Mostrar _MENU_ registros",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "processing": "Procesando...",
    "search": "Buscar:",
    "searchBuilder": {
        "add": "Agregar Condición",
        "button": {
            "_": "Filtros (%d)",
            "0": "Filtrar"
        },
        "clearAll": "Limpiar Todo",
        "condition": "Condición",
        "conditions": {
            "array": {
                "contains": "Contiene",
                "empty": "Vacío",
                "equals": "Igual",
                "not": "Distinto",
                "notEmpty": "No vacío",
                "without": "Sin"
            },
            "date": {
                "after": "Mayor",
                "before": "Menor",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual",
                "not": "Distinto",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual",
                "gt": "Mayor",
                "gte": "Mayor o igual",
                "lt": "Menor",
                "lte": "Menor o igual",
                "not": "Distinto",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina con",
                "equals": "Igual",
                "not": "Distinto",
                "notEmpty": "No vacío",
                "startsWith": "Comienza con"
            }
        },
        "data": "Datos",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Filtros anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Filtro",
        "title": {
            "_": "Filtros (%d)",
            "0": "Filtrar"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Limpiar todo",
        "collapse": {
            "_": "Paneles de búsqueda (%d)",
            "0": "Paneles de búsqueda"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda...",
        "title": "Filtros activos - %d"
    },
    "select": {
        "cells": {
            "_": "%d celdas seleccionadas",
            "1": "Una celda seleccionada"
        },
        "columns": {
            "_": "%d columnas seleccionadas",
            "1": "Una columna seleccionada"
        }
    },
    "thousands": ".",
    "zeroRecords": "No se encontraron registros"
}