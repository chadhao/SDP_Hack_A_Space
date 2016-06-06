<link href="<?php echo site_url('bootstrap/css/dropzone.css'); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo site_url('bootstrap/js/dropzone.min.js'); ?>"></script>
<div class="container c-mw-800">
  <h2>Create Listing</h2>
  <form class="form-horizontal" method="POST" action="<?php echo site_url('listing/createProcess'); ?>">
    <div class="form-group">
      <label for="inputTitle" class="col-sm-2 control-label">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="inputTitle" id="inputTitle" placeholder="Title">
      </div>
    </div>
    <div class="form-group">
      <label for="inputLocation" class="col-sm-2 control-label">Location</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="inputLocation" id="inputLocation" placeholder="Location">
      </div>
    </div>
    <div class="form-group">
      <label for="inputAvailability" class="col-sm-2 control-label">Availability</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="inputAvailability" id="inputAvailability" placeholder="Availability">
      </div>
    </div>
    <div class="form-group">
      <label for="inputCategory" class="col-sm-2 control-label">Category</label>
      <div class="col-sm-10">
        <select class="form-control" name="inputCategory" id="inputCategory">
          <?php
          foreach ($cats as $cat) {
              echo '<option value="'.$cat->id.'">'.$cat->cname.'</option>';
          }
          ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Image</label>
      <div class="col-sm-10"><div class="dropzone" id="image-upload"></div></div>
    </div>
    <div class="form-group">
      <label for="inputDescription" class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" name="inputDescription" id="inputDescription" placeholder="Description"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
<script>
  Dropzone.options.imageUpload = {
    url: "<?php echo site_url('upload'); ?>",
    maxFiles: 1,
    maxFilesize: 2,
    addRemoveLinks: true,
    acceptedFiles: ".jpg,.gif,.png",
    dictDefaultMessage: "Drop file here or click to upload.",
    init: function() {
      this.on("maxfilesexceeded", function(file) { this.removeFile(file); });
    }
  };
</script>
