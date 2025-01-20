<?php
require_once('../modules/conn.php');
session_start();

if (isset($_GET['delete'])) {
    $getid = $_GET['delete'];

    // Check if there are related records in the novels table
    $check_query = "SELECT COUNT(*) AS count FROM `novels` WHERE `author_id` = $getid";
    $check_result = mysqli_query($conn, $check_query);
    $row = mysqli_fetch_assoc($check_result);
    $relatedNovelsCount = $row['count'];

    if ($relatedNovelsCount > 0) {
        // There are related records, show an alert
        ?>
        <script>
            alert("Cannot delete the author. There are related novels.");
            window.location.href = '../admin/viewauthor.php';
        </script>
        <?php
    } else {
        // No related records, proceed with deletion
        $query_del = "DELETE FROM `authors` WHERE `author_id` = $getid";
        $run_id = mysqli_query($conn, $query_del);

        if ($run_id) {
            $_SESSION['admin_activity'] = "Author Deleted id ( " . $getid . " )";
            header("location:../admin/viewauthor.php");
        } else {
            ?>
            <script>
                alert("Some error occurred in deleting the author.");
                window.location.href = '../admin/viewauthor.php';
            </script>
            <?php
        }
    }
}
?>
