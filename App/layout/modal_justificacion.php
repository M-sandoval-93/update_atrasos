
<!-- Modal justificacion falta -->
<div class="modal fade" id="modal_registro_justificacion_falta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modal_justificacion_title">REGISTRAR JUSTIFICACIÓN FALTA</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="form_registro_justificacion_falta">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    <div class="row align-items-center">
                        <label for="justificacion_rut_estudiante" class="form-label">Rut estudiante</label>
                        <div class="col-8 rut">
                            <input type="text" class="form-control text-center" id="justificacion_rut_estudiante" required>
                        </div>
                        <div class="col-1 not_padding text-center">
                            <span>-</span>
                        </div>
                        <div class="col-3 dv_rut">
                            <input type="text" class="form-control text-center" id="justifica_dv_rut_estudiante" disabled>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-4">
                    <label for="justificacion_fecha" class="form-label">Fecha </label>
                    <input type="text" class="form-control text-center" id="justificacion_fecha" value="" disabled>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-9 col-md-10">
                    <label for="justificacion_nombre_estudiante" class="form-label">Nombre estudiante</label>
                    <input type="text" class="form-control" id="justificacion_nombre_estudiante" disabled>
                </div>
                <div class="col-sm-3 col-md-2">
                    <label for="justificacion_curso_estudiante" class="form-label">Curso</label>
                    <input type="text" class="form-control" id="justificacion_curso_estudiante" disabled>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-5 col-md-3">
                    <label for="justificacion_fecha_inicio" class="form-label">Fecha inicio</label>
                    <input type="date" id="justificacion_fecha_inicio" class="form-control">
                </div>

                <div class="col-sm-5 col-md-3">
                    <label for="justificacion_fecha_termino" class="form-label">Fecha termino</label>
                    <input type="date" id="justificacion_fecha_termino" class="form-control">
                </div>

                <div class="col-sm-2 col-md-2">
                    <label for="justificacion_dias_falta" class="form-label">Días</label>
                    <input type="text" id="justificacion_dias_falta" class="form-control" disabled>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-8">
                    <label for="justificacion_apoderado" class="form-label">Apoderado(a)</label>
                    <select id="justificacion_apoderado" class="form-select"></select>
                </div>
                <div class="col-sm-4">
                    <label for="Justificacion_tipo_apoderado" class="form-label">Tipo</label>
                    <input type="text" id="Justificacion_tipo_apoderado" class="form-control" disabled>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <label for="justificacion_motivo_causa" class="form-label">Motivo/Causa inasistencia</label>
                    <textarea id="justificacion_motivo_causa" class="form-control"></textarea>
                </div>
            </div>

            <div class="row mt-3 align-items-center">
                <div class="col-3">
                    <div class="form-check">
                        <input type="checkbox" id="justificacion_documento" class="form-check-input">
                        <label for="justificacion_documento" class="form-check-label">Presenta documento</label>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-check">
                        <input type="checkbox" id="justificacion_prueba_pendiente" class="form-check-input">
                        <label for="justificacion_prueba_pendiente" class="form-check-label">Prueba pendiente</label>
                    </div>
                </div>
            </div>






        </div>
      </form>

      <!-- <form id="form_registro_atraso">
        <div class="modal-body">

          <fieldset disabled>
            <div class="row g-3">
              <div class="col-sm-4 col-lg-3">
                <label for="staticFecha" class="form-label">Fecha </label>
                <input type="text" class="form-control text-center" id="staticFecha" value="">
              </div>

              <div class="col-sm-4 col-lg-3">
                <label for="staticHora" class="form-label">Hora </label>
                <input type="text" class="form-control text-center" id="staticHora" value="">
              </div>
            </div>
          </fieldset>

          <did class="row align-items-center mt-4">
            <label for="rut_estudiante_atraso" class="form-label">Rut</label>
            <div class="col-sm-6 col-lg-5">
              <div class="row align-items-center">
                <div class="col-7 rut">
                  <input type="text" class="form-control text-center" id="rut_estudiante_atraso" required>
                </div>
                <div class="col-1 not_padding text-center">
                  <span>-</span>
                </div>
                <div class="col-4 dv_rut">
                  <input type="text" class="form-control text-center" id="dv_rut_estudiante_atraso" disabled>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-7">
              <span class="form-text" id="informacion_rut">Rut sin puntos, sin guión y sin dígito verificador</span>
            </div>
          </did>

          <fieldset disabled>
            <div class="row mt-2 g-3 align-items-center" disabled>
              <div class="col-sm-9 col-lg-10">
                <label for="nombre_estudiante_atraso" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_estudiante_atraso">
              </div>
              <div class="col-sm-3 col-lg-2">
                <label for="curso_estudiante_atraso" class="form-label">Curso</label>
                <input type="text" class="form-control" id="curso_estudiante_atraso">
              </div>
            </div>
            <p class="text-success mt-3" id="cantidad_atrasos"></p>
            <div id="alerta_atrasos" class="mt-2">
              <div class="alert alert-success alert-dismissible" id="alerta_atraso_cantidad"></div>
            </div>
            <div id="alerta_suspencion" class="mt-3">
              <div class="alert alert-danger alert-dismissible" id="alerta_suspencion_activa"></div>
            </div>
          </fieldset>
        </div> -->

        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success btn-lg" id="btn_registrar_atraso">Registrar</button>
        </div>

      </form>
    </div>
  </div>
</div>