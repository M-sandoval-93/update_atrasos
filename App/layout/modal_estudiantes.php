<?php 

// Consultar datos de los cursos disponibles en php

// rediseñar


?>

    <!-- ELIMINAR SCRIPT -->
    <!-- <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../Pluggins/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../css/data_table.css"> -->
    <!-- ELIMINAR SCRIPT -->

<div id="modal_form_estudiantes" class="modal">
    <form action="#" class="modal-content animate estudiantes" method="POST" id="form_estudiantes">
        <div class="modal-header">
            <h2 id="titulo-modal_estudiante"></h2>
        </div>
        <hr>
        <div class="modal-inputs">
            
            <div>
                <div>
                    <label for="estudiante_fecha_ingreso">Fecha ingreso</label>
                    <input type="date" id="estudiante_fecha_ingreso" name="fecha_ingreso">
                </div>
    
                <div>
                    <label for="estudiante_matricula">Matricula</label>
                    <input type="text" id="estudiante_matricula" name="matricula">
                </div>
            
                <div>
                    <label for="estudiante_rut">Rut</label>
                    <input class="input-rut" type="text" id="estudiante_rut" name="rut" maxlength="8">
                    <span></span>
                    <input class="input-rut-dv" type="text" id="estudiante_dv_rut" maxlength="1">
                </div>
            </div>

            <div>
                <label for="estudiante_nombres">Nombres</label>
                <input type="text" id="estudiante_nombres" name="nombres">
    
                <label for="estudiante_ap_paterno">Apellido Paterno</label>
                <input type="text" id="estudiante_ap_paterno" name="ap_paterno">
                
                <label for="estudiante_ap_materno">Apellido Materno</label>
                <input type="text" id="estudiante_ap_materno" name="ap_materno">
            </div>
            
            <label for="estudiante_nombre_social">Nombre Social</label>
            <input type="text" id="estudiante_nombre_social" name="nombre_social">

            <label for="estudiante_grado">Curso</label>
            <select name="grado" id="estudiante_grado">
                <option disable selected>Grado</option>
                <option value="7">Septimo</option>
                <option value="8">Octavo</option>
                <option value="1">Primero</option>
                <option value="2">Segundo</option>
                <option value="3">Tercero</option>
                <option value="4">Cuarto</option>
            </select>

            <!-- <label for="estudiante_letra">Letra del grado</label> -->
            <select name="grado" id="estudiante_letra">
                <option disable selected>Letra</option>
                <option value="A">A</option>
            </select>

            <label for="estudiante_fecha_nacimiento">Fecha Nacimiento</label>
            <input type="text" id="estudiante_fecha_nacimiento" name="fecha_nacimiento">

            <label>Sexo Estudiante</label>
            <label ><input type="radio" name="sexo" id="sexo_masculino" value="Masculino"> Masculino</label>
            <label><input type="radio" name="sexo" id="sexo_femenina" value="Femenina"> Femenino</label>

            <label>Beneficio junaeb</label>
            <label ><input type="radio" name="junaeb" id="junaeb_si" value="SI"> SI</label>
            <label><input type="radio" name="junaeb" id="junaeb_no" value="NO"> NO</label>

            <div>
                <label for="">Apoderado titular</label>
                <input class="input-rut" type="text" id="apoderado_titula_rut" name="rut" maxlength="8">
                <span></span>
                <input class="input-rut-dv" type="text" id="apoderado_titular_dv_rut" maxlength="1">
                <button id="btn_agregar_titular"><i class="fas fa-plus-circle"></i></button>
            </div>

            <div>
                <label for="">Apoderado titular</label>
                <input class="input-rut" type="text" id="apoderado_titula_rut" name="rut" maxlength="8">
                <span></span>
                <input class="input-rut-dv" type="text" id="apoderado_titular_dv_rut" maxlength="1">
                <button id="btn_agregar_suplente"><i class="fas fa-plus-circle"></i></button>
            </div>
            
        </div>
        <div class="modal-footer">
            <button class="btn btn-l btn-data" type="submit" id="btn_modal_registrar_estudiante">Registrar</button>
            <button class="btn btn-l btn-delete" type="reset" id="btn_modal_cancelar_estudiante">Cancelar</button>
        </div>
    </form>
</div>


    <!-- ELIMINAR SCRIPT -->
    <!-- <script src="../Pluggins/jQuery/jquery-3.6.0.min.js"></script>
    <script src="../Pluggins/DataTables/datatables.min.js"></script>
    <script src="../Pluggins/SweetAlert2/sweetalert2.all.min.js"></script>

    <script src="../js/estudiantes.js"></script>
    <script src="../js/dashboard.js"></script> -->
    <!-- ELIMINAR SCRIPT -->