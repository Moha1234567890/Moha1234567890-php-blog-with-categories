<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
<?php if (!empty($data['onecate'])) : ?>
 <?php foreach($data['onecate'] as $one) : ?>
    <div class="col-md-4 ">
      <div class="card card-body mb-20 xyz">
        <?php echo "<img style='width:300px;
    height:150px;' src='../../images/".$one->thumb. "'>"?>
        <h4 class="card-title text-center"><?php echo $one->title; ?></h4>
        <div class="bg-light mb-20">
          Written by <?php echo $one->name; ?> 
        </div>
        <?php if (strlen($one->body) > 40): ?> 
          <p class="card-text"><?php echo substr($one->body,4,40); ?></p>
         
          <?php else : ?>
          <p class="card-text"><?php echo $one->body; ?></p>
        <?php endif; ?>

        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $one->postId; ?>/<?php echo $one->cate_name; ?>/<?php echo $_SESSION['user_id']; ?>" class="btn btn-dark">More <i class="fa fa-external-link"></i></a>
      
    </div>
  </div>

  <?php endforeach; ?>

  <?php else : ?>
    <div class="alert alert-danger mx-auto" role="alert">
  NO items yet !
</div>

  <?php endif; ?>
</div>

 

<?php require APPROOT . '/views/inc/footer.php'; ?>

