<?php
    if (!isset($_SESSION['usser']['name'])) {
        header("location: ../");
    }

    /* HEADER */
    include_once "./layout/header.php";
?>

    <!--  PRINCIPAL -->
        <!-- MAIN -->

        <h1>PRUEBA DE CREACION DE CURSOS</h1>
        <form action="#" method="post" id="form-cursos">
            <input type="text" id="id_grado" placeholder="grado">
            <input type="text" id="id_letra" placeholder="letra">
            <input class="btn" type="submit" value="Login" id="btn_login">
        </form>

        

    
        <!-- MAIN -->
    <!--  PRINCIPAL -->

    <!-- FOOTER -->
    <?php include_once "./layout/footer.php"; ?>
