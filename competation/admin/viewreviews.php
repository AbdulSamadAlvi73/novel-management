<?php
require_once('../modules/conn.php');
session_start();
if (isset($_SESSION['username'])) {
  $query = "SELECT * FROM users";
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
            <th scope="col">User</th>
            <th scope="col">Novel</th>
            <th scope="col">Comment</th>
            <th scope="col">Comment Date</th>
            <th scope="col">Approved</th>
            <th scope="col">Manage Approval</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT comments.*, users.username AS user_name, novels.title AS novel_name 
                  FROM comments 
                  JOIN users ON comments.user_id = users.user_id 
                  JOIN novels ON comments.novel_id = novels.novel_id";
        $query_run = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
            <tr>
                <th scope="row"><?php echo $row['comment_id'] ?></th>
                <td><?php echo $row['user_name'] ?></td>
                <td><?php echo $row['novel_name'] ?></td>
                <td><?php echo $row['comment_text'] ?></td>
                <td><?php echo $row['comment_date'] ?></td>
                <td>
                    <?php
                    if ($row['approved'] == 1) {
                        echo 'Approved';
                    } elseif ($row['approved'] == 0) {
                        echo 'Pending';
                    }
                    ?>
                </td>
                <td>
                    <form action="../modules/comments.php" method="POST">
                        <input type="hidden" name="comment_id" value="<?php echo $row['comment_id']; ?>">
                        <select class="form-select form-control form-select-sm" name="approval" id="approval">
                            <option value="1" <?php echo ($row['approved'] == 1) ? 'selected' : ''; ?>>Yes</option>
                            <option value="0" <?php echo ($row['approved'] == 0) ? 'selected' : ''; ?>>No</option>
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm" name="update_approval">Update</button>
                    </form>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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