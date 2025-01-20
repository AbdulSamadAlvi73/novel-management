<?php
session_start();
 $_SESSION['user_activity']="User Logged Out.";
 session_destroy();
 header("Location: ./login.php");
 ?>