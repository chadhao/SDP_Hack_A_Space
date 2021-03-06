<div class="container c-mw-1000">
  <h3 style="text-align:center"><?php echo $listing->title; ?><br><small><?php echo date_create($listing->update_time)->format('d/m/Y'); ?></small></h3>
  <?php
  if (!empty($listing->image)) {
      echo '<p class="c-mw-600 c-c"><img class="img-responsive img-rounded" src="'.site_url('uploads/'.$listing->image).'"></p>';
  }
  ?>
  <dl class="dl-horizontal">
    <dt>Category</dt>
    <dd><?php echo $catname; ?></dd>
    <dt>Uploader</dt>
    <dd><?php echo $fullname; ?></dd>
    <dt>Location</dt>
    <dd><?php echo $listing->location; ?></dd>
    <dt>Availability</dt>
    <dd><?php echo $listing->availability; ?></dd>
    <dt>Description</dt>
    <dd><?php echo $listing->description; ?></dd>
  </dl>
  <?php
  if ($_SESSION['user_loggedin']) {
      if ($_SESSION['user']->id == $listing->uploader || $_SESSION['user']->is_admin) {
          echo '<p class="c-lo">';
          echo '<a href="'.site_url('listing/edit/'.$listing->id).'">Edit Listing</a>';
          if ($_SESSION['user']->is_admin) {
              echo '<a href="'.site_url('listing/delete/'.$listing->id).'">Delete Listing</a>';
          }
          echo '</p>';
      }
  }
  ?>
</div>
