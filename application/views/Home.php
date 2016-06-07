<div class="container c-search-container">
  <div class="c-search c-mw-1000">
    <div class="col-sm-3 c-plr-5">
      <p class="container-fluid"><a href="<?php echo site_url('Category'); ?>">All Categories</a></p>
    </div>
    <form>
      <div class="col-sm-7 c-plr-5"><input type="text" placeholder="Search for spaces!"></div>
      <div class="col-sm-2 c-plr-5"><button type="button">Search</button></div>
    </form>
  </div>
</div>
<div class="container c-latest-container">
  <div class="c-mw-1000">
    <?php
    foreach ($listings as $single) {
        $title_str = $single->title;
        echo '<div class="col-sm-6" style="padding: 10px;">';
        echo '<div class="c-latest-single" style="background: #171f26 url(/uploads/'.$single->image.') no-repeat center; background-size: 768px auto;">';
        echo '<div class="container-fluid" onclick="window.location = \''.site_url('listing/'.$single->id).'\'"></div><p><a href="'.site_url('listing/'.$single->id).'">'
            .(strlen($title_str) > 45 ? (substr($title_str, 0, 45).'...') : $title_str).'</a></p>';
        echo '</div></div>';
    }
    ?>
  </div>
</div>
