<?php
    if (!isset($_SESSION['usser']['name'])) {
        header("location: ../");
    }

    /* HEADER */
    include_once "./layout/header.php";

?>
  
   <!--  PRINCIPAL -->
        <!-- MAIN -->
        <main>
            <h1 class="title">Funcionarios</h1>
            <ul class="breadcrumbs">
                <li><a href="#">Funcionarios</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>
            <div class="info-data">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>1400</h2>
                            <p>Alumnos matriculados</p>
                        </div>
                        <i class="fas fa-angle-double-up icon up"></i>
                    </div>
                    <span class="progress up" data-value="50%"></span>
                    <span class="label">50%</span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>17</h2>
                            <p>Alumnos retirados</p>
                        </div>
                        <i class="fas fa-angle-double-down icon down"></i>
                    </div>
                    <span class="progress down" data-value="2%"></span>
                    <span class="label">2%</span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>50</h2>
                            <p>Lista de espera</p>
                        </div>
                        <i class="fas fa-hourglass-start icon start"></i>
                    </div>
                    <span class="progress start" data-value="10%"></span>
                    <span class="label">10%</span>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    <!--  PRINCIPAL -->
        
<!-- FOOTER -->
<?php include_once "./layout/footer.php"; ?>