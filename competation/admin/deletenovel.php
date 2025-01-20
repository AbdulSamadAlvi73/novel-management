<?php
require_once('../modules/conn.php');
session_start();

if (isset($_GET['delete'])) {
    $getid = $_GET['delete'];

    // Check if there are related records in the authors or genres tables
    $check_query = "SELECT COUNT(*) AS count FROM `authors` WHERE `author_id` = $getid 
                    UNION 
                    SELECT COUNT(*) AS count FROM `genres` WHERE `genre_id` = $getid";
    
    $check_result = mysqli_query($conn, $check_query);

    // Sum up the counts from both queries
    $relatedRecordsCount = 0;
    while ($row = mysqli_fetch_assoc($check_result)) {
        $relatedRecordsCount += $row['count'];
    }

    if ($relatedRecordsCount > 0) {
        // There are related records, show an alert
        ?>
        <script>
            alert("Cannot delete the novel. It is connected with other records in the authors or genres tables.");
            window.location.href = '../admin/viewnovels.php';
        </script>
        <?php
    } else {
        // No related records, proceed with deleting the novel
        $query_del = "DELETE FROM `novels` WHERE `novel_id` = $getid";
        $run_id = mysqli_query($conn, $query_del);

        if ($run_id) {
            $_SESSION['admin_activity'] = "Novel Deleted id ( " . $getid . " )";
            header("location:../admin/viewnovels.php");
        } else {
            ?>
            <script>
                alert("Some error occurred in deleting the novel.");
                window.location.href = '../admin/viewnovels.php';
            </script>
            <?php
        }
    }
}
?>
