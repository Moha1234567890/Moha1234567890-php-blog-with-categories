<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>/posts"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <?php if (isset($_SESSION['user_id'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts"><i class="fa fa-home"></i> Home</a>
          </li>
        
          <?php else : ?>
              <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Pages"><i class="fa fa-home"></i> Home</a>
          </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['user_status']) AND $_SESSION['user_status'] === "admin"): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about"><i class="fa fa-info-circle"></i> About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/admin"><i class="fa fa-info-circle"></i> admin</a>
          </li>

        <?php else: ?>  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about"><i class="fa fa-info-circle"></i> About</a>
          </li>
        <?php endif; ?>
        </ul>

        
        <ul class="navbar-nav ml-auto">
          <?php if(isset($_SESSION['user_id'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/user/<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-user"></i> <?php echo $_SESSION['user_name'];?></a>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><i class="fa fa-arrow-circle-right"></i> Logout</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>