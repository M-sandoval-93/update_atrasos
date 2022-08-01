<?php
    if (!isset($_SESSION['usser']['name'])) {
        header("location: ../");
    }

    /* HEADER */
    include_once "./layout/header.php";
    include_once "./config/listas.php"
?>

    <!--  PRINCIPAL -->
        <!-- MAIN -->

    <?php

        include_once "./model/model_cursos.php";
        //include_once "../model/model_cursos.php";

/*         $septimo = new Curso('7', 'C');
        $septimo->generarCurso(); */

        echo "Sentencia finalizada";


/*         foreach (LETRAS as $letra) {
            if ($letra <= 'C') {
                echo "7".$letra."</BR>";
            }
        } */



    ?>

    
        <!-- MAIN -->
    <!--  PRINCIPAL -->

    <!-- FOOTER -->
    <?php include_once "./layout/footer.php"; ?>
