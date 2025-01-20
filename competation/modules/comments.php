<?php
require_once 'conn.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['commentDelete'])){
        $userId = $_SESSION['user_id'];
        $comId=$_POST['data'];
        $stmtDelete = $conn->prepare("DELETE FROM comments WHERE comment_id = ? AND user_id = ?");
            if ($stmtDelete) {
                $stmtDelete->bind_param("ii", $comId, $userId);
                $stmtDelete->execute();
            }
    }elseif(isset($_POST['update_approval'])) {
        $commentId = $_POST['comment_id'];
        $approval = $_POST['approval'];
        $updateQuery = "UPDATE comments SET approved = ? WHERE comment_id = ?";
        $stmtUpdate = $conn->prepare($updateQuery);
        $stmtUpdate->bind_param("ii", $approval, $commentId);
    
        if ($stmtUpdate->execute()) {
            header("Location: ../admin/viewreviews.php");
            $_SESSION['status']=['success','Status Updated!','',false,true];
        } else {
            header("Location: ../admin/viewreviews.php");
            $_SESSION['status']=['error','Something went wrong','',false,true];
        }
    
        $stmtUpdate->close();
    }else{
  $userId = $_SESSION['user_id'];
  $novelId = $_POST['novelId'];
  $commentText = $_POST['commentText'];
  $stmtInsert = $conn->prepare("INSERT INTO comments (user_id, novel_id, comment_text, comment_date) VALUES (?, ?, ?, NOW())");

  if ($stmtInsert) {
      $stmtInsert->bind_param("iis", $userId, $novelId, $commentText);
      $stmtInsert->execute();

      if ($stmtInsert->affected_rows > 0) {
          $status = "true";
      } else {
          $status = "false";
      }

      $stmtInsert->close();
      echo $status;
  } else {
      $status = "false";
      echo $status;
  }
    }
}
?>
