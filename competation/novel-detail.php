<?php
session_start();
require_once './modules/conn.php';
$novel_id = $_GET['id'];
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
        novel_id='$novel_id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

?>
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
    <div class="hero-banner-3 bg-lightest-gray">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
            <div class="text-block">
              <h1 class="mb-12">Product Detail</h1>
              <p class="dark-gray">Lorem ipsum dolor sit amet consectetur. Sed <br> elementum ac nulla elementum amet
                orci. Interdum.</p>
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


    <!-- Main Content Start -->
    <div class="page-content">
      <section class="product-detail-2 p-40">
        <div class="container">
          <div class="row">
            <div class="col-xl-6">
              <div class="product-content-2">
                <div class="main-content-2">
                  <h2 class="mb-16"><?php echo $row['title'] ?></h2>
                  <div class="product-properties">
                    <div class="author">
                      <h3 class="text-secondary">By: <?php echo $row['author_name'] ?></h3>
                      <p class="text-sm">On: <?php echo $row['publication_date'] ?></p>
                    </div>
                  </div>
                </div>
                <div class="functions-area">
                  <div class="cart-button">
                    <h6><a title="<?php if (isset($_SESSION['user_id'])) {
                                    echo 'read';
                                  } else {
                                    echo 'Login First';
                                  } ?>" href="<?php if (isset($_SESSION['user_id'])) {
                                                echo $row['file'];
                                              } else {
                                                echo './login.php';
                                              } ?>" class="cus-btn" target="_blank"><span class="icon"><i class="color-primary bi bi-book-fill"></i></span>Read Now</a></h6>
                    <ul class="unstyled hover-buttons"><?php
                    if (isset($_SESSION['user_id'])) {
                      $stmtCheck = $conn->prepare("SELECT COUNT(*) FROM bookmarks WHERE user_id = ? AND novel_id = ?");
                      $stmtCheck->bind_param("ii", $_SESSION['user_id'], $novel_id);
                      $stmtCheck->execute();
                      $stmtCheck->bind_result($bookmarkCount);
                      $stmtCheck->fetch();
                      $stmtCheck->close();
                      if ($bookmarkCount > 0) {
    echo '<li>
            <a title="bookmark this" onclick="bookmark(this,event, \'POST\', \'bookmarked\', \'./modules/bookmark.php\', ' . $row['novel_id'] . ')" href="javascript:void(0)">
                <i class="fa fa-bookmark color-primary"></i>
            </a>
          </li>';
}else{
  echo '<li>
  <a title="bookmark this" onclick="bookmark(this,event, \'POST\', \'bookmarked\', \'./modules/bookmark.php\', ' . $row['novel_id'] . ')" href="javascript:void(0)">
  <i class="fal fa-bookmark"></i>
</a>
          </li>';
}}else{
  echo '<li>
            <a title="Login First" href="./login.php">
                <i class="fal fa-bookmark"></i>
            </a>
          </li>';
}?>
                    </ul>
                  </div>
                </div>
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link detail-2" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">About Author</button>
                    <button class="nav-link active detail-2" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews</button>
                    <button class="nav-link detail-2" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Novel
                      Description</button>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <p class="dark-gray p-16">
                      <b><?php echo $row['author_name'] ?>: </b><?php echo $row['author_biography'] ?>
                    </p>
                  </div>
                  <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="comments-sec m-40">
                      <?php
                      $stmtComment = $conn->prepare("
                      SELECT 
                          c.comment_text,
                          c.comment_date,
                          c.comment_id,
                          u.username,
                          u.user_img,
                          u.fullname
                      FROM 
                          comments c
                      JOIN 
                          users u ON c.user_id = u.user_id
                      WHERE 
                          c.novel_id = ?
                          AND c.approved = 1
                  ");
                      $stmtComment->bind_param("i", $novel_id);
                      $stmtComment->execute();
                      $stmtComment->bind_result($commentText, $commentDate, $commentId, $username, $userImg, $fullname);
                      while ($stmtComment->fetch()) {
                        echo '
    <div class="comment-box mb-32">
        <img src="' . $userImg . '" style="width:40px;object-fit:cover; aspect-ratio:1/1;" alt="User Image">
        <div class="block">
            <div class="top-row mb-16">
                <div class="info">
                    <h6 class="dark-gray mb-8">' . $commentDate . '</h6>
                    <h5>' . $fullname . '</h5>
                    <p class="fs-7 text-secondary">' . $username . '</p>
                </div>
            </div>
            <p class="dark-gray mb-24">' . $commentText . '</p>';
            if (isset($_SESSION['user_username']) && $_SESSION['user_username'] == $username) {
              echo '
                    <a href="javascript:void(0)" class="fal fa-trash fs-6 px-2 color-primary" onclick="cnfrmTask(event, \'POST\', \'commentDelete\', \'./modules/comments.php\', ' . $commentId . ', \'Once Deleted Could Not Recover\', \'Comment Deleted!\')"></a>';
          }
          
          echo '
              </div>
          </div>';
                      }
                      $stmtComment->close();
                      ?>

                      <div id="reply" class="accordion-collapse collapse write-reply show" data-bs-parent="#accordionExample">
                        <div class="write-comment-box">
                          <?php
                          if (isset($_SESSION['user_id'])) {
                            echo '<form id="commentForm" data-novelid="' . $row['novel_id'] . '">
                    <div class="input-group">
                        <input type="text" class="form-control" name="comment" required placeholder="Write your thoughts!">
                        <button type="submit" class="shadow b-unstyle color-primary">Post</button>
                    </div>
                </form>';
                          } else {
                            echo '<a href="./login.php">Login To Comment</a>';
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <p class="dark-gray p-16">
                      <?php echo $row['description']; ?>
                    </p>
                  </div>
                </div>
                <!-- Tab Buttons End -->
              </div>
            </div>
            <div class="col-xl-6">
              <div class="product-image d-flex justify-content-center w-100 align-items-center">
                <img class="br-15" src="<?php echo $row['banner'] ?>" style="width:80%; aspect-ratio:2/3; object-fit:cover;" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>
      <h6><a href="novel-listing.php" class="cus-btn text-center mx-auto"><span class="icon"><img src="assets/media/icons/click-button.png" alt=""></span>VIEW MORE</a></h6>
    </div>
    <!-- Main Content End -->
    <!-- Footer Start -->
    <?php require './components/footer.php'?>
    <!-- Footer Area End  -->
  </div>
  <?php require './components/script.php' ?>
  <?php require './modules/errorAlert.php';require_once './modules/adminActivity.php';require_once './modules/userActivity.php';?>
  <script>
    $(document).ready(function() {
      // Submit comment form
      $('#commentForm').on('submit', function(e) {
        e.preventDefault();

        // Get data from the form
        var novelId = $(this).data('novelid');
        var commentText = $(this).find('input[name="comment"]').val();
        $.ajax({
          type: 'POST',
          url: './modules/comments.php',
          data: {
            novelId: novelId,
            commentText: commentText
          },
          success: function(response) {

            if (response == "true") {
              Swal.fire({
                title: "Comment Added!",
                text: "wait for admin approval",
                icon: "success",
                timer: false,
                showConfirmButton: true
              });
            }
          }

        });

      });
      
    });
  </script>
</body>

</html>