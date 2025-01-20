<?php
require_once('../modules/conn.php');
session_start();
if(isset($_SESSION['username']))
{
  $query = "SELECT * FROM admin";
  $row = $conn->query($query);
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
          <li class="breadcrumb-item active">History</li>
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
    <h5 class="card-title">Activity</h5>

    <!-- Table with hoverable rows -->
    <table class="table table-hover datatable">
      <thead class="samad-dashborad-header">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Admin</th>
          <th scope="col">Activity</th>
          <th scope="col">Date & Time</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $query = "select * from admin_activity";
        $query_run = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($query_run)){
        ?>
        <tr>
          <th scope="row"><?php echo $row['id'] ?></th>
          <td><?php echo $row['admin'] ?></td>
          <td><?php echo $row['action'] ?></td>
          <td><?php echo $row['date_time'] ?></td>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php require 'components/loader.php'; require 'components/script.php'; require '../modules/errorAlert.php';require_once'../modules/adminActivity.php';?>
</body>
</html>
<?php
    }else{
      header("location:../login.php");
exit();
    }
?>