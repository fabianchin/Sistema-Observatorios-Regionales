<div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" id="confirm_entity_name">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea placeholder="Escribe: 'eliminar' para confirmar" class="form-control" id="text_confirm_delete"></textarea>
              <input type="hidden" id="dimension_delete_id" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button onclick="cerrarModal()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button onclick="delete_dimension()" type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>
  
  <script>
  
  function confirm_delete(dimension_id, entity_name){
    $('#confirm_entity_name').text("esta seguro que quiere eliminar "+entity_name);
    $("#dimension_delete_id").val(dimension_id);
    $("#confirm_delete").modal('show');
    
  }
  
  function delete_dimension(){
    if($("#text_confirm_delete").val() != "eliminar"){
      alert("Debe escribir eliminar para poder eliminar la dimension");
      return;
    }
    $("#dimension_delete_"+ $("#dimension_delete_id").val()).submit();
  }
  
  window.onload = function() {
    var myInput = document.getElementById('text_confirm_delete');
    myInput.onpaste = function(e) {
      e.preventDefault();
      alert("esta acción está prohibida");
    }
    
    myInput.oncopy = function(e) {
      e.preventDefault();
      alert("esta acción está prohibida");
    }
  }

  function cerrarModal() {
  $('#confirm_delete').modal('hide');
}
  
  </script>