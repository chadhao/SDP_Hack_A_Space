<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $header_title; ?></title>

    <link href="<?php echo site_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('bootstrap/css/custom.css'); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['user_loggedin'])) {
        $_SESSION['user_loggedin'] = false;
    }
    $CI = &get_instance();
    ?>
    <div class="container-fluid c-bg">
      <header class="navbar navbar-static-top c-pud-20 c-navheader">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="c-navheader-brand" href="<?php echo base_url(); ?>">Hack A Space</a>
          </div>
          <div class="navbar-collapse collapse"  id="navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo site_url('Category'); ?>">Find spaces</a></li>
              <li><a href="<?php echo site_url('listing/create'); ?>">List a space</a></li>
              <?php
              if ($_SESSION['user_loggedin']) {
                  if ($_SESSION['user']->is_admin) {
                      echo '<li><a href="'.site_url('Admin').'">Admin</a></li>';
                  }
                  echo '<li class="active"><a href="'.site_url('User/logout').'">Logout</a></li>';
              } else {
                  echo '<li><a href="'.site_url('User/login').'">Login</a></li>';
                  echo '<li class="active"><a href="'.site_url('User/signup').'">Sign up</a></li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </header>
      <header class="container" style="height:380px;">
        <div class="c-inner c-mw-1000">
          <h2>Hack-A-Space is</h2>
          <p>people getting together to learn something,<br>do something, in a shared space...</p>
          <p><a href="<?php echo site_url('User/signup'); ?>">Sign me up!</a></p>
        </div>
      </header>
    </div>
