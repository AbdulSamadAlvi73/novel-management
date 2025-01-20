<?php
if (session_status() == PHP_SESSION_NONE) {
  // Start the session
  session_start();
}
if (isset($_SESSION['user_username'])) {
  $id = $_SESSION['user_id'];
  require('./modules/conn.php');
  $headerQuiry = "SELECT * FROM `users` where user_id = '$id'";
  $headerResult = $conn->query($headerQuiry);
  $headerData =  mysqli_fetch_array($headerResult);
}
?>
<!-- Header Area Start -->
<header class="header">
  <div class="container-fluid">
    <nav class="navbar upper d-lg-flex d-none">
      <a class="navbar-brand" href="index.php">
        <img alt="" src="assets/media/brand-logo.png" />
      </a>
      <div class="right-content">

        <ul class="unstyled right-content-ul">
          <?php
          if (isset($_SESSION['user_username'])) {
          ?><li class="nav-item dropdown pe-3">
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="./<?php echo $headerData['user_img'] ?>" alt="Profile" class="rounded-circle" style="aspect-ratio: 1/1; width: 42px; object-fit: cover; object-position: top;">
                <span class="d-none d-md-block dropdown-toggle text-capitalize ps-2"></span>
              </a><!-- End Profile Iamge Icon -->
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                  <h6 class="text-capitalize"><?php echo $headerData['fullname'] ?></h6>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item d-flex gap-2 align-items-center" href="./userProfile.php">
                    <i class="fs-5 fal fa-edit"></i>
                    <span>Settings</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li style="text-align: center;">
                  <a href="javascript:void(0)" onclick="cnfrmTask(event,'POST','logout','./modules/authentication.php','','To Logout','Logged Out!')" name="logout" class="dropdown-item d-flex gap-2 align-items-center">
                    <i class="fs-5 fal fa-sign-out"></i>
                    <span>Sign Out</span>
                  </a>
                </li>
              </ul><!-- End Profile Dropdown Items -->
            </li>
            <li>
              <a href="bookmarks.php" title="Bookmarks" class="fs-5"><i class="fa fa-bookmark"></i></a>
            </li>
            <li>
              <a href="./progressHistory.php" title="Track Progress" class="fs-5 px-2"><i class="fal fa-history"></i></a>
            </li><?php
                } else {
                  ?><li>
              <a href="login.php" class="login-border active">
                <h6>Login</h6>
              </a>
            </li>
            <li>
              <a href="signup.php">
                <h6>Register</h6>
              </a>
            </li><?php
                }
                  ?>


        </ul>
      </div>
    </nav>
  </div>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand m-0 d-lg-none" href="index.php">
      <img alt="" src="assets/media/brand-logo.png" />
    </a>
    <div class="navbar-toggler">
      <div class="navAction-wrapper gap-2 d-flex align-items-center justify-content-center">
        <?php
        if (isset($_SESSION['user_username'])) {
        ?>
          <a href="bookmarks.php" title="Bookmarks" class="fs-6"><i class="fal fa-bookmark"></i></a>
          <a href="./progressHistory.php" title="Track Progress" class="fs-6"><i class="fal fa-history"></i></a>

          <div class="nav-item dropdown">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="./<?php echo $headerData['user_img'] ?>" alt="Profile" class="rounded-circle" style="aspect-ratio: 1/1; width: 35px; object-fit: cover; object-position: top;">
              <span class=" d-block dropdown-toggle text-capitalize ps-2"></span>
            </a><!-- End Profile Iamge Icon -->
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6 class="text-capitalize"><?php echo $headerData['fullname'] ?></h6>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                  <a class="dropdown-item d-flex gap-2 align-items-center" href="./userProfile.php">
                    <i class="fs-5 fal fa-edit"></i>
                    <span>Settings</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li style="text-align: center;">
                  <a href="javascript:void(0)" onclick="cnfrmTask(event,'POST','logout','./modules/authentication.php','','To Logout','Logged Out!')" name="logout" class="dropdown-item d-flex gap-2 align-items-center">
                    <i class="fs-5 fal fa-sign-out"></i>
                    <span>Sign Out</span>
                  </a>
                </li>
            </ul><!-- End Profile Dropdown Items -->
          </div>
        <?php } else {
        ?>
          <a href="login.php" class="login-border active">
            <h6>Login</h6>
          </a>
          <span class="text-secondary fs-7 px-1">Or</span>
          <a href="signup.php" class="me-2">
            <h6>Register</h6>
          </a>
        <?php
        }
        ?>
        <i class="fas fa-bars p-0 fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar"></i>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav mainmenu m-0">
        <li class="menu-item">
          <h6><a href="./index.php" class="">Home</a></h6>
        </li>
        <li class="menu-item">
          <h6><a href="./novel-listing.php" class="">Novels</a></h6>
        </li>
        <li class="menu-item">
          <h6><a href="./about.php" class="">About</a></h6>
        </li>
        <li class="menu-item">
          <h6><a href="./contact.php" class="">Contact</a></h6>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Header Area end -->