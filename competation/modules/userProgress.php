<?php
require_once 'conn.php'; // Include your database connection file
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $historyId = $_POST['historyId'];

    // Validate the user or any other necessary conditions before deletion

    // Perform the delete query
    $stmtDelete = $conn->prepare("DELETE FROM user_activity WHERE history_id = ?");
    $stmtDelete->bind_param("i", $historyId);

    if ($stmtDelete->execute()) {
        // Deletion successful
        echo 'success';
    } else {
        // Deletion failed
        echo 'error';
    }

    $stmtDelete->close();
}
?>
