<?php   include_once "./layout/header.php"; ?>

            <!-- titulo del layout -->
            <div class="row d-flex align-items-center">
                <div class="col-md-5">
                    <!-- titulo del layout -->
                    <div class="titulo_main">
                        <h1 class="titulo_main__titulo">Registro Atraso Estudiantes</h1>
                        <ul class="titulo_main__sub">
                            <li><a href="home">Home</a></li>
                            <li class="divider">/</li>
                            <li><a href="#" class="active">Atraso estudiantes</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-7">
                    <!-- card -->
                    <div class="caja_tarjeta_2">
                        <div class="tarjeta">
                            <div>
                                <div class="numero">285</div>
                                <div class="detalle">Atrados del día</div>
                            </div>
                            <div class="icono_tarjeta">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="tarjeta">
                            <div>
                                <div class="numero">14623</div>
                                <div class="detalle">Atrasos del año</div>
                            </div>
                            <div class="icono_tarjeta">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Tabla de contenido principal -->
            <div class="d-flex justify-content-between mb-5">
                <button type="button" class="btn-lg btn-primary" id="btn_nueva_inasistencia" data-bs-toggle="modal" data-bs-target="#modal_atraso">
                    <i class="fas fa-user-plus icon"></i>
                </button>
                <div class="row g-2">
                    <div class="col-6">
                        <button class="btn-lg btn-success">excel</button>
                    </div>
                    <div class="col-6">
                        <button class="btn-lg btn-danger">PDF</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="atraso_estudiante" class="table table-hover text-nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th></th>
                            <th>Rut</th>
                            <th>Estudiante</th>
                            <th>Curso</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

<!-- modal -->
<?php   include_once "./layout/modal_atraso.php";   ?>


<!-- script generales del proyecto -->
<?php   include_once "./layout/footer.php"; ?>


    <!-- script layout atrasos -->
    <!-- <script src="./js/inasistenciaF.js" type="module"></script> -->
    <script src="./js/atraso.js" type="module"></script>


</body>
</html>

