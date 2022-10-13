// const { printJS } = require("./print.min");

const btn = document.getElementById('btn_enviar');

btn.addEventListener('click', function(e) {
    e.preventDefault();

    printJS({
        printable: info,
        properties: [
            // {field: 'nombre', displayName: 'full Name'},
            // {field: 'rut', displayName: 'full rut'},
            // {field: 'curso', displayName: 'full curso'}
            // 'Datos del estudiante',
            'datos estudiante'
        ],
        type: 'json',
        // gridHeaderStyle: 'color: green; border: 2px solid black;',
        // gridStyle: 'border: 2px solid red;'
    });
    
});


// async function imprimir(fun) {
//     const respuesta = await fun;

//     if (respuesta === true) {
//         alert("impresion realizada");
//     } else {
//         alert("error");
//     }
// }

// printJS({
//     printable: info,
//     properties: [
//         // {field: 'nombre', displayName: 'full Name'},
//         // {field: 'rut', displayName: 'full rut'},
//         // {field: 'curso', displayName: 'full curso'}
//         // 'Datos del estudiante',
//         'datos estudiante'
//     ],
//     type: 'json',
//     // gridHeaderStyle: 'color: green; border: 2px solid black;',
//     // gridStyle: 'border: 2px solid red;'
// });


info = [
    {
        'datos estudiante': 'Nombre: Alex Ulloa' + 
        '<br>' + 
        'Rut: 11.111.111-1'
    }
]









