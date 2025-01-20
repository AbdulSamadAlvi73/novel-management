<?php 
session_start();
require_once("../modules/conn.php");
if(isset($_SESSION['username']))
{
  $query = "SELECT * FROM admin";
  $row = mysqli_query($conn,$query);
  $id=$_GET['id'];
  $sel="SELECT * FROM `novels` WHERE novel_id='$id'";
  $res=mysqli_query($conn,$sel);
  $row=mysqli_fetch_array($res);
 if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $author_id = $_POST['author_id'];
  $genre_id = $_POST['genre_id'];
  $publication_date = $_POST['publication_date'];
  // Handle file upload
  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  $file_type = $_FILES['file']['type'];
  $file_size = $_FILES['file']['size'];
  // Move uploaded file to a directory
  $upload_directory = 'uploads/';
  $file_path = $upload_directory . $file_name;

  move_uploaded_file($file_tmp, $file_path);

  $query = "UPDATE `novels` SET `title`='$title',`author_id`='$author_id',`genre_id`='$genre_id',`publication_date`='$publication_date',`file`='$file_path' WHERE `novel_id`='$id'";
  $query_run = mysqli_query($conn, $query);
  if($query_run) {
    $_SESSION['status']=['success','Novel Updated.','',3000,false];
      header('location:viewnovels.php');
  } else {
      echo "Update Unsuccessful";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Water Bottle</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php require 'components/head.php' ?>

</head>

<body>

 <!-- ======= Header ======= -->
 <?php
  require('components/header.php');
  ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
  require('components/sidebar.php');
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

    <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit User</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="#" method="POST" enctype="multipart/form-data"
              onsubmit="return  validateForm(this,event)">
              <div class="col-12">
                <label for="fname" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'] ?>">
                <div class="validField d-none text-danger fs-6">Field is required.</div>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Select Author</label>
                <select class="form-select form-control form-select-md" name="author_id" id="">
                  <option selected>Select one</option>
                  <?php
                  $fetchauthor = "SELECT * FROM `authors`";
                  $authorquery = mysqli_query($conn, $fetchauthor);
                  while ($authorfetchresult = mysqli_fetch_assoc($authorquery)) {
                    ?>
                    <option value="<?php echo $authorfetchresult['author_id'] ?>">
                      <?php echo $authorfetchresult['name'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Select Genre</label>
                <select class="form-select form-control form-select-md" name="genre_id" id="">
                  <option selected>Select one</option>
                  <?php
                  $fetchgenre = "SELECT * FROM `genres`";
                  $genrequery = mysqli_query($conn, $fetchgenre);
                  while ($genrefetchresult = mysqli_fetch_assoc($genrequery)) {
                    ?>
                    <option value="<?php echo $genrefetchresult['genre_id'] ?>">
                      <?php echo $genrefetchresult['name'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-12">
                <label for="fname" class="form-label">Novel File (PDF)</label>
                <input type="file" class="form-control" id="file" name="file">
                <div class="validField d-none text-danger fs-6" id="file-error">Field is required or invalid file type
                  (PDF).</div>
              </div>
              <div class="col-12">
                <label for="fname" class="form-label">Publication Date</label>
                <input type="date" class="form-control" id="publication_date" name="publication_date" value="<?php echo $row['publication_date'] ?>">
                <div class="validField d-none text-danger fs-6">Field is required.</div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn samad-btn-color" name="submit">Update</button>
              </div>
            </form><!-- Vertical Form -->

          </div>
        </div>


      </div>

  </main><!-- End #main -->
  
  <!-- ======= Footer ======= -->
  <?php
  require('components/footer.php');
  ?>
 <!-- End Footer -->


 <script>
    function validateForm(form) {
        // Reset previous error messages
        document.getElementById('file-error').classList.add('d-none');

        // Validate file type
        var fileInput = form['file'];
        var allowedTypes = ['application/pdf'];
        if (fileInput.value) {
            var fileType = fileInput.files[0].type;
            if (!allowedTypes.includes(fileType)) {
                document.getElementById('file-error').classList.remove('d-none');
                return false;
            }
        } else {
            // If the file input is empty
            document.getElementById('file-error').classList.remove('d-none');
            return false;
        }

        return true; // Proceed with form submission if validation passes
    }
</script>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php require 'components/loader.php'; require 'components/script.php'; require '../modules/errorAlert.php';require_once'../modules/adminActivity.php';?>
</body>

</html>

<?php

    }else{
      header("location:../login.php");
    }
?>