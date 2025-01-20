<?php session_start();
if(isset($_SESSION['user_id'])){
  require_once './modules/conn.php'; ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="BookStore HTML5 Template" />
  
    <title>Novels Nest - Find your favorite Novels</title>
    <?php require_once './components/head.php' ?>
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
      <!-- Banner-3 Start -->
      <div class="hero-banner-3 bg-lightest-gray" style="height: max-content;">
        <div class="container">
          <div class="row">
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
              <div class="text-block">
                <h1 class="mb-12 d-flex align-items-center">Bookmarks <i class="bi bi-bookmark-check fs-1"></i></h1>
                <p class="dark-gray">Your literary haven for seamless reading adventures. Effortlessly bookmark and resume your favorite novels, all in one personalized space.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Banner-3 End-->
      <!-- Main Content Start -->
      <section class="blog-section mt-24">
        <div class="container">
          <div class="row mb-24">
            <?php
            $userId = $_SESSION['user_id'];
  
            $stmt = $conn->prepare("SELECT novels.*, authors.name AS author_name, genres.name AS genre_name FROM novels JOIN bookmarks ON novels.novel_id = bookmarks.novel_id JOIN authors ON novels.author_id = authors.author_id JOIN genres ON novels.genre_id = genres.genre_id WHERE bookmarks.user_id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
  
            $result = $stmt->get_result();
  
            while ($row = $result->fetch_assoc()) {
              echo ' <div class="col-xl-4 col-lg-6 mb-24">
      <div class="blog-box bg-lightest-gray">
        <div class="blog-img mb-32">
          <a href="./novel-listing.php" class="w-100"><img src="' . $row['banner'] . '" alt="" style="width:100%;aspect-ratio:2/3; object-fit:cover;"></a>
        </div>
        <div class="name-date mb-12">
          <div class="writer-name">
            <img src="assets/media/icons/user.png" alt="">
            <p class="dark-gray">' . $row['author_name'] . '</p>
            &nbsp;&nbsp;
          </div>
          <div class="date">
            <img src="assets/media/icons/calender.png" alt="">
            <p class="dark-gray">' . $row['publication_date'] . '</p>
          </div>
        </div>
        <div class="blog-content">
          <h5 class="mb-24">
            <a href="./novel-listing.php">
            ' . $row['title'] . '
            </a>
          </h5>
          <span class="h6"><a href="' . $row['file'] . '" class="cus-btn small" target="_blank"><span class="icon"><img
            src="assets/media/icons/click-button.png" alt=""></span>Continue</a></span>
        </div>
      </div>
    </div>';
            }
  
            $stmt->close();
  
            ?>
          </div>
        </div>
      </section>
      <!-- Footer Start -->
      <?php require './components/footer.php'?>
      <!-- Footer Area End  -->
  
    </div>
    </div>
    <?php require './components/script.php' ?>
    <?php require './modules/errorAlert.php';
    require_once './modules/adminActivity.php';require_once './modules/userActivity.php'; ?>
  </body>
  
  </html>
  <?php
}else{
  header("Location: ./login.php");
}?>
