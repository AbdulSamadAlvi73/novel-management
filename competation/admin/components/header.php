<?php
    $id = $_SESSION['id'];
    require('../modules/conn.php');
  $headerQuiry = "SELECT * FROM `users` where user_id = '$id'";
  $headerResult = $conn->query($headerQuiry);
  $headerData=  mysqli_fetch_array($headerResult)
?>
 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.php?session=admin" class="logo d-flex align-items-center">
    <span class="d-none d-lg-block">Virtual Novals</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">


    <li class="nav-item dropdown pe-3">
      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="./<?php echo $headerData['user_img'] ?>" alt="Profile" class="rounded-circle" style="aspect-ratio: 1/1; object-fit: cover; object-position: top;">
        <span class="d-none d-md-block dropdown-toggle text-capitalize ps-2"><?php echo $headerData['fullname'] ?></span>
      </a><!-- End Profile Iamge Icon -->
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6 class="text-capitalize"><?php echo $headerData['fullname'] ?></h6>
          <!-- <span>Admin</span> -->
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="./updateadmin.php">
            <i class="bi bi-gear"></i>
            <span>Settings</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="./adminActivity.php">
            <i class="bi bi-clock-history"></i>
            <span>History</span>
          </a>
        </li>


        <li>
          <hr class="dropdown-divider">
        </li>

        <!-- <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li> -->
        <!-- <li>
          <hr class="dropdown-divider">
        </li> -->
        <li>
          <hr class="dropdown-divider">
        </li>

        <li style="text-align: center;">
          <a href="javascript:void(0)" onclick="cnfrmTask(event,'POST','logout','../modules/authentication.php','','To Logout','Logged Out!')" name="logout" class="dropdown-item d-flex align-items-center">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->
    
  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->