<?php
    if (!isset($_SESSION['usser']['name'])) {
        header("location: ../");
    }
?>

<!DOCTYPE html>
<html lang="es">
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

    <!-- Style -->
    <link rel="stylesheet" href="./css/sider.css">
    <link rel="stylesheet" href="./css/normalize.css">

    


    <title>Liceo Valentín Letelier</title>
</head>
<body>

    <!-- <h1>Home</h1> -->

    <div class="navigator">
        <!-- <h1>Home</h1> -->
        <ul>
            <li class="list active">
                <b></b>
                <b></b>
                <a href="#">
                    <span class="icon"><i class="fas fa-home"></i></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list">
                <b></b>
                <b></b>
                <a href="#">
                    <span class="icon"><i class="fas fa-user"></i></span>
                    <span class="title">Usuarios</span>
                </a>
            </li>
            <li class="list">
                <b></b>
                <b></b>
                <a href="#">
                    <span class="icon"><i class="fas fa-cogs"></i></span>
                    <span class="title">Settings</span>
                </a>
            </li>
            <li class="list">
                <b></b>
                <b></b>
                <a href="./controller/controller_exit.php">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="title">Salir</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="toggle">
        <i class="fas fa-bars" id="open"></i>
        <i class="fas fa-times" id="close"></i>
    </div>

    <!-- <a href="./controller/controller_exit.php">salir</a> -->
    <script src="./js/sider.js"></script> 
    
    
</body>
</html>
