<?php
    /* HEADER */
    include_once "./layout/header.php";
?>
  
   <!--  PRINCIPAL -->
        <!-- MAIN -->
        <main>
            <h1 class="title">Apoderados</h1>
            <ul class="breadcrumbs">
                <li><a href="#">Apoderados</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>

            <div>
                <button type="button" id="btn_nuevo_apoderado"><i class="fas fa-plus-square icon"></i></button>
            </div>

            <table id="apoderados" class="display table tabl-hover text-nowrap" style="width: 100%">
                <thead class="text-center">
                    <tr>
                        <td>Rut</td>
                        <td>Apellido Paterno</td>
                        <td>Apellido Materno</td>
                        <td>Nombres</td>
                        <td>Estado</td>
                    </tr>
                </thead>
                <tbody class="text-center"></tbody>
            </table>







        </main>
        <!-- MAIN -->
    <!--  PRINCIPAL -->


    </section>
    <!-- NAVBAR -->


    <script src="./Pluggins/jQuery/jquery-3.6.0.min.js"></script>
    <script src="./Pluggins/DataTables/datatables.min.js"></script>
    <script src="./Pluggins/SweetAlert2/sweetalert2.all.min.js"></script>

    <script src="./js/apoderados.js"></script>
    <script src="./js/dashboard.js"></script>
    
</body>
</html>