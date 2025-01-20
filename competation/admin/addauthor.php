<?php
session_start();
require_once("../modules/conn.php");
if (isset($_SESSION['username'])) {

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
                        <h5 class="card-title">Add Author</h5>

                        <!-- Vertical Form -->
                        <form class="row g-3" action="../modules/novelManagement.php" method="POST"
                            enctype="multipart/form-data" onsubmit="validate(this,event)">
                            <div class="col-12">
                                <label for="fname" class="form-label">Name</label>
                                <input type="text" class="form-control" id="title" name="name">
                                <div class="validField d-none text-danger fs-6">Field is required.</div>
                            </div>

                            <div class="col-12">
                                <label for="fname" class="form-label">Biography</label>
                                <input type="text" class="form-control" id="title" name="biography">
                                <div class="validField d-none text-danger fs-6">Field is required.</div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn samad-btn-color" name="addauthor">Add</button>
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
    exit();
}
?>