<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- <div class="modal-dialog modal-dialog-centered" role="document"> -->
    <div class="modal-dialog modal-l">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formRol" name="formRol" class="form-horizontal">
                    <input type="hidden" name="idRol" id="idRol" value="">
                    <p class="text-primary">Todos los campos son obligatorios.</p>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="txtIdRol">Id Rol</label>
                            <input type="text" class="form-control" id="txtIdRol" name="idrol" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="txtRol">Nombre del Rol</label>
                            <input type="text" class="form-control" id="txtRol" name="rol" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="listStatus">Estado</label>
                            <select class="form-control selectpicker" id="listStatus" name="estado" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
