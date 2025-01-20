<?php
require_once 'conn.php';
session_start();
if (isset($_POST['register'])) {
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $password = $_POST["password"];
    // Check if username already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['status'] = ['error', 'Username Already Present', 'Please Try Different', false, true];
        header("Location: ../signup.php");
        exit();
    } else {
        // Hash the password using password_hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Process the uploaded image
        if (isset($_FILES['image']['size']) && $_FILES['image']['size'] > 0) {
            $uploadDirectory = "../upload/";
            $imageFile = $_FILES["image"];
            $imageName = $imageFile["name"];
            $imageTmpName = $imageFile["tmp_name"];
            $uniqueName = time() . '_' . $imageName;
            move_uploaded_file($imageTmpName, $uploadDirectory . $uniqueName);
            $img = "./upload/" . $uniqueName;
        } else {
            // Default image path if no image is uploaded
            $img = "./upload/user.png";
        }
        $insertStmt = $conn->prepare("INSERT INTO users (username, fullname, password_hash, role, user_img) VALUES (?, ?, ?, 'user', ?)");
        $insertStmt->bind_param("ssss", $username, $fullname, $hashedPassword, $img);

        if ($insertStmt->execute()) {
            $stmt = $conn->prepare("SELECT user_id, username, role, password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_username, $role, $db_password);
        $stmt->fetch();
        session_regenerate_id();
          $_SESSION["user_id"] = $id;
          $_SESSION["user_username"] = $db_username;
          $_SESSION['status'] = ['success', 'Registration Successful', 'Thanks for being a part!', false, true];
          header("Location: ../index.php");
          exit();
    }else{
        $_SESSION['status'] = ['info', 'Registration Successful', 'But not logged in refresh the page', false, true];
          header("Location: ../index.php");
          exit();
    }
           
        } else {
            $_SESSION['status'] = ['error', 'Registration Failed', 'Please try again later', false, true];
            header("Location: ../signup.php");
            exit();
        }
    }
}else if (isset($_POST['changeInfoImg'])) {
    $id = $_SESSION['user_id'];
    $img = '';
    // Check if the old image file exists
    $oldImagePath = "./upload/old_profile_image{$id}.jpg";
    if (file_exists($oldImagePath)) {
        unlink($oldImagePath); // Delete the old image file
    }

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

        // Append user id to the image name
        $newImageName = "new_profile_image{$id}.jpg";

        move_uploaded_file($imageTmpName, $uploadDirectory . $newImageName);
        $img = "./upload/" . $newImageName;
    }

    $sqlUpdate = "UPDATE `users` SET `user_img`='$img' WHERE user_id = '$id'";
    $resultUpdate = $conn->query($sqlUpdate);

    if ($resultUpdate) {
        $_SESSION['admin_activity'] = "Admin Update Profile";
        header("Location: ../userProfile.php");
        $_SESSION['status'] = ['success', 'Profile Pic Updated', '', false, true, ''];
        exit();
    } else {
        $_SESSION['status'] = ['info', 'Error Updating Details.', 'Retry', false, true];
    }
}else if (isset($_POST['changeInfoName'])){
    $id = $_SESSION['user_id'];
    $fullname = $_POST['fullname'];
    $sqlUpdate = "UPDATE `users` SET `fullname`='$fullname' WHERE user_id = '$id'";
    $resultUpdate = $conn->query($sqlUpdate);
    
    if ($resultUpdate) {
        $_SESSION['admin_activity'] = "Admin Update Profile";
        header("Location: ../userProfile.php");
        $_SESSION['status'] = ['success', 'Name Updated', '', false, true, ''];
        exit();
    } else {
        $_SESSION['status'] = ['info', 'Error Updating Details.', 'Retry', false, true];
    }
}else if (isset($_POST["updatepassword"])) {
    $currentPassword = $_POST['currentpassword'];
    $newPassword = $_POST['newpassword'];
    $reenterNewPassword = $_POST['renewpassword'];
    $id = $_SESSION['user_id'];
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
                       header("Location: ../userProfile.php");
                       $_SESSION['status']=['success','Password Updated.','',false,true];
                } else {
                  header("Location: ../userProfile.php");
                  $_SESSION['status']=['info','Error Updating Password.','Refresh Page or Retry',false,true];
                }
            } else {
               header("Location: ../userProfile.php");
              $_SESSION['status']=['info','New Password & Confirm Password Not Matched','Retry',false,true];
            }
        } else {
            header("Location: ../userProfile.php");
          $_SESSION['status']=['error','Current Password Does Not Matched','Enter Correct Password',false,true];
        }
    } else {
      $_SESSION['status']=['error','Not Registered','This Appears When U Trying to Update Diff User',false,true];
    }
    $conn->close();
  }
  else{
      header("Location: ../index.php");
  }
?>
