<div class="container c-mw-400">
  <form class="form-signin" method="post" action="<?php echo site_url('User/signupProcess'); ?>">
    <h2 class="form-signin-heading">Please sign up</h2>
    <label for="inputFirstname" class="sr-only">Firstname</label>
    <input type="text" id="inputFirstname" name="inputFirstname" class="form-control input-lg" placeholder="Firstname" required autofocus>
    <label for="inputLastname" class="sr-only">Lastname</label>
    <input type="text" id="inputLastname" name="inputLastname" class="form-control input-lg" placeholder="Lastname" required>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="inputEmail" class="form-control input-lg" placeholder="Email address" required>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="inputPassword" class="form-control input-lg" placeholder="Password" required>
    <label for="inputConfirmPassword" class="sr-only">Password</label>
    <input type="password" id="inputConfirmPassword" name="inputConfirmPassword" class="form-control input-lg" placeholder="Confirm Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
  </form>
</div>
