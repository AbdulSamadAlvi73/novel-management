<?php
require_once('../modules/conn.php');
session_start();
if (isset($_SESSION['username'])) {
  $query = "SELECT * FROM admin";
  $row = $conn->query($query);
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Virtual Novels</title>
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

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View Novels</h5>

                  <!-- Table with hoverable rows -->
                  <table class="table table-hover datatable">
                    <thead class="samad-dashborad-header">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Publication Date</th>
                        <th scope="col">Banner</th>
                        <th scope="col">File</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "SELECT novels.*, authors.name AS author_name, genres.name AS genre_name 
        FROM novels 
        JOIN authors ON novels.author_id = authors.author_id 
        JOIN genres ON novels.genre_id = genres.genre_id";
                      $query_run = mysqli_query($conn, $query);
                      while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                        <tr>
                          <th scope="row">
                            <?php echo $row['novel_id'] ?>
                          </th>
                          <td>
                            <?php echo $row['title'] ?>
                          </td>
                          <td>
                            <?php echo $row['author_name'] ?>
                          </td>
                          <td>
                            <?php echo $row['genre_name'] ?>
                          </td>
                          <td>
                            <?php echo $row['publication_date'] ?>
                          </td>
                          <td><img src=".<?php echo $row['banner'] ?>" alt="Image" height="70" width="60"></td>
                          <td></td>
                          <td>
                            <!-- Display a link to download/view the file in another tab -->
                            <a href="../<?php echo $row['file'] ?>" target="_blank">
                              <i class="bi bi-file-earmark-text"></i>
                              <?php echo basename($row['file']) ?>
                            </a>
                          </td>
                          <td class="text-center"><a href="./editnovel.php?id=<?php echo $row['novel_id'] ?>"><i
                                class="bi bi-pencil-square text-primary"></i></a></td>
                          <td class="text-center">
                            <form action="./deletenovel.php" method="POST">
                              <a href="deletenovel.php?delete=<?php echo $row['novel_id'] ?>" name="delete"><i
                                  class="bi bi-trash3-fill text-danger"></i></a>
                            </form>
                            <!-- <a href="javascript:void(0)"
                              onclick="cnfrmTask(event,'POST','delete','../modules/novelManagement.php',<?php echo $row['novel_id'] ?>,'Once Deleted Could Not Recover','Novel Deleted!')"
                              name="noveldelete"><i class="bi bi-trash3-fill text-danger"></i></a> -->
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>

                  <!-- End Table with hoverable rows -->

                </div>
              </div>

            </div>
          </div><!-- End Left side columns -->


        </div>
      </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php
    include('components/footer.php');
    ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
    <?php require 'components/loader.php';
    require 'components/script.php';
    require '../modules/errorAlert.php';
    require_once '../modules/adminActivity.php'; ?>
  </body>

  </html>
  <?php
} else {
  header("location:../login.php");
}
?>