<div class="container" style="margin-top:50px;">
  <?php $this->view('templates/admin_sidebar'); ?>
  <div class="col-sm-9">
    <h1>Category List</h1>
    <p><a href="<?php echo site_url('Admin/userAdd'); ?>">Add Category</a></p>
    <?php
    if (!$cats) {
        echo '<p>No Category found!</p>';
    } else {
        ?>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
          <td style="text-align:center;">ID</td>
          <td>Category Name</td>
          <td style="text-align:center;">Action</td>
        </tr>
        <?php
        foreach ($cats as $cat) {
            echo '<tr>';
            echo '<td style="text-align:center;">'.$cat->id.'</td>';
            echo '<td>'.$one_user->cname.'</td>';
            echo '<td style="text-align:center;"><a href="'.site_url('Admin/categoryEdit').'/'.$cat->id.'">Edit</a> | <a href="'.site_url('Admin/categoryDelete').'/'.$cat->id.'">Delete</a></td>';
            echo '</tr>';
        }
        ?>
      </table>
    </div>
    <?php 
    } ?>
  </div>
</div>
