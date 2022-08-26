$(document).ready(function() {

    // VARIABLES GLOBALES
    // let modal = $('#modal_form');
    let registrar;
    let id_estudiante;

    // BOTÓN NUEVO ESTUDIANTE /==================================

    // BOTÓN MODAL REGISTRAR /===================================

    // BOTÓN MODAL CANCELAR /====================================




    // FUNCION PARA GENERAR INFORMCION ADICIONAL
    function format(d) {
        return (
            '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                    '<td>Full name:</td>' +
                    '<td>' +
                    d.rut_estudiante +
                    '</td>' +
                '</tr>' +

                '<tr>' +
                    '<td>Extension number:</td>' +
                    '<td>' +
                    d.nombres_estudiante +
                    '</td>' +
                '</tr>' +

                '<tr>' +
                    '<td>Extra info:</td>' +
                    '<td>And any further details here (images etc)...</td>' +
                '</tr>' +
            '</table>'
        );
    }

    // DATATABLE /===============================================
    datos = 'mostrar_estudiantes';
    let tabla_apoderados = $('#estudiantes').DataTable({
        ajax: {
            url: "./controller/controller_estudiantes.php",
            method: "post",
            data: {datos: datos}
         },
         columns: [ // INFORMACIÓN DE COLUMNAS
            {
                className: 'xpand',
                data: "id_estudiante",
                mRender: function(data) {
                    return `<button class="btn-expand" id="show_information" type="button"><i class="fas fa-plus-circle"></i></button> 
                            <button class="btn-retract ocultar" id="hidde_information" type="button"><i class="fas fa-times-circle"></i></button>`
                            + data;
                }
            },
            {data: "rut_estudiante"}, // CELDA CONVINADA POR CONSULTA SQL
            {data: "apellido_paterno_estudiante"},
            {data: "apellido_materno_estudiante"},
            {data: "nombres_estudiante"},
            {data: "nombre_social_estudiante"},
            {
                data: 'estado_estudiante',
                bSortable: false,
                mRender: function(data) {
                    let btn_estado;
                    if (data === true) {
                        btn_estado = `<button class="btn btn-s btn-success" id="btn_editar_estado" type="button"><i class="fas fa-lock-open"></i></button>`;
                    } else {
                        btn_estado = `<button class="btn btn-s btn-lock" id="btn_editar_estado" type="button"><i class="fas fa-lock"></i></button>`;
                    }
                    return btn_estado;
                }
            },
            {data: null,
                bSortable: false,
                defaultContent: // BOTONES
                                `<button class="btn btn-s btn-data" id="btn_editar_apoderado" type="button"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-s btn-delete" id="btn_eliminar_apoderado" type="button"><i class="fas fa-trash-alt"></i></button>`
            }
        ],
        "language": spanish
    });

    // EVENTO PARA EXPANDIR TABLA CUANDO SE PRESIONA BTN
    $('#estudiantes tbody').on('click', 'td.xpand', function () {
        let row = tabla_apoderados.row($(this).closest('tr'));
        let row1 = tabla_apoderados.row($(this).parent('tr')).mRender();
 
        if (row.child.isShown()) {
            // ACCIÓN PARA CUANDO SE CONTRAE LA TABLA
            row.child.hide();
            // row1['id_estudiante'].removeClass('ocultar');
             console.log();

            // $('#hidde_information').addClass('ocultar');
            // $('#show_information').removeClass('ocultar');
            
        } else {
            // ACCIÓN PARA CUANDO SE EXPANDE LA TABLA
            row.child(format(row.data())).show();

            // $('#hidde_information').removeClass('ocultar');
            // $('#show_information').addClass('ocultar');
        }
    });





    // EDITAR UN ESTUDIANTE /====================================

    // ACTIVAR O DESACTIVAR UN ESTUDIANTE /======================

    // ELIMINAR UN ESTUDIANTE /==================================






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