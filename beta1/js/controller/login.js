/* ------------------------- style ---------------------- */
const inputs = document.querySelectorAll('.input');

function focusFunc() {
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}

function blurFunc() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove('focus');
    }
}

inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
});
/* ------------------------- style ---------------------- */

/* ----------------------- backend ---------------------- */
/*  $('#id_form_login').submit(function (e) {
     e.preventDefault();
     console.log("Prueba de contenido");
 }); */

 $(document).ready(function() {

    $('#id_form_login').submit(function(e) {
        e.preventDefault();

        let usuario = $.trim($("#id_usuario").val());
        let clave = $.trim($("#id_clave").val());

        if (usuario.length <= 0 || clave.length <=0) {
            /* console.log("El nombre y usuario son requeridos"); */
            Swal.fire({
                icon: 'warning',
                title: 'El nombre de usuario y clave de acceso son necesarios ..!!'
            });
        } else {
            console.log("No hay datos");
            $.ajax ({
                url: 'controller/login.php',
                type: 'post',
                datatype: 'json',
                data: { usuario: usuario, clave: clave},
                success: function(data) {
                    if (data == 'null') {
                        console.log("datos vacios");
                    } else {
                        console.log("acceso completado");
                    }
                }
            });
        }

    });


 });


