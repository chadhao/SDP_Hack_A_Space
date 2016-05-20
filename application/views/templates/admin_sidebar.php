<?php
$CI = &get_instance();
?>

<div class="col-sm-3" style="padding:20px;background:#EEEEEE;">
  <ul class="nav nav-pills nav-stacked">
    <li role="presentation"<?php echo $CI->utils->uriMatch('Admin', 'dashboard') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('Admin/dashboard'); ?>">Dashboard</a></li>
    <li role="presentation"<?php echo $CI->utils->uriMatch('Admin', 'user') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('Admin/user'); ?>">User</a></li>
    <li role="presentation"<?php echo $CI->utils->uriMatch('Admin', 'category') ? 'class="active"' : ''; ?>><a href="<?php echo site_url('Admin/category'); ?>">Category</a></li>
  </ul>
</div>
