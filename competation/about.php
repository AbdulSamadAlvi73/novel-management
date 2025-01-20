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

  <?php require_once'./components/header.php'?>
    <!-- Banner-3 Start -->
    <div class="hero-banner-3 bg-lightest-gray">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
            <div class="text-block">
              <h1 class="mb-12">About Us</h1>
              <p class="dark-gray">our mission is to empower individuals and communities through knowledge and creativity.</p>
            </div>
          </div>
          <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12">
            <div class="images-row">
              <img src="assets/media/banner/banner2-2.png" class="blog-img" alt="">
              <img src="assets/media/banner/banner2-3.png" class="blog-img big" alt="">
              <img src="assets/media/banner/banner2-1.png" class="blog-img" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner-3 End-->
    <!-- Hero-Banner Start -->
    <div class="about-banner mt-40 mb-40">
      <div class="container">
        <div class="content pt-40 pb-40">
          <div class="row align-items-center">
            <div class="col-xl-6 col-lg-7">
              <div class="text-block mb-48 mb-lg-0">
                <h2 class="mb-16">Discover Our Mission</h2>
                <p class="mb-16 dark-gray">At <b>Novel Nest</b>, our mission is to empower individuals and communities through knowledge and creativity. We strive to provide accessible and innovative solutions that inspire learning and growth. By fostering a culture of collaboration and inclusivity, we aim to make a positive impact on the lives of those we serve.</p>
              </div>
            </div>
            <div class="col-xl-6 col-lg-5">
              <div class="our-story-img">
                <img src="assets/media/about/our-story.png" alt="">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Hero-Banner End -->

    <!-- Main Content Start -->
    <div class="page-content">
      <section class="our-vision mt-40 mb-40">
        <div class="container">
          <div class="row">
            <div class="col-xl-6">
              <div class="image-block mb-32 mb-xl-0">
                <img src="assets/media/about/our-vision.png" alt="">
              </div>
            </div>
            <div class="col-xl-6">
              <div class="company-msg">
                <h2>Our Vision</h2>
                <p class="dark-gray mt-16 mb-16">Our vision is to create a world where everyone has the opportunity to explore, learn, and succeed. We envision a future where education is not limited by barriers, and creativity knows no bounds. Through cutting-edge technologies and collaborative initiatives, we aspire to be a catalyst for positive change, unlocking the full potential of individuals and communities.</p>
                <ul>
                  <li class="mb-16">
                    <h6>Inclusivity: We celebrate diversity and believe in creating an inclusive environment where everyone feels valued and heard.</h6>
                  </li>
                  <li class="mb-16">
                    <h6>Integrity: We uphold the highest standards of integrity, ensuring transparency and honesty in all our interactions.</h6>
                  </li>
                  <li class="mb-16">
                    <h6>Empowerment: We empower individuals to take charge of their learning journey and explore their full potential.</h6>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
    <!-- Main Content End -->

    <!-- Footer Start -->
    <?php require './components/footer.php'?>
  <!-- Footer Area End  -->

  </div>
  <?php require './components/script.php'?>
  <?php require './modules/errorAlert.php';require_once './modules/adminActivity.php';require_once './modules/userActivity.php';?>
  
</body>

</html>