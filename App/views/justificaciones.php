<?php   include_once "./layout/header.php"; ?>

            <!-- titulo del layout -->
            <!-- <div class="row d-flex align-items-center">
                <div class="col-md-12">
                    <div class="titulo_main">
                        <h1 class="titulo_main__titulo">Registro Justificación Estudiantes</h1>
                        <ul class="titulo_main__sub">
                            <li><a href="home">Home</a></li>
                            <li class="divider">/</li>
                            <li><a href="#" class="active">Justificación estudiantes</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->


            <!-- titulo del layout -->
            <div class="row d-flex align-items-center">
                <div class="col-md-5">
                    <!-- titulo del layout -->
                    <div class="titulo_main">
                        <h1 class="titulo_main__titulo">Registro Justificación Estudiantes</h1>
                        <ul class="titulo_main__sub">
                            <li><a href="home">Home</a></li>
                            <li class="divider">/</li>
                            <li><a href="#" class="active">Justificación estudiantes</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-7">
                    <!-- card -->
                    <div class="caja_tarjeta_2 d-flex justify-content-center">
                        <div class="tarjeta">
                            <div class="px-3">
                                <div class="numero" id="justificacion_diaria"></div>
                                <div class="detalle">Justificaciones anuales</div>
                            </div>
                            <div class="icono_tarjeta">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla de contenido principal -->
            <div class="d-flex justify-content-between mb-4">
                <button type="button" class="btn-lg btn-primary" id="btn_nuevo_atraso" data-bs-toggle="modal" data-bs-target="#modal_registro_atraso">
                    <i class="fas fa-user-plus icon"></i>
                </button>
                <!-- <div class="row g-2">
                    <div class="col-4">
                        <button class="btn-lg btn-success" id="btn_excel_atraso" title="Exportar Excel"><i class="fas fa-file-excel icon"></i></button>
                    </div>
                    <div class="col-4">
                        <button class="btn-lg btn-secondary" id="btn_csv_atraso" title="Exportar CSV"><i class="fas fa-file-csv icon"></i></button>
                    </div>
                    <div class="col-4">
                        <button class="btn-lg btn-danger" id="btn_pdf_atraso" title="Exportar PDF"><i class="fas fa-file-pdf icon"></i></button>
                    </div>
                </div> -->
            </div>


            <div class="table-responsive">
                <table id="justificacion_estudiante" class="table table-hover text-nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th></th>
                            <th>Rut</th>
                            <th>Ap Paterno</th>
                            <th>Ap Materno</th>
                            <th>Nombres</th>
                            <th>Curso</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>


<!-- modal -->
<?php   //include_once "./layout/modal_atraso.php";   ?>



            <!-- <div class="row mt-4">
                <div class="col-sm-5 col-lg-3">
                    <div class="row align-items-center">
                        <label for="rut_estudiante_atraso" class="form-label">Rut estudiante</label>
                        <div class="col-8 rut">
                            <input type="text" class="form-control text-center" id="justifica_rut_estudiante" required>
                        </div>
                        <div class="col-1 not_padding text-center">
                            <span>-</span>
                        </div>
                        <div class="col-3 dv_rut">
                            <input type="text" class="form-control text-center" id="justifica_dv_rut_estudiante" disabled>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-lg-8">
                    <label for="justifica_nombre_estudiante" class="form-label">Nombre estudiante</label>
                    <input type="text" id="justifica_nombre_estudiante" class="form-control" disabled>
                </div>

                <div class="col-sm-2 col-lg-1">
                    <label for="justifica_curso_estudiante" class="form-label">Curso</label>
                    <input type="text" id="justifica_curso_estudiante" class="form-control" disabled>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-6">
                            <label for="justifica_fecha_inicio" class="form-label">Fecha inicio</label>
                            <input type="date" id="justifica_fecha_inicio" class="form-control">
                        </div>

                        <div class="col-6">
                            <label for="justifica_fecha_termino" class="form-label">Fecha termino</label>
                            <input type="date" id="justifica_fecha_termino" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-1">
                    <label for="justifica_dias_inasistencia" class="form-label">Días</label>
                    <input id="justifica_dias_inasistencia" class="form-control" disabled></input>
                </div>

                <div class="col-lg-7">
                    <label for="justifica_nombre_apoderado" class="form-label">Nombre apoderado</label>
                    <select id="justifica_nombre_apoderado" class="form-select"></select>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-lg-12">
                    <label for="justifica_motivo_causa" class="form-label">Motivo/Causa inasistencia</label>
                    <textarea id="justifica_motivo_causa" class="form-control"></textarea>
                </div>
            </div>
            
            <div class="row mt-3 align-items-center">
                <div class="col-3">
                    <div class="form-check">
                        <input type="checkbox" id="justifica_documento" class="form-check-input">
                        <label for="justifica_documento" class="form-check-label">Presenta documento</label>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-check">
                        <input type="checkbox" id="justifica_prueba_pendiente" class="form-check-input">
                        <label for="justifica_prueba_pendiente" class="form-check-label">Prueba pendiente</label>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary">Justificar</button>
                </div>
            </div> -->







  

<!-- script generales del proyecto -->
<?php   include_once "./layout/footer.php"; ?>


    <!-- script layout atrasos -->
    <script src="./js/justificacion.js" type="module"></script>


</body>
</html>