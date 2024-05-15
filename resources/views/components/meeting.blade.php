<?php  // parent containenr
?>
<div class="row">

  <div class="col-auto input-group log-event"
    id="datetimepicker1"
    data-td-target-input="nearest"
    data-td-target-toggle="nearest">
    
    <span class="input-group-text lead">Looking for meeting, send us request</span>
    <span
      class="input-group-text"
      data-td-target="#datetimepicker1"
      data-td-toggle="datetimepicker">
      
      
      <i class="bi bi-calendar"></i>
    </span>
    <input
      id="datetimepicker1Input"
      type="text"
      class="form-control col rounded-end"
      data-td-target="#datetimepicker1"/>
      <input type="hidden" name="data" value="">
      <input type="hidden" name="time" value="">
      
  </div>
  <div class="col-12 input-group mt-2">
    <span class="input-group-text">Agenda</span>
    <input type="text" class="form-control">
    <button class="btn btn-outline-primary" type="button">Request</button>
  </div>
</div>
<div class="row">
<div class="col-12 mt-4">
      <p class="lead py-1 my-2 mb-4 px-2 border-bottom col-12">Schedule</p>
    </div>
</div>




<!--
  <button type="button" class="col-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Request
    </button>
-->
<!-- Modal - show for form 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Fill the form and we will get back to u</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-sm-12">
      <label for="datetimepicker1Input" class="form-label">Picker</label>
      
      
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
-->

<script>
  const mainInput = document.getElementById('datetimepicker1Input');

  mainInput.addEventListener('change', function(){
    let values = mainInput.value.split(' ');
    mainInput.nextElementSibling.value = values[0].trim();
    mainInput.nextElementSibling.nextElementSibling.value = values[1].trim();
  });
</script>