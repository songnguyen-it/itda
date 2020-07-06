<?php
get_header();
global $wp_query;
?>

<div class="text-right">
  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add Company</button>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLongTitle">Add Company</h6>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="formGroupExampleInput">Company\'s Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name of company">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Address</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Address">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Tel</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Tel number">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Website</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Company\'s website">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Infomation</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Short description">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>