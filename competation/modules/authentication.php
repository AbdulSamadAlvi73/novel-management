<!-- authentication php -->
<?php
require_once'conn.php';
session_start();
if(isset($_POST['login'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    // We are using prepared statements for security purpose & to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, username, role, password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_username, $role, $db_password);
        $stmt->fetch();
        if($role=="admin" && password_verify($password, $db_password)){
          session_regenerate_id();
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $db_username;
            $_SESSION['status']=['success','Login Successful','Welcome Back!',false,true];
            $_SESSION['admin_activity']="Admin Logged In";
            header("Location: ../admin/index.php");
            exit();
        }elseif($role=="user" && password_verify($password, $db_password)){
          session_regenerate_id();
          $_SESSION["user_id"] = $id;
          $_SESSION["user_username"] = $db_username;
          $_SESSION['status']=['success','Login Successful','Welcome Back!',false,true];
          header("Location: ../index.php");
          exit();
        }else {
            $_SESSION['status']=['error','Username or Password Does Not Match','Please Try Again',false,true];
            header("Location: ../login.php");
            exit();
        }
    }else {
          $_SESSION['status']=['error','Username & Password Does Not Match','Please Try Again',false,true];
        header("Location: ../login.php");
        exit();
    }

    $stmt->close();
}else if(isset($_POST['logout'])){
  $_SESSION['admin_activity']="Admin Logged Out.";
    header("Location: ../login.php");
    session_unset();
}else if (isset($_POST['changeInfo'])) {
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $id = $_SESSION['id'];
  $img = '';
  $sqlSelect = "SELECT `user_img` FROM `users` WHERE user_id = '$id'";
  $resultSelect = $conn->query($sqlSelect);
  if ($resultSelect->num_rows > 0) {
      $row = $resultSelect->fetch_assoc();
      $img = $row['user_img'];
  }
  if ($_FILES['image']['size'] > 0) {
      $uploadDirectory = "../upload/";
      $imageFile = $_FILES["image"];
      $imageName = $imageFile["name"];
      $imageTmpName = $imageFile["tmp_name"];
      $oldImagePath = $uploadDirectory . "old_profile_image.jpg";
      if (file_exists($oldImagePath)) {
          unlink($oldImagePath);
      }
      move_uploaded_file($imageTmpName, $uploadDirectory . "new_profile_image.jpg");
      $img = "../upload/new_profile_image.jpg";
  }
  $sqlUpdate = "UPDATE `users` SET `username`='$username',`fullname`='$fullname', `user_img`='$img' WHERE user_id = '$id'";
  $resultUpdate = $conn->query($sqlUpdate);
  if ($resultUpdate) {
    $_SESSION['admin_activity']="Admin Update Profile";
      header("Location: ../admin/updateadmin.php?");
      $_SESSION['status']=['success','Details Updated','',false,true,''];
      exit();
  } else {
    $_SESSION['status']=['info','Error Updating Details.','Retry',false,true];
  }
}else if (isset($_POST["updatepassword"])) {
  $currentPassword = $_POST['currentpassword'];
  $newPassword = $_POST['newpassword'];
  $reenterNewPassword = $_POST['renewpassword'];
  $id = $_SESSION['id'];
  $getHashedPasswordQuery = "SELECT password_hash, username FROM `users` WHERE user_id = '$id'";
  $result = $conn->query($getHashedPasswordQuery);
  if ($result->num_rows > 0) {
      $rowdata = $result->fetch_assoc();
      $hashedPasswordFromDB = $rowdata['password_hash'];
      if (password_verify($currentPassword, $hashedPasswordFromDB)) {
          if ($newPassword == $reenterNewPassword) {
              $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
              $updatePasswordQuery = "UPDATE `users` SET password_hash = '$hashedNewPassword' WHERE `user_id` = '$id'";
              if ($conn->query($updatePasswordQuery) === TRUE) {
                     header("Location: ../admin/updateadmin.php");
                     $_SESSION['status']=['success','Password Updated.','',false,true];
              } else {
                header("Location: ../admin/updateadmin.php");
                $_SESSION['status']=['info','Error Updating Password.','Refresh Page or Retry',false,true];
              }
          } else {
             header("Location: ../admin/updateadmin.php");
            $_SESSION['status']=['info','New Password & Confirm Password Not Matched','Retry',false,true];
          }
      } else {
          header("Location: ../admin/updateadmin.php");
        $_SESSION['status']=['error','Current Password Does Not Matched','Enter Correct Password',false,true];
      }
  } else {
    $_SESSION['status']=['error','Not Registered','This Appears When U Trying to Update Diff User',false,true];
  }
  $conn->close();
}
else{
    header("Location: ../admin/index.php");
}
?>