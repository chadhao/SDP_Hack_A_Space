<div class="container">
  <?php
  if (empty($cats)) {
      echo '<h1>No category found!</h1>';
  } else {
      echo '<ul class="list-group">';
      foreach ($cats as $cat) {
          echo '<li class="list-group-item">'.$cat->cname.'</li>';
      }
      echo '</ul>';
  }
  ?>
</div>
