<div class="container">
  <?php $this->view('templates/admin_sidebar'); ?>
  <div class="col-sm-9">
    <h1><?php echo $caction == 'add' ? 'Add Category' : 'Edit Category'; ?></h1>
    <form class="form-horizontal" method="post" action="<?php echo site_url('Admin/categoryProcess').($caction == 'add' ? '/add' : ('/'.$cid)); ?>">
      <div class="form-group">
        <label for="inputCName" class="col-sm-2 control-label">Category Name</label>
        <div class="col-sm-10"><input type="text" class="form-control" id="inputCName" name="inputCName" placeholder="Category Name" value="<?php echo $caction == 'add' ? '' : $cname; ?>"></div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-default"><?php echo $caction == 'add' ? 'Add' : 'Submit'; ?></button></div>
      </div>
    </form>
  </div>
</div>
