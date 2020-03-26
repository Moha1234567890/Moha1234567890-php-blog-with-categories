<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Post</h2>
    <p>Create a post with this form</p>
    <form action="<?php echo URLROOT; ?>/posts/add" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="body">thumbnail: <sup>*</sup></label>
        <input type="hidden" name = "hidden" class="form-control <?php echo (!empty($data['thumb_err'])) ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" size=100000>
        <input type="file" name="thumb" class="form-control-lg <?php echo (!empty($data['thumb_err'])) ? 'is-invalid' : ''; ?>" />
         <span class="invalid-feedback"><?php echo $data['thumb_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="body">Body: <sup>*</sup></label>
        <textarea name="body" id="basic-conf" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
      </div>
   
      
       <div class="form-group">
         <label for="exampleFormControlSelect1">Category: <sup>*</sup></label>
          <select name="cate_name" class="form-control  form-control-lg <?php echo (!empty($data['cate_name_err'])) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1">
            <option  value="">--add category--</option>
            <option  value="development">development</option>
            <option  value="music"> music</option>
            <option  value="photography">photpography</option>
            <option  value="management">management</option>
            <option  value="seo">seo</option>
            <option  value="markting">markting</option>
    </select>
        <span class="invalid-feedback"><?php echo $data['cate_name_err']; ?></span>

     </div> 
      
      <input type="submit" class="btn btn-success" value="Submit">
    </form>

   
  </div>

 
<?php require APPROOT . '/views/inc/footer.php'; ?>