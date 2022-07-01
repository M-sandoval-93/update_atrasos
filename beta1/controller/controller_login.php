<?php

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$data = false;

if ($usuario == "msandoval" && $clave == "msandoval") {
    $data = true;

} else {
    $data = false;
}

print json_encode($data);
    

// Se llama a la sesion y se utiliza el método de validar usuario

?>