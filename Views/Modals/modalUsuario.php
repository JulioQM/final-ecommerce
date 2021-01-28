<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- <div class="modal-dialog modal-dialog-centered" role="document"> -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formUsuario" name="formUsuario" class="form-horizontal">
                    <input type="hidden" name="idUser" id="idUser" value="">
                    <p class="text-primary">Todos los campos son obligatorios.</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtIdUsuario">Id Usuario</label>
                            <input type="text" class="form-control" id="txtIdUsuario" name="idusuario" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="listRol">Rol</label>
                            <select class="form-control selectpicker" id="listRol" name="idrol" required>
                                <option value="1">Administrador</option>
                                <option value="2">Cliente</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtNombre">Nombres</label>
                            <input type="text" class="form-control" id="txtNombre" name="nombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtCorreo">Correo</label>
                            <input class="form-control" id="txtCorreo" name="correo" type="email" aria-describedby="emailHelp" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtUsuario">Usuario</label>
                            <input type="text" class="form-control" id="txtUsuario" name="usuario" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtPassword">Password</label>
                            <input type="password" class="form-control" id="txtPassword" name="clave" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="listStatus">Estado</label>
                            <select class="form-control selectpicker" id="listStatus" name="estatus" required>
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
