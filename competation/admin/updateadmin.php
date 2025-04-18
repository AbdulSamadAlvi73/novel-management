<?php
require_once('../modules/conn.php');
session_start();
if (isset($_SESSION['username'])) {
  $query = "SELECT * FROM users";
  $row = mysqli_query($conn, $query);
  $id = $_SESSION['id'];
  $sel = "SELECT * FROM `users` WHERE user_id='$id'";
  $res = mysqli_query($conn, $sel);
  $row = mysqli_fetch_array($res);
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php require 'components/head.php' ?>

  </head>

  <body>
    <!-- ======= Header ======= -->
    <?php
    include('components/header.php');
    ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php
    include('components/sidebar.php');
    ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="./<?php echo $row['user_img'] ?>" alt="Profile" class="rounded-circle" style="aspect-ratio: 1/1; object-fit: cover; object-position: top;">
                <h2><?php echo $row['username'] ?></h2>
                <div class="social-links mt-2">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                      Profile</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                      Password</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">


                  <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form action="../modules/authentication.php" method="POST" enctype="multipart/form-data" onsubmit="validate(this,event)">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="img-box" id="previewBox">
                        <img src="./<?php echo $row['user_img']?>" alt="Profile">
                        </div>
                        
                        <div class="pt-2">
                          <input type="file" onchange="imagePreview(event)" name="image" id="profileImage" class="d-none" value="" readonly>
                          <label for="profileImage" class="btn btn-primary text-white btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></label>
                          <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                          <p class="fs-6 text-danger pt-1" id="errorMsg"><span class="text-primary">Use Image whose size < 800kb</span></p>
                        </div>
                      </div>
                    </div>
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="fullname" type="text" class="form-control" id="fullName"
                            value="<?php echo $row['fullname'] ?>">
                            <div class="validField d-none text-danger fs-6">Required</div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Username</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="username" type="text" class="form-control" id="username"
                            value="<?php echo $row['username'] ?>">
                            <div class="validField d-none text-danger fs-6">Required</div>

                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" name="changeInfo" class="btn samad-btn-color">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                  </div>


                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form  action="../modules/authentication.php" method="POST" enctype="multipart/form-data" onsubmit="validate(this,event)">

                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="password" name="currentpassword" class="form-control" id="currentPassword">
                          <div class="validField d-none text-danger fs-6">Please enter your Current Password.</div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input type="password" name="newpassword" class="form-control" id="newPassword" required oninput="checkPasswordMatch()">
                          <div class="validField d-none text-danger fs-6">Please enter your New Password.</div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="renewpassword" type="password" class="form-control" id="renewPassword" required oninput="checkPasswordMatch()">
                          <div class="validField d-none text-danger fs-6">Please Re-enter your New Password.</div>
                        </div>
                      </div>
                      <div class="row mb3">
                    <div id="password-match-indicator" class="mt-3"></div>
                    </div>
                      <div class="text-center">
                        <button type="submit" class="btn samad-btn-color" id="changePasswordBtn" disabled name="updatepassword">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php
    include('components/footer.php');
    ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php require 'components/loader.php'; require 'components/script.php'; require '../modules/errorAlert.php';require_once'../modules/adminActivity.php';?>
  </body>
  </html>
  <?php
}else{
  header("location:../login.php");
  exit();
}
?>