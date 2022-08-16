<div id="modal_form" class="modal">
    <form action="#" class="modal-content animate" method="POST">
        <div class="modal-header">
            <h2>Ingreso nuevo apoderado</h2>
        </div>
        <hr>
        <div class="modal-inputs">
            <label for="rut">Rut</label>
            <input class="modal-inputs__apoderado" type="text" id="apoderado_rut" name="rut">

            <label for="nombres">Nombres</label>
            <input class="modal-inputs__apoderado" type="text" id="apoderado_nombres" name="nombres">

            <label for="ap_paterno">Apellido Paterno</label>
            <input class="modal-inputs__apoderado" type="text" id="apoderado_ap_paterno" name="ap_paterno">

            <label for="ap_materno">Apellido Materno</label>
            <input class="modal-inputs__apoderado" type="text" id="apoderado_ap_materno" name="ap_materno">

            <input type="radio" name="masculino" id="masculino" value="M">
            <label for="masculino">Masculino</label>
            <input type="radio" name="femenino" id="femenino" value="F">
            <label for="femenino">Femenino</label>
        </div>
        <hr>
        <div class="modal-footer">
            <button class="modal-footer__btn" type="submit" id="btn_modal_enviar">Ingresar</button>
            <button class="modal-footer__btn" type="reset" id="btn_modal_cancelar">Cancelar</button>
        </div>
    </form>
</div>