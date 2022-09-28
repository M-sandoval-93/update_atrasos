<div id="modal_form_inasistenciaF" class="modal">
    <form action="#" class="modal-content animate inasistenciaF" method="POST" id="form_inasistenciaF">
        <div class="modal-header">
            <h2 id="titulo-modal_inasistenciaF"></h2>
        </div>

        <hr>

        <div class="modal-inputs">
            <!-- MAQUETAR FORMULARIO PARA REGISTRAR INASISTENCIA -->
            
            <label>Tipo Inaistencia</label>
            <div>
                <div>
                    <input type="radio" name="tipo_inasistencia" value="1" id="licencia">
                    <label for="licencia">Licencia Medica</label>
                </div>

                <div>
                    <input type="radio" name="tipo_inasistencia" value="2" id="permiso">
                    <label for="permiso">Permiso administrativo</label>
                </div>

                <div>
                    <input type="radio" name="tipo_inasistencia" value="3" id="ausencia">
                    <label for="ausencia">Ausencia Injustificada</label>
                </div>
            </div>

            <div class="section">
                <label for="inasistenciaF_rut">Rut Funcionario</label>
                <input class="input-rut" type="text" id="inasistenciaF_rut" name="rut" maxlength="8">   <!-- REVISAR SI MANTENGO EL LIMITE DE CARACTERES -->
                <span></span>
                <input class="input-rut-dv" type="text" id="inasistenciaF_rut_dv" name="rut_dv">
            </div>
            <label id="nombre_inasistenciaF"></label>

            <div class="section">
                <div>
                    <label for="inasistenciaF_fecha_inicio">Fecha inicio</label>
                    <input type="date" id="inasistenciaF_fecha_inicio" name="fecha_inicio">
                </div>
                <div>
                    <label for="inasistenciaF_fecha_termino">Fecha termino</label>
                    <input type="date" id="inasistenciaF_fecha_termino" name="fecha_termino">
                </div>
                <div>
                    <label for="inasistenciaF_dias">Días</label>
                    <input type="text" id="inasistenciaF_dias" name="dias" disabled>
                </div>
            </div>

            <label>Cuenta con reemplazo?</label>
            <div class="section">
                <div>
                    <input type="radio" name="reemplazo" value="1" id="reemplazo_si"> Si
                    <!-- <label for="reemplazo_si">Si</label> -->
                </div>

                <div>
                    <input type="radio" name="reemplazo" value="2" id="reemplazo_no"> No
                    <!-- <label for="reemplazo_no">No</label> -->
                </div>
            </div>

            <div class="section section_hidden reemplazo">
                <label for="inasistenciaF_ordinario">Número Ordinario</label>
                <input class="" type="number" id="inasistenciaF_ordinario" name="ordinario">
            </div>

            <div class="section_hidden reemplazo">
                <div>
                    <label for="inasistenciaF_reemplazo_rut">Funcionario reemplazante</label>
                    <input class="input-rut" type="text" id="inasistenciaF_reemplazo_rut" name="rut_reempalzo" maxlength="8">  <!-- REVISAR SI MANTENGO EL LIMITE DE CARACTERES -->
                    <span></span>
                    <input class="input-rut-dv" type="text" id="inasistenciaF_reemplazo_rut_dv" name="rut_dv_reemplazo">
                    <button class="btn" id="btn_mi_agregar_funcionario"><i class="fas fa-plus-circle"></i></button>
                </div>
                <label id="inasistenciaF_nombre_reemplazo"></label>
            </div>
        </div>

        <hr>

        <div class="modal-footer">
            <button class="btn btn-l btn-data" type="submit" id="btn_modal_registrar_insistenciaF">Registrar</button>
            <button class="btn btn-l btn-delete" type="reset" id="btn_modal_cancelar_inaistenciaF">Cancelar</button>
        </div>
    </form>
</div>