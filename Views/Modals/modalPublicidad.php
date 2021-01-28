<!-- Modal -->
<div class="modal fade" id="modalFormPublicidad" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- <div class="modal-dialog modal-dialog-centered" role="document"> -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nueva Publicidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formPublicidad" name="formPublicidad" class="form-horizontal">
                    <input type="hidden" name="idPublicidad" id="idPublicidad" value="">
                    <!-- <input type="hidden" name="foto_actual" id="foto_actual" value="">
                    <input type="hidden" name="foto_remove" id="foto_remove" value="0"> -->
                    <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>

                    <!-- <div class="row"> -->
                    <!-- <div class="form-row"> -->
                        <!-- <input type="hidden" name="idPublicidad" id="idPublicidad" value=""> -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="control-label">Id Publicidad <span class="required">*</span></label>
                                <input class="form-control" id="txtPublicidad" name="idpublicidad" type="text" placeholder="ID" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Descripción <span class="required">*</span></label>
                                <textarea class="form-control" id="txtDescripcion" name="descripcion" rows="2" placeholder="Descripción de la Publicidad" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="control-label">Título <span class="required">*</span></label>
                                <input class="form-control" id="txtTitulo" name="titulo" type="text" placeholder="Título de la Publicidad" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="listStatus">Estado <span class="required">*</span></label>
                                <select class="form-control selectpicker" id="listStatus" name="estado" required>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="listStatus">Imagen <span class="required">*</span></label>
                                <input class="form-control" id="txtImagen" name="imagen" type="text" placeholder="Enlace de la Imagen" required>
                            </div>
                        </div>
                    <!-- </div> -->


                    <!-- <div class="col-md-6">
                            <div class="photo">
                                <label for="foto">Foto </label>
                                <div class="prevPhoto">
                                    <span class="delPhoto notBlock">X</span>
                                    <label for="foto"></label>
                                    <div>
                                        <img id="img" src="../../Assets/images/uploads/portada_categoria.png" alt="imagen de publicidad">
                                    </div>
                                </div>
                                <div class="upimg">
                                    <input type="file" name="imagen" id="foto">
                                </div>
                                <div id="form_alert"></div>
                            </div>
                        </div> -->
                    <!-- </div> -->

                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal View-->
<div class="modal fade" id="modalViewCategoria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la Publicidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Id Publicidad:</td>
              <td id="lblPublicidad"></td>
            </tr>
            <tr>
              <td>Título:</td>
              <td id="lblTitulo"></td>
            </tr>
            <tr>
              <td>Descripción:</td>
              <td id="lblDescripcion"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="lblEstado"></td>
            </tr>
            <tr>
              <td>Foto:</td>
              <td id="imgPublicidad"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>