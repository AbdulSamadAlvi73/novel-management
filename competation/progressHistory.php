<?php
session_start();
require_once('./modules/conn.php');
if (isset($_SESSION['user_username'])) {
  $query = "
    SELECT
        ua.id,
        ua.novel,
        ua.action,
        ua.time,
        ua.history_id,
        n.title AS novel_title,
        n.banner AS novel_image,
        n.file AS novel_file
    FROM
        user_activity ua
    LEFT JOIN
        novels n ON ua.novel = n.novel_id
    ORDER BY
        ua.id DESC
    ";
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="BookStore HTML5 Template"/>

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
    <a href="#main-wrapper" id="backto-top" class="back-to-top"><i class="fas fa-angle-up"></i></a>
    <!-- Main Wrapper Start -->
    <div id="main-wrapper" class="main-wrapper overflow-hidden">

    <?php require_once './components/header.php'?>
      <!-- Banner-3 Start -->
      <div class="hero-banner-3 bg-lightest-gray" style="height: max-content;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
                  <div class="text-block">
                    <h1 class="mb-12 d-flex align-items-center">History <i class="bi bi-clock-history fs-1"></i></h1>
                    <p class="dark-gray">Explore your reading milestones here. Your bookmarked pages and progress history await, making each chapter memorable.</p>
                  </div>
                </div>
                <!-- <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12">
                  <div class="images-row">
                    <img src="assets/media/banner/banner2-2.png" class="blog-img" alt="" >
                    <img src="assets/media/banner/banner2-3.png" class="blog-img big" alt="">
                    <img src="assets/media/banner/banner2-1.png" class="blog-img" alt="" >
                  </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Cart Area Start -->
    <section class="cart">
      <div class="container">
        <div class="d-md-block overflow-auto">
          <table class="cart-table mb-24" style="width: max-content !important; min-width:100%;">
            <thead style="width: max-content;">
              <tr class="text-center">
                <th class="fs-5 text-start px-0">Novel</th>
                <th class="fs-5 text-center px-0">Action</th>
                <th class="fs-5 text-center px-0">Time</th>
              </tr>
            </thead>
            <tbody>
            <?php

$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo'<tr>
        <td class="pd">
          <div class="product-detail-box">
            <div class="img-block" style="width:50px;">
              <img style="width:100%; aspect-ratio:2/3; object-fit:cover;" src="' . $row['novel_image'] . '" alt="">
            </div>
            <div>
              <h5 class="dark-gray"><a target="_blank" href="' . $row['novel_file'] . '">' . $row['novel_title'] . '</a></h5>
            </div>
          </div>
        </td>
        <td>
          <h5 class="dark-gray text-center">' . $row['action'] . '</h5>
        </td>
        <td>
          <h5 class="text-center">' . $row['time'] . '</h5>
        </td>
        <td><a onclick="confirmDelete('.$row['history_id'].')"><i class="fal fa-times"></i></a></td>
      </tr>';
    }
} else {
    echo 'Error executing the query: ' . $conn->error;
}
?>
                </tbody>
          </table>
         
        </div>
      </div>
    </section>
    <!-- Cart Area End -->
<!-- Footer Start -->
<?php require './components/footer.php'?>
<!-- Footer Area End  -->
    </div>
    <?php require './components/script.php' ?>
  <?php require './modules/errorAlert.php';require_once './modules/adminActivity.php';require_once './modules/userActivity.php';?>
  <script>
function confirmDelete(historyId) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteHistory(historyId);
        }
    });
}

function deleteHistory(historyId) {
    $.ajax({
        type: 'POST',
        url: './modules/userProgress.php',
        data: {
            historyId: historyId
        },
        success: function(response) {
            if (response === 'success') {
              Swal.fire({
                title: "Deleted!",
                icon: "success",
              }).then((result)=>{
                location.reload();
              })
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to delete history',
                    icon: 'error',
                    timer: 3000
                });
            }
        
        }
    });
}
</script>

</body>
</html>
<?php
} else {
    header("location:./login.php");
    exit();
}
?>