<?php
require_once 'conn.php';
session_start();
// for adding novel
// Function to generate a unique name for files or images
function generateUniqueName($originalName) {
  $timestamp = time();
  $randomString = bin2hex(random_bytes(8)); // Adjust the length as needed
  $extension = pathinfo($originalName, PATHINFO_EXTENSION);

  return $timestamp . '_' . $randomString . '.' . $extension;
}

// For adding a novel
if (isset($_POST['addnovel'])) {
  $title =mysqli_real_escape_string($conn,$_POST['title']);
  $author_id = mysqli_real_escape_string($conn,$_POST['author_id']);
  $genre_id = mysqli_real_escape_string($conn,$_POST['genre_id']);
  $publication_date = $_POST['publication_date'];
  $description = mysqli_real_escape_string($conn,$_POST['description']);

  // Handle file upload
  $file_name = generateUniqueName($_FILES['file']['name']);
  $file_tmp = $_FILES['file']['tmp_name'];
  $file_type = $_FILES['file']['type'];
  $file_size = $_FILES['file']['size'];

  // Move uploaded file to a directory
  $upload_directory = '../upload/';
  $file_path = $upload_directory . $file_name;
  $userside_file_path = './upload/' . $file_name;
  move_uploaded_file($file_tmp, $file_path);
  // Handle image upload
  $image_name = generateUniqueName($_FILES['banner']['name']);
  $image_tmp = $_FILES['banner']['tmp_name'];

  // Move uploaded image to a directory
  $image_directory = '../upload/';
  $image_path = $image_directory . $image_name;
  $userside_image_path = './upload/' . $image_name;
  move_uploaded_file($image_tmp, $image_path);

  $query = "INSERT INTO `novels` (`title`, `author_id`, `genre_id`, `publication_date`,`description`, `file`, `banner`) 
          VALUES ('$title', '$author_id', '$genre_id', '$publication_date', '$description', '$userside_file_path', '$userside_image_path')";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
      $_SESSION['status'] = ['success', 'Novel Added!', '', false, true];
      $_SESSION['admin_activity'] = "New Novel Added ( " . $title . " )";
      header("location:../admin/addnovel.php");
  }
}
else if (isset($_POST['delete'])) {
  $getid = $_POST['data'];
  $query_del = "DELETE FROM `subjects` WHERE `id` = $getid";
  $run_id = mysqli_query($conn, $query_del);
  if ($run_id) {
    $_SESSION['admin_activity'] = "Subject Deleted id ( " . $getid . " )";
    header("location:../admin/viewsubjects.php");
  }
}
else if(isset($_POST['addauthor'])) {
  $name = $_POST['name'];
  $biography = $_POST['biography'];
  $query = "INSERT INTO `authors` (`name`,`biography`) 
                  VALUES ('$name','$biography')";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    $_SESSION['status'] = ['success', 'Author Added!', '', false, true];
    $_SESSION['admin_activity'] = "New Author Added ( " . $name . " )";
    header("location:../admin/addauthor.php");
  }
} else if (isset($_POST['authordelete'])) {
  $getid = $_POST['author_id'];
  $query_del = "DELETE FROM `authors` WHERE `author_id` = $getid";
  $run_id = mysqli_query($conn, $query_del);
  if ($run_id) {
    $_SESSION['admin_activity'] = "Author Deleted id ( " . $getid . " )";
    header("location:../admin/viewauthor.php");
  }
}
else if(isset($_POST['addgenre'])) {
  $name = $_POST['name'];
  $query = "INSERT INTO `genres` (`name`) 
                  VALUES ('$name')";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    $_SESSION['status'] = ['success', 'Genre Added!', '', false, true];
    $_SESSION['admin_activity'] = "New Genre Added ( " . $name . " )";
    header("location:../admin/addgenre.php");
  }
}
else if (isset($_POST['genredelete'])) {
  $getid = $_POST['data'];
  $query_del = "DELETE FROM `genres` WHERE `genre_id` = $getid";
  $run_id = mysqli_query($conn, $query_del);
  if ($run_id) {
    $_SESSION['admin_activity'] = "Genre Deleted id ( " . $getid . " )";
    header("location:../admin/viewgenres.php");
  }
}
else if (isset($_POST['update_approval'])) {
  $review_id = $_POST['review_id'];
  $approved = $_POST['approval'];

  // Update the database based on the selected approval status
  $update_query = "UPDATE reviews SET approved = $approved WHERE review_id = $review_id";
  $update_result = mysqli_query($conn, $update_query);

  if ($update_result) {
      // Update successful
      // You may add a success message or redirect to a different page
      header("location:../admin/viewreviews.php");
  } else {
      // Update failed
      // You may handle the error accordingly
  }
}
else {
  header('location:../admin/login.php');
} 
?>