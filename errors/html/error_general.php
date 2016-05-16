<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

#this_container {
	margin-top: 80px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

#this_container h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

#this_container p {
	margin: 12px 15px 12px 15px;
}
</style>
	<div class="container" id="this_container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div>
	<div class="container">
		<p><br><a onclick="history.back();">Go Back</a></p>
	</div>
