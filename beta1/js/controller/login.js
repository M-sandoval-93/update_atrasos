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

        // Captación de las variables
        let usuario = $.trim($("#id_usuario").val());
        let clave = $.trim($("#id_clave").val());

        // Comprobaciones de valor
        if (usuario.length <= 0 || clave.length <=0) {
            Swal.fire({
                icon: 'warning',
                title: 'Faltan datos importantes ..!!',
                allowOutsideClick: false,
                showConfirmButton: false,
                timer: 1500
            });

        } else {
            $.ajax ({
                url: 'controller/controller_login.php',
                type: 'post',
                datatype: 'json',
                data: { usuario: usuario, clave: clave},
                success: function(data) {
                    if (data == 'false') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Usuario inválido',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Ingresando al sistema .....!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(result => {
                            // window.location.href = 'home';
                            console.log("redireccionar hacia el home");
                        });
                    }
                }
            });
            $('#id_form_login').trigger('reset');
            $('#id_usuario').focus();
        }

    });


 });


