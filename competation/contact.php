
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="BookStore HTML5 Template" />

  <title>Novels Nest - Find your favorite Novels</title>
  <?php require_once './components/head.php'?>
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

  <?php require_once'./components/header.php'?>
    <!-- Banner-3 Start -->
    <div class="hero-banner-3 bg-lightest-gray">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
            <div class="text-block">
              <h1 class="mb-12">Contact Us</h1>
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
    <!-- Form and Map Start -->
    <section class="form-map pt-40 mb-40">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-8">
            <div class="form-section bg-lightest-gray mb-32">
              <div class="row ">
                <div class="col-sm-6">
                  <h6><a href="#" class="link-btn mb-24 mb-sm-0"><img src="assets/media/icons/telephone.png" alt=""> +92 319 3493076</a></h6>
                </div>
                <div class="col-sm-6">
                  <h6><a href="#" class="link-btn"><img src="assets/media/icons/mail-box.png" alt="">
                      novels@info.com</a></h6>
                </div>
              </div>
              <h3 class="mb-16 mt-24">Contact Form</h3>
              <p class="dark-gray mb-24">Lorem ipsum dolor sit amet consectetur nunc faucibus ut ornare.</p>
              <form  onsubmit="showAlert(this)" class="contact-form">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-24">
                      <input type="text" class="form-control" id="first-name" name="name" required
                        placeholder="Your Name">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-24">
                      <input type="email" class="form-control" id="your-email" name="email" required
                        placeholder="Your Email">
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 mb-24">
                  <input type="number" class="form-control" id="phone" name="number" required
                    placeholder="Your Number">
                </div>
                <div class="col-sm-12 mb-24">
                  <input type="text" class="form-control" id="comment" name="message" required
                    placeholder="Write your comments here">
                </div>
                <button type="submit" name="contact" class="b-unstyle cus-btn w-100">Submit</button>
                <!-- Alert Message -->
                <div id="message" class="alert-msg"></div>
              </form>
            </div>
          </div>
          <div class="col-xl-6 col-lg-4">
            <div class="map-block">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96762.49759114935!2d-74.0650942328869!3d40.72180165425906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1695302645011!5m2!1sen!2s"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Form and Map End -->
    <!-- Footer Start -->
    <?php require './components/footer.php'?>
  <!-- Footer Area End  -->

  </div>
  <?php require './components/script.php'?>
  <?php require './modules/errorAlert.php';require_once './modules/userActivity.php';?>
  <script>
    function showAlert(form) {
  let formInputs = form.querySelectorAll('.form-control');
  let allFieldsFilled = true;

  for (let i = 0; i < formInputs.length; i++) {
    if (formInputs[i].value === '') {
      allFieldsFilled = false;
      break;  // Stop checking if one field is empty
    }
  }

  if (allFieldsFilled) {
    Swal.fire({
      title: "Thanks For Contact",
      icon: "success",
    });
  }
}

  </script>
</body>
</html>