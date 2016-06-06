<div class="container">
  <?php $this->view('templates/admin_sidebar'); ?>
  <div class="col-sm-9">
    <h1>Edit User</h1>
    <form class="form-horizontal" method="post" action="<?php echo site_url('Admin/userEditProcess').'/'.$user->id; ?>">
      <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
        <div class="col-sm-10"><input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail" value="<?php echo $user->email; ?>"></div>
      </div>
      <div class="form-group">
        <label for="inputFirstname" class="col-sm-2 control-label">Firstname</label>
        <div class="col-sm-10"><input type="text" class="form-control" id="inputFirstname" name="inputFirstname" placeholder="Firstname" value="<?php echo $user->fname; ?>"></div>
      </div>
      <div class="form-group">
        <label for="inputLastname" class="col-sm-2 control-label">Lastname</label>
        <div class="col-sm-10"><input type="text" class="form-control" id="inputLastname" name="inputLastname" placeholder="Lastname" value="<?php echo $user->lname; ?>"></div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10"><input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Leave this field empty if you do not want to change password."></div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10"><div class="checkbox"><label><input type="checkbox" id="inputIsAdmin" name="inputIsAdmin" value="1"<?php echo $user->is_admin ? ' checked' : ''; ?>> Is admin?</label></div></div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-default">Submit</button></div>
      </div>
    </form>
  </div>
</div>
