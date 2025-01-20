<!-- authentication php -->
<?php
require_once 'conn.php';
// session_start();
if (isset($_SESSION['username'])) {
    if (isset($_SESSION['admin_activity'])) {
        date_default_timezone_set('Asia/Karachi');
        $date_time = date('Y-m-d H:i:s');
        $admin = $_SESSION['username'];
        $activity = $_SESSION['admin_activity'];
        $query = "INSERT INTO `admin_activity` (`admin`, `action`,`date_time`) 
              VALUES ('$admin', '$activity','$date_time')";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            unset($_SESSION['admin_activity']);
        }
    }
}
?>