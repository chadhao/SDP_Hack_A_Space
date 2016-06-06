<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $header_title; ?></title>

    <link href="<?php echo site_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
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
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand">Hack A Space</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li<?php echo $CI->utils->uriMatch('Home') ? ' class="active"' : ''; ?>><a href="<?php echo base_url(); ?>">Home</a></li>
            <li<?php echo $CI->utils->uriMatch('Category') ? ' class="active"' : ''; ?>><a href="<?php echo site_url('Category'); ?>">All Categories</a></li>
            <?php
            if ($_SESSION['user_loggedin']) {
                echo '<li'.($CI->utils->uriMatch('listing', 'create') ? ' class="active"' : '').'><a href="'.site_url('listing/create').'">Create Listing</a></li>';
            }
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
            if ($_SESSION['user_loggedin']) {
                echo '<li style="padding:15px;">Hi, '.$_SESSION['user']->fname.'!</li>';
                if ($_SESSION['user']->is_admin) {
                    echo '<li><a href="'.site_url('Admin').'">Admin</a></li>';
                }
                echo '<li class="active"><a href="'.site_url('User/logout').'">Logout</a></li>';
            } else {
                echo '<li><a href="'.site_url('User/signup').'">Sign up</a></li>';
                echo '<li class="active"><a href="'.site_url('User/login').'">Login</a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
