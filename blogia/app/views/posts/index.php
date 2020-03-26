<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6 col-xs-6">
      <h1>Latest Posts</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Post
      </a>
    </div>
    
  


  <?php foreach($data['posts'] as $post) : ?>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="card card-body xyz">
        <?php echo "<img class='img' style='width:300px;
    height:150px;' src='images/".$post->thumb. "'>"?>
        <h4 class="card-title text-center"><?php echo $post->title; ?></h4>
        <div class="bg-light mb-20">
          Written by <?php echo $post->name; ?> 
        </div>
        <?php if (strlen($post->body) > 40): ?> 
          <p class="card-text"><?php echo substr($post->body,4,40);  ?></p>
         
          <?php else : ?>
          <p class="card-text"><?php echo $post->body; ?></p>
        <?php endif; ?>
        
        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>/<?php echo $post->cate_name; ?>/<?php echo $_SESSION['user_id']; ?>" class="btn btn-dark" >More <i class="fa fa-external-link"></i></a>
      
    </div>
  </div>

  <?php endforeach; ?>
</div>

  <div class="row mb-3">
    <div class="col-md-12">
      <h1>Categories</h1>
    </div>

     <?php foreach($data['cate'] as $cate) : ?>
    <div class="col-md-6 mb-12 xyz" >
          <div class="alert alert-primary text-center text-capitalize bg-dark" role="alert">

            <a href="<?php echo URLROOT; ?>/posts/oneCate/<?php echo $cate->name; ?>" class=" text-light nounderline text-decoration-none">
              <?php if ($cate->cate_name === Null) :  ?> 
              <i class="fa fa-bookmark">  
              <?php echo $cate->name . "(0)"; ?>

            </i> 
            <?php else : ?>
             <i class="fa fa-bookmark">  
              <?php echo $cate->name . " ($cate->t)"; ?>

            </i>
            <?php endif;  ?>
          </a>
         </div>
    </div>

  <?php endforeach; ?>
   
   

   </div> 

   <!-- here ------------------------------------------------>
   <!-- here------------------------------------------------->


    <div class="row mb-3">
      <div class="col-md-12">
        <h1>More From Blogia</h1>
      </div>

    <?php foreach($data['more'] as $more) : ?>
      <div class="col-md-4">
        <div class="card card-body xyz">
          <?php echo "<img style='width:300px;
      height:150px;' src='images/".$more->thumb. "'>"?>
          <h4 class="card-title text-center"><?php echo $more->title; ?></h4>
          <div class="bg-light">
            Written by <?php echo $more->name; ?> 
          </div>
          <?php if (strlen($more->body) > 40): ?> 
            <p class="card-text"><?php echo substr($more->body,1,40); ?></p>
           
            <?php else : ?>
            <p class="card-text"><?php echo $more->body; ?></p>
          <?php endif; ?>

          <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $more->postId; ?>/<?php echo $more->cate_name; ?>/<?php echo $_SESSION['user_id']; ?>" class="btn btn-dark">More <i class="fa fa-external-link"></i></a>
        
      </div>
  </div>


  <?php endforeach; ?> 
  
    
    

</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>

