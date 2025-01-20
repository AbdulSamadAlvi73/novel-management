<?php
require_once('./modules/conn.php');
session_start();
if (isset($_SESSION['user_username'])) {
    $query = "SELECT * FROM users";
    $row = mysqli_query($conn, $query);
    $id = $_SESSION['user_id'];
    $sel = "SELECT * FROM `users` WHERE user_id='$id'";
    $res = mysqli_query($conn, $sel);
    $row = mysqli_fetch_array($res);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="BookStore HTML5 Template" />

        <title>Novels Nest - Find your favorite Novels</title>
        <?php require_once'./components/head.php'?>
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
        <a href="#main-wrapper" id="backto-top" class="back-to-top"><i class="fas fa-angle-up"></i></a>
        <!-- Main Wrapper Start -->
        <div id="main-wrapper" class="main-wrapper overflow-hidden">
            <?php require_once './components/header.php' ?>
            <div class="container py-3">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile text-center">
                                        <div class="user-avatar" id="previewBox"> <img src="<?php echo $row['user_img'] ?>" alt="Maxwell Admin"></div>
                                        <h6 class="user-email mt-1"><?php echo $row['username'] ?></h6>
                                        <div class="pt-2">
                                            <label for="profileImage" class="btn btn-primary text-white btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></label>
                                            <p class="fs-6 text-danger pt-1" id="errorMsg"><span class="text-primary">Use Image whose size < 800kb</span>
                                            </p>
                                        </div>
                                        <form action="./modules/userManagement.php" enctype="multipart/form-data" method="post">
                                            <input type="file" onchange="imagePreview(event)" name="image" id="profileImage" class="d-none" value="" readonly>
                                            <button type="submit" name="changeInfoImg" class="b-unstyle text-center m-auto cus-btn d-block px-3 p-2 rounded-2">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body" style="height: max-content !important;">
                                <form class="row gutters" method="post" action="./modules/userManagement.php" onsubmit="validate(this,event)">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 color-primary">Personal Details</h6>
                                    </div>
                                    <div class="col-xl-8 gap-2 d-flex flex-column  col-lg-8 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label> 
                                            <input type="text" class="form-control bg-transparent" id="fullName" name="fullname" placeholder="Enter full name" value="<?php echo $row['fullname'] ?>">
                                            <span class="validField d-none text-danger fs-6">Full name is required!.</span>
                                        </div>
                                        <button type="submit" name="changeInfoName" class="b-unstyle text-center m-0 cus-btn d-block px-3 p-2 rounded-2">Update</button>
                                    </div>
                            </div>
                            </form>
                            <form class="row gutters p-2 px-3" method="POST" onsubmit="validate(this,event)" action="./modules/userManagement.php">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 color-primary">Password</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group"> <label for="Street">Current Password</label> <input type="password" class="form-control bg-transparent" name="currentpassword" id="currentPassword" placeholder="Current password">
                                        <div class="validField d-none text-danger fs-6">Please enter your Current Password.</div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group"> <label for="ciTy">New Password</label> <input type="password" class="form-control bg-transparent" id="newPassword" required oninput="checkPasswordMatch()" placeholder="New Password" name="newpassword">
                                        <div class="validField d-none text-danger fs-6">Please enter your New Password.</div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 d-flex flex-column col-md-6 col-sm-6 col-12">
                                    <div class="form-group"> <label for="sTate">Confirm Password</label> <input type="password" class="form-control bg-transparent" id="renewPassword" required oninput="checkPasswordMatch()" placeholder="Confirm Password" name="renewpassword">
                                        <div class="validField d-none text-danger fs-6">Please enter your Confirm Password.</div>
                                    </div>
                                    <button type="submit" name="updatepassword" class="b-unstyle text-center my-2 cus-btn d-block px-3 p-2 rounded-2" id="changePasswordBtn" disabled>Update</button>
                                </div>
                                <div id="password-match-indicator" class="mt-3"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <?php require './components/footer.php'?>
        <!-- Footer Area End  -->

        </div>
        <?php require './components/script.php'?>
        <?php require './modules/errorAlert.php';require_once './modules/adminActivity.php';require_once './modules/userActivity.php';?>
    </body>

    </html>
<?php
} else {
    header("location:./login.php");
    exit();
}
?>