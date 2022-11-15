<?php   include_once "./layout/header.php"; ?>

            <!-- titulo del layout -->
            <div class="row d-flex align-items-center">
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
            </div>

            <div class="row mt-4">
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
            </div>







  

<!-- script generales del proyecto -->
<?php   include_once "./layout/footer.php"; ?>


    <!-- script layout atrasos -->
    <script src="./js/justificar.js" type="module"></script>


</body>
</html>