<?php
require_once './modules/conn.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="BookStore HTML5 Template" />
  <title>Novel Nest - Find your favorite Novels</title>
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
    <!-- Hero-Banner Start -->
    <div class="hero-banner-1 p-40">
      <div class="container">
        <div class="content">
          <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-12">
              <div class="text-block mb-48 mb-lg-0">
                <h1 class="mb-16">
                  Find Your <br />
                  Favorite Novels
                </h1>
                <p class="mb-64 dark-gray">
                  Novels are windows to worlds unseen, where imagination dances with words,
                  <br />
                  and every page is an invitation to explore the boundless realms of human experience.
                </p>
                <h6>
                  <a href="novel-listing.php" class="cus-btn"><span class="icon"><img src="assets/media/icons/btn-book.png" alt="" /></span>Explore</a>
                </h6>
              </div>
            </div>
            <div class="col-xl-2 offset-xl-0 col-md-3 offset-md-4 col-sm-3 offset-sm-3 col-3 offset-2 d-xl-block d-lg-none">
              <div class="img-block-sm">
                <img src="assets/media/images/image-2.png" alt="" />
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-5 offset-xl-0 offset-lg-2 col-sm-6 col-7">
              <div class="img-block-lg">
                <div class="discount-block">
                  <div class="block">
                    <h3 class="color-white">Novel</h3>
                    <h4 class="color-white">Nest</h4>
                  </div>
                </div>
                <img src="assets/media/images/hero-image.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero-Banner End -->

    <!-- New Arrivals__2 Start -->
    <section class="coming-soon p-40">
      <div class="container">
        <div class="button-bar mb-40">
          <div class="heading mb-0">
            <h3>New Arrivals</h3>
          </div>
          <h6>
            <a href="novel-listing.php" class="cus-btn"><span class="icon"><img src="assets/media/icons/click-button.png" alt="" /></span>VIEW ALL</a>
          </h6>
        </div>
        <div class="row g-2">
          <?php
          $query = "
    SELECT
        n.novel_id,
        n.title,
        n.publication_date,
        n.banner,
        n.description,
        n.file,
        a.name AS author_name,
        a.biography AS author_biography,
        g.name AS genre_name
    FROM
        novels n
    JOIN
        authors a ON n.author_id = a.author_id
    JOIN
        genres g ON n.genre_id = g.genre_id
    WHERE
        1 = 1
    ORDER BY
        n.publication_date DESC
    LIMIT 3";
          $result = $conn->query($query);
          if ($result) {
            while ($row = $result->fetch_assoc()) {
              echo'<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
              <div class="coming-block">
                <div class="fit-image">
                  <a href="novel-detail.php?id=' . $row['novel_id'] . '" style="width:100%;"><img src="' . $row['banner'] . '" class="br-20" alt="" style="width:100%; aspect-ratio:2/3; object-fit:cover;" /></a>
                </div>
                <div class="coming-content">
                  <div class="second-content">
                    <div class="title">
                      <h5 class="h5">' . $row['title'] . '</h5>
                      <span class="h6 medium-gray">' . $row['author_name'] . '</span>
                    </div>
                    <div class="product-btn">
                    <a href=""novel-detail.php?id='.$row['novel_id'].'""><i class="fal fa-eye"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
            }
          } else {
            echo 'Error executing the query: ' . $conn->error;
          }
          ?>
        </div>
      </div>
    </section>
    <!-- New Arrivals__2 End -->
    <!-- Inner banner Start -->
    <section class="inner-banner-1 mt-40">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-24">
            <div class="text-area">
              <h5 class="color-primary mb-8">Genre</h5>
              <span class="color-white h1 mb-8">Mystery</span>
              <h6>
                <a href="novel-listing.php" class="cus-btn"><span class="icon"><img src="assets/media/icons/click-button.png" alt="" /></span>View More</a>
              </h6>
            </div>
          </div>
          <div class="col-xl-6 col-lg-8 col-sm-12 col-12">
            <div class="row">
            <?php
              $query = "
              SELECT novel_id, banner, title
              FROM novels
              WHERE genre_id = (SELECT genre_id FROM genres WHERE name = 'Mystery')
              LIMIT 3;
          ";
          
          $result = $conn->query($query);
          
          // Check if the query was successful
          if ($result) {
              while ($row = $result->fetch_assoc()) {
                  echo '
                  <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <a class="inner-card p-1 text-decoration-none" href="./novel-detail.php?id=' . $row['novel_id'] . '" style="width:100%;">
                          <img style="width:100%; object-fit:cover; aspect-ratio:2/3;" class="rounded" src="' . $row['banner'] . '" alt="" class="mb-16" />
                          <h5 class="color-white mb-8">' . $row['title'] . '</h5>
                      </a>
                  </div>';
              }
          } else {
              // Handle the case where the query fails
              echo 'Error executing the query: ' . $conn->error;
          }
          
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Inner banner End -->

    <!-- Inner Banner-2 Start -->
    <section class="inner-banner-2 mb-40">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-24">
            <div class="text-area">
              <h5 class="color-primary mb-8">Genre</h5>
              <span class="color-white h1 mb-8">Horror</span>
              <h6>
                <a href="novel-listing.php" class="cus-btn"><span class="icon"><img src="assets/media/icons/click-button.png" alt="" /></span>View More</a>
              </h6>
            </div>
          </div>
          <div class="col-xl-6 col-lg-8 col-sm-12 col-12">
            <div class="row">
              <?php
              $query = "
              SELECT novel_id, banner, title
              FROM novels
              WHERE genre_id = (SELECT genre_id FROM genres WHERE name = 'Horror')
              LIMIT 3;
          ";
          
          $result = $conn->query($query);
          
          // Check if the query was successful
          if ($result) {
              while ($row = $result->fetch_assoc()) {
                  echo '
                  <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                      <a class="inner-card p-1 text-decoration-none" href="./novel-detail.php?id=' . $row['novel_id'] . '" style="width:100%;">
                          <img style="width:100%; object-fit:cover; aspect-ratio:2/3;" class="rounded" src="' . $row['banner'] . '" alt="" class="mb-16" />
                          <h5 class="color-white mb-8">' . $row['title'] . '</h5>
                      </a>
                  </div>';
              }
          } else {
              // Handle the case where the query fails
              echo 'Error executing the query: ' . $conn->error;
          }
          
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Inner Banner-2 End -->
    <!-- Footer Start -->
    <?php require './components/footer.php' ?>
    <!-- Footer Area End  -->
  </div>
  <?php require './components/script.php' ?>
  <?php require './modules/errorAlert.php';
  require_once './modules/adminActivity.php';
  require_once './modules/userActivity.php'; ?>
</body>

</html>