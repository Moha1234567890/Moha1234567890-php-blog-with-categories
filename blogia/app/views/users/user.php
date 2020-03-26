<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
	 <?php foreach($data['details'] as $detail) : ?>
<div class="col-md-12">
      <div class="card card-body xyz">
        <?php echo "<h4 class='card-title text-center'> <img style='width:75px;
      height:75px; display:block; margin-left: 495px;' src='../../user_pics/".$detail->pic. "'></h4>"?>
        <h4 class="card-title text-center"><?php echo $detail->name; ?></h4>
        <div class="bg-light mb-20">
        <?php echo "<strong style='margin-left: 495px;'>Status:</strong> " . $detail->status; ?> 
        <?php echo "<strong style='margin-left: 495px;'>Posts Created:</strong> " . $detail->n; ?> 
        </div>
       

      
    </div>
  </div>

<?php endforeach; ?>

</div>

<div class="row">
<?php if (!empty($data['userPost'])) : ?>
 <?php foreach($data['userPost'] as $x) : ?>
 
    <div class="col-md-4">
      <div class="card card-body xyz">
        <?php echo "<img style='width:300px;
    height:150px;' src='../../images/".$x->th. "'>"?>
        <h4 class="card-title text-center"><?php echo $x->ti; ?></h4>
        <div class="bg-light mb-20">
          Written by <?php echo $x->ca; ?> 
        </div>
        <?php if (strlen($x->bo) > 40): ?> 
          <p class="card-text"><?php echo substr($x->bo,4,40);  ?></p>
         
          <?php else : ?>
          <p class="card-text"><?php echo $x->bo; ?></p>
        <?php endif; ?>

        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $x->i; ?>/<?php echo $x->ca; ?>/<?php echo $_SESSION['user_id']; ?>" class="btn btn-dark" >More <i class="fa fa-external-link"></i></a>
      
    </div>
  </div>

  <?php endforeach; ?>
  <?php else : ?>
  	  <div class="alert alert-danger d-block m-200 mx-auto" role="alert">
  you have not posted yet !
</div>

<?php endif; ?>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
