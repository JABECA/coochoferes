<div id="EditIncidenteModal" class="modal fade" role="dialog" tabindex="-1" >
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar novedad</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
         
            <form  id="editIncidenteForm"  method="POST" >    

                <div class="modal-body">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Incidente :</label><span class="required">*</span>
                            <input type="text" name="id_incidente" id="incidente_id"  class="form-control" readonly>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Descripcion de la Solucion :</label><span class="required">*</span>
                            <input type="text" name="solucion" id="solucion" class="form-control" required autofocus tabindex="1">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Duracion en dias:</label><span class="required">*</span>
                            <input type="number" name="duracion" id="duracion" min="1" max="365" class="form-control" required tabindex="3">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..." tabindex="5">Guardar</button>
                        <button type="button" class="btn btn-light ml-1 edit-cancel-margin margin-left-5"
                                data-dismiss="modal">Cancelar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

