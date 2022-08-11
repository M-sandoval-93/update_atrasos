<?php
    if (!isset($_SESSION['usser']['name'])) {
        header("location: ../");
    }
?>

<!DOCTYPE html>
<html lang="eS">
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
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <!-- <link rel="stylesheet" href="./Pluggins/Bootstrap-4.6.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./Pluggins/DataTables/datatables.min.css">
    

    <title>Liceo Valentín Letelier</title>
</head>
<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand"><i class="fas fa-user-circle iconUsser icon"></i> usuario o logo</a>
        <ul class="side-menu">
            <li><a href="home" class="active"><i class="fas fa-school icon"></i> Home</a></li>

            <li class="divider"></li>
            <li>
                <a href="#"><i class="fas fa-user-graduate icon"></i> Estudiantes <i class="fas fa-angle-right icon icon-right"></i></a>
                <ul class="side-dropdown">
                    <li><a href="estudiantes">Estudiantes</a></li>
                    <li><a href="atrasos">Atrasos</a></li>
                    <li><a href="justificaciones">Justificaciones</a></li>
                </ul>
            </li>
            <li><a href="apoderados"><i class="fas fa-user-tie icon"></i> Apoderados</a></li>
            <li><a href="cursos"><i class="fas fa-graduation-cap icon"></i> Cursos</a></li>
            <li><a href="junaeb"><i class="fas fa-utensils icon"></i> JUNAEB</a></li>

            <li class="divider"></li>
            <li>
                <a href="#"><i class="fas fa-user-friends icon"></i> Personal <i class="fas fa-angle-right icon icon-right"></i></a>
                <ul class="side-dropdown">
                    <li><a href="funcionarios">Funcionarios</a></li>
                    <li><a href="permisos">Permisos</a></li>
                    <li><a href="licencias">Licencias</a></li>
                    <li><a href="cambioFunciones">Cambio de funciones</a></li>
                </ul>
            </li>

            <li class="divider"><hr></li>
            <li>
                <a href="#"><i class="fas fa-cogs icon"></i> Setting <i class="fas fa-angle-right icon icon-right"></i></a>
                <ul class="side-dropdown">
                    <li><a href="usuarios">Usuarios</a></li>
                    <li><a href="departamentos">Departamentos</a></li>
                    <li><a href="cargosFunciones">Cargos y funciones</a></li>
                </ul>
            </li>

            <!-- <li class="divider"></li> -->
            <li><a href="mantenimiento"><i class="fas fa-server icon"></i> Mantenimiento</a></li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class="fas fa-bars toggle-sidebar"></i>
            <a href="#" class="nav-link">
                <i class="fas fa-bell icon"></i>
                <span class="badge">5</span>
            </a>
            <span class="divider"></span>
            <div class="profile">
                <img src="./assets/logo_liceo.png" alt="Logo">
                <ul class="profile-link">
                    <li><a href="#"><i class="fas fa-address-card icon"></i> Profile</a></li>
                    <li><a href="#"><i class="fas fa-lock icon"></i> Password</a></li>
                    <li><a href="./controller/controller_exit.php"><i class="fas fa-sign-out-alt icon"></i> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->