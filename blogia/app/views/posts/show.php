




<?php require APPROOT . '/views/inc/header.php'; ?>





<br>
<h1 class="text-center xyz"><?php echo $data['post']->title; ?></h1>



<div class="image-widescreen">
  <?php echo "<img style='padding-bottom:40px;' src='../../../../images/".$data['post']->thumb."'/>"; ?> 
</div>
<?php if ($data['pre']->pre == 1 ): ?>
 
<p class="m-20"><?php echo $data['post']->body; ?></p>

<?php elseif ($data['pre']->pre == 0) : ?>
<p><?php echo substr($data['post']->body, 3, 100) . ".................................";  ?></p>


 <strong><p>want to continue reading subscribe now</p> </strong>  
 <form class="d-inline" action="<?php echo URLROOT; ?>/posts/process/<?php echo $_SESSION['user_id']; ?>" method="POST">
     
                              <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                style="margin-left: 12px;"
                                data-key="YOUR SECERT KEY HERE"
                                data-email="<?php echo $_SESSION['user_email']; ?>"
                                data-amount="<?php echo  200*10; ?>"
                                data-name="subscription"
                                data-description="Widget"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto">
                              </script>
                            </form>
                            <br>
                            <br>
                            <br>
                            <?php else: ?>
                              
<?php endif; ?>



<div class="row xyz">

     <div class="col-md-3">
      <!-- Facebook  -->


      <a class="btn btn-primary share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo URLROOT; ?>/posts/show/<?php echo $data['post']->id; ?>" target="_blank">
      <i class="fa fa-facebook"> share it with friends </i>
    </a>

  <!-- Facebook  -->
   </div>
  
    <div class="col-md-3">
        <!--twitteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeer-------------->
        <a href="http://twitter.com/share?url=<?php echo URLROOT; ?>/posts/show/<?php echo $data['post']->id; ?>" target="_blank" class="btn btn-primary share">
           <i class="fa fa-twitter"> share it with friends</i>

          </a>
           <!--twitteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeer-------------->


  </div>
    <div class="col-md-3">
  
         <a class="btn btn-primary share" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo URLROOT; ?>/posts/show/<?php echo $data['post']->id; ?>&title=<?php echo $data['post']->title; ?>" target="_blank"><i class="fa fa-linkedin"> share it with friends </i>
         </a>

   </div>
   
   <div class="col-md-3">
        

      <!---pinterset ----------------------------------------------->

      <a href="//pinterest.com/pin/create/link/?url=<?php echo URLROOT; ?>/posts/show/<?php echo $data['post']->id; ?>" class="btn btn-danger share" target="_blank"><i class="fa fa-pinterest-p"> share it with friends</i></a>

      <!---pinterset ----------------------------------------------->

   </div>



</div>

<div class="bg-secondary text-white p-2">
  Written by <?php echo $data['user']->name; ?> 
  
</div>



<?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
  <hr>
  <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>

  <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
<?php endif; ?>
<h1 class="d-block mt-3">More From This Category</h1>
<div class="row">

  <?php foreach($data['getThree'] as $post) : ?>
    <div class="col-md-4 d-block mt-4">
      <div class="card card-body xyz">
        <?php echo "<img style='width:300px;
    height:150px;' src='../../../../images/".$post->thumb. "'>"?>
        <h4 class="card-title text-center"><?php echo $post->title; ?></h4>
        <div class="bg-light mb-20">
          Written by <?php echo $post->cate_name; ?> 
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



<?php require APPROOT . '/views/inc/footer.php'; ?>