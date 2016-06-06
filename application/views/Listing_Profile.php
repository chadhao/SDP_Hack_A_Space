<div class="container" style="margin-top:50px; max-width:1000px;">
  <h3 style="text-align:center"><?php echo $listing->title; ?><br><small><?php echo $uploader.' '.date_create($listing->update_time, timezone_open('Pacific/Auckland'))->format('d/m/Y H:i:s'); ?></small></h3>
</div>
