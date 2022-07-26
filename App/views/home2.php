<?php
    if (!isset($_SESSION['usser']['name'])) {
        header("location: ../");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;1,600&display=swap" rel="stylesheet"> 

    <!-- icons -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- style -->
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/normalize.css">

    <title>Liceo Valentín Letelier</title>
</head>
<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand"><i class="fas fa-user-circle iconUsser"></i> Nombre Usuario</a>
        <ul class="side-menu">
            <li><a href="#" class="active"><i class="fas fa-school icon"></i> Home</a></li>

            <li class="divider"> -------------- </li>
                <a href="#"><i class="fas fa-user-graduate icon"></i> Estudiantes <i class="fas fa-angle-right icon"></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">Atrasos</a></li>
                    <li><a href="#">Justificaciones</a></li>
                    <li><a href="#">Cambio de curso</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fas fa-user-tie icon"></i> Apoderados</a></li>
            <li><a href="#"><i class="fas fa-graduation-cap icon"></i> Cursos</a></li>

            <li class="divider"> -------------- </li>
            <li>
                <a href="#"><i class="fas fa-user-friends icon"></i> Personal <i class="fas fa-angle-right icon"></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">Funcionarios</a></li>
                    <li><a href="#">Persmisos</a></li>
                    <li><a href="#">Cambio de funciones</a></li>
                </ul>
            </li>

            <li class="divider"> -------------- </li>
            <li>
                <a href="#"><i class="fas fa-cogs icon"></i> Setting <i class="fas fa-angle-right icon"></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">Usuarios</a></li>
                    <li><a href="#">Departamentos</a></li>
                    <li><a href="#">Cargos y funciones</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->


    <!-- NAVBAR -->

        <!-- NAVBAR -->
        <!-- NAVBAR -->

        <!-- MAIN -->
        <!-- MAIN -->

    <!-- NAVBAR -->





    <a href="./controller/controller_exit.php" class="salir">salir</a>
    

    
    
</body>
</html>