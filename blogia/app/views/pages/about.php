<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
	<div class="conatiner">
	  <h1><?php echo $data['title']; ?></h1>
	  <p><?php echo $data['description']; ?></p>
	  <p>app created By: <strong><?php echo $data['app created by']; ?></strong></p>
	  <p>micro framework by: <strong><?php echo $data['microframework']; ?></strong></p>
	  <p>Version: <strong><?php echo APPVERSION; ?></strong></p>
	</div>  
</div>  
<?php require APPROOT . '/views/inc/footer.php'; ?>