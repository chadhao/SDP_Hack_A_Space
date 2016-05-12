<div class="container" style="margin-top:50px;">
  <?php $this->view('templates/admin_sidebar'); ?>
  <div class="col-sm-9">
    <h1>User List</h1>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
          <td style="text-align:center;">ID</td>
          <td>Full Name</td>
          <td>E-mail</td>
          <td style="text-align:center;">Admin</td>
          <td style="text-align:center;">Action</td>
        </tr>
        <?php
        foreach ($users as $one_user) {
            echo '<tr>';
            echo '<td style="text-align:center;">'.$one_user->id.'</td>';
            echo '<td>'.$one_user->fname.' '.$one_user->lname.'</td>';
            echo '<td>'.$one_user->email.'</td>';
            echo '<td style="text-align:center;">'.($one_user->is_admin ? 'Yes' : '').'</td>';
            echo '<td style="text-align:center;"><a href="'.site_url('Admin/userEdit').'/'.$one_user->id.'">Edit</a> | <a href="'.site_url('Admin/userDelete').'/'.$one_user->id.'">Delete</a></td>';
            echo '</tr>';
        }
        ?>
      </table>
    </div>
  </div>
</div>
