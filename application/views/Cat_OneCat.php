<div class="container">
  <?php
  if (empty($listings)) {
      echo '<h1>No listing found!</h1>';
  } else {
      echo '<h2>'.$cname.'</h2>';
      echo '<ul class="list-group">';
      foreach ($listings as $listing) {
          echo '<li class="list-group-item"><a href="'.site_url('listing/'.$listing->id).'">'.$listing->title.'</a><span class="c-cl-date">'.date_create($listing->update_time)->format('d/m/Y').'</span></li>';
      }
      echo '</ul>';
  }
  ?>
</div>
