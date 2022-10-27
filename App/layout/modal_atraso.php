
<!-- Modal Atraso -->
<div class="modal fade" id="modal_atraso" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modal_atraso_title">REGISTRAR ATRASO</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" id="modal_registro_atraso">
        <div class="modal-body">

          <fieldset disabled>
            <div class="row">
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
            <div id="alerta_suspencion" class="mt-3">
            <div id="alerta"></div>
            </div>
          </fieldset>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success btn-lg" id="registrar_atraso">Registrar</button>
        </div>

      </form>
    </div>
  </div>
</div>



<!-- Modal Justificación -->

