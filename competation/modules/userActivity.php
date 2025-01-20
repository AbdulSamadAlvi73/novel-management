<!-- authentication php -->
<?php
require_once 'conn.php';
// session_start();
if (session_status() == PHP_SESSION_NONE) {
    // Start the session
    session_start();
  }
if (isset($_SESSION['user_username'])) {
    if (isset($_SESSION['user_activity'])) {
        $user_id=$_SESSION['user_activity'][0];
        $novel_id=$_SESSION['user_activity'][1];
        $action=$_SESSION['user_activity'][2];
        $query = "INSERT INTO `user_activity` (`id`, `novel`,`action`) 
              VALUES ('$user_id', '$novel_id','$action')";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            unset($_SESSION['user_activity']);
        }
    }
}
?>