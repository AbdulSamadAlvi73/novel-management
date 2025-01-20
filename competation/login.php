<?php
session_start();
if (isset($_SESSION['user_username'])) {
  header("Location:./index.php");
  exit();
}elseif(isset($_SESSION['username'])){
    header("Location:./admin/index.php");
  exit();
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="BookStore HTML5 Template"/>
        <title>Novels Nest - Find your favorite Novels</title>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/media/favicon.png"/>
        <!-- All CSS files -->
        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
        <link rel="stylesheet" href="assets/css/vendor/slick.css">
        <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
        <link rel="stylesheet" href="assets/css/app.css">
    </head>
    <body>
        <!-- Preloader-->
  <div id="preloader">
    <div class="loader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
        <!-- Back To Top Start -->
        <a href="#main-wrapper" id="backto-top" class="back-to-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Main Wrapper Start -->
        <div id="main-wrapper" class="main-wrapper overflow-hidden">
            <!-- Header Start-->
            <header class="header st-2 p-2">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img alt="" src="assets/media/brand-logo.png"/>
                    </a>
                </div>
            </header>
            <!-- Header End-->  
            <!-- signup area Start -->
            <section class="signup p-40 mb-64">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-block bg-lightest-gray">
                                <h3 class="mb-48">Login</h3>
                                <!-- <div class="row mb-24">
                                    <div class="col-sm-6">
                                        <h6><a href="#" class="link-btn mb-24 mb-sm-0"><img src="assets/media/icons/google-icon.png" alt=""> Sign up with Google</a></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <h6><a href="#" class="link-btn"><img src="assets/media/icons/fb-icon.png" alt=""> Sign up with Facebook</a></h6>
                                    </div>
                                </div> -->
                                <!-- <h5 class="or mb-24">or</h5> -->
                                <h6 class="mb-24 text-center">Login with your email address</h6>
                                <form action="./modules/authentication.php" method="post">
                                    <div class="mb-24">
                                        <input type="text" class="form-control" id="login-email" name="username" required placeholder="Email">
                                    </div>
                                    <div class="mb-24">
                                        <input type="password" class="form-control" id="login-password" name="password" required placeholder="Password">
                                    </div>
                                    <button type="submit" class="b-unstyle cus-btn w-100 mb-24" name="login">
                                        <span class="icon"><img src="assets/media/icons/click-button.png" alt=""></span>Login
                                    </button>
                                </form>
                                <div class="register-bottom">
                                    <h6>If you don't have account? <a href="signup.php" class="color-primary">Register</a></h6>
                                    <h6 class="text-end"><a href="signup.php" class="color-primary">Forgot Password?</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                        <div class="sign-up-image bg-lightest-gray br-30 box-shadow d-flex justify-content-center">
                                <img src="assets/media/images/sign-up.png" style="max-width: 80% !important;" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
        <?php require './components/script.php'?>
        <?php require './modules/errorAlert.php';require_once './modules/adminActivity.php';require_once './modules/userActivity.php';?>
    </body>
</html>
<?php
}
?>