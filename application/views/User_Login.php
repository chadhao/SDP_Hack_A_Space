<div class="container" style="margin-top:50px; max-width:400px;">
  <form class="form-signin" method="post" action="<?php echo site_url('User/loginProcess'); ?>">
    <h2 class="form-signin-heading">Please login</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="inputEmail" class="form-control input-lg" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="inputPassword" class="form-control input-lg" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  </form>
</div>
