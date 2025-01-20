<?php
session_start();
require_once './conn.php';
require_once'./userActivity.php';
if (isset($_POST['bookmarked'])) {
    $userId = $_SESSION['user_id'];
    $novelId = $_POST['data'];

    $stmtCheck = $conn->prepare("SELECT COUNT(*) FROM bookmarks WHERE user_id = ? AND novel_id = ?");
    $stmtCheck->bind_param("ii", $userId, $novelId);
    $stmtCheck->execute();
    $stmtCheck->bind_result($bookmarkCount);
    $stmtCheck->fetch();
    $stmtCheck->close();

    if ($bookmarkCount > 0) {
        $stmtRemoveBookmark = $conn->prepare("DELETE FROM bookmarks WHERE user_id = ? AND novel_id = ?");
        $stmtRemoveBookmark->bind_param("ii", $userId, $novelId);
        $stmtRemoveBookmark->execute();
        $stmtRemoveBookmark->close();
        $_SESSION['user_activity']=[$userId,$novelId,"Remove Bookmarked"];
        echo "removed";
    } else {
        // User hasn't bookmarked, add the bookmark
        $stmtAddBookmark = $conn->prepare("INSERT INTO bookmarks (user_id, novel_id, bookmarked_date) VALUES (?, ?, NOW())");
        $stmtAddBookmark->bind_param("ii", $userId, $novelId);
        $stmtAddBookmark->execute();
        $stmtAddBookmark->close();
        $_SESSION['user_activity']=[$userId,$novelId,"Add Bookmarked"];
        echo "added";
    }
}
?>
