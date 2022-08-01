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
            <h1 class="title">Cursos por Nivel</h1>
            <ul class="breadcrumbs">
                <li><a href="#">Cursos por nivel</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>

            <h1 class="sub-title">Educación Básica</h1>
            <div class="info-data curso">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>75</h2>
                            <p>Estudiantes en 7° Básico</p>
                        </div>
                        <div>
                            <i class="fas fa-angle-double-up icon up"></i>
                            <i class="fas fa-edit icon edit"></i>
                        </div>
                    </div>
                    <span class="progress up" data-value="100%"></span>
                    <div class="content-label">
                        <span class="label">100%</span>
                        <span class="label">Cupo: 0</span>
                    </div>
                </div>


                <div class="card">
                    <div class="head">
                        <div>
                            <h2>80</h2>
                            <p>Estudiantes en 8° Básico</p>
                        </div>
                        <!-- <i class="fas fa-angle-double-up icon up"></i> -->
                        <div>
                            <i class="fas fa-angle-double-up icon up"></i>
                            <i class="fas fa-edit icon edit"></i>
                        </div>
                    </div>
                    <span class="progress up" data-value="100%"></span>
                    <div class="content-label">
                        <span class="label">100%</span>
                        <span class="label">Cupo: 0</span>
                    </div>
                </div>
            </div>

            <h1 class="sub-title">Educación Media</h1>
            <div class="info-data curso">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>75</h2>
                            <p>Estudiantes en 1° Medio</p>
                        </div>
                        <!-- <i class="fas fa-angle-double-up icon up"></i> -->
                        <div>
                            <i class="fas fa-angle-double-up icon up"></i>
                            <i class="fas fa-edit icon edit"></i>
                        </div>
                    </div>
                    <span class="progress up" data-value="100%"></span>
                    <div class="content-label">
                        <span class="label">100%</span>
                        <span class="label">Cupo: 0</span>
                    </div>
                </div>

                <div class="card">
                    <div class="head">
                        <div>
                            <h2>264</h2>
                            <p>Estudiantes en 2° Medio</p>
                        </div>
                        <!-- <i class="fas fa-angle-double-up icon up"></i> -->
                        <div>
                            <i class="fas fa-angle-double-up icon up"></i>
                            <i class="fas fa-edit icon edit"></i>
                        </div>
                    </div>
                    <span class="progress up" data-value="100%"></span>
                    <div class="content-label">
                        <span class="label">100%</span>
                        <span class="label">Cupo: 0</span>
                    </div>
                </div>

                <div class="card">
                    <div class="head">
                        <div>
                            <h2>264</h2>
                            <p>Estudiantes en 3° Medio</p>
                        </div>
                        <!-- <i class="fas fa-angle-double-up icon up"></i> -->
                        <div>
                            <i class="fas fa-angle-double-up icon up"></i>
                            <i class="fas fa-edit icon edit"></i>
                        </div>
                    </div>
                    <span class="progress up" data-value="100%"></span>
                    <div class="content-label">
                        <span class="label">100%</span>
                        <span class="label">Cupo: 0</span>
                    </div>
                </div>

                <div class="card">
                    <div class="head">
                        <div>
                            <h2>264</h2>
                            <p>Estudiantes en 4° Medio</p>
                        </div>
                        <!-- <i class="fas fa-angle-double-up icon up"></i> -->
                        <div>
                            <i class="fas fa-angle-double-up icon up"></i>
                            <i class="fas fa-edit icon edit"></i>
                        </div>
                    </div>
                    <span class="progress up" data-value="95%"></span>
                    <div class="content-label">
                        <span class="label">95%</span>
                        <span class="label">Cupo: 4</span>
                    </div>
                </div>
            </div>


        </main>
        <!-- MAIN -->
    <!--  PRINCIPAL -->
        
<!-- FOOTER -->
<?php include_once "./layout/footer.php"; ?>