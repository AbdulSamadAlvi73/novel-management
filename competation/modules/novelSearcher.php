<?php
// ajax_handler.php
require_once 'conn.php';
session_start();

// Collect selected genres and authors from AJAX request
$selectedGenres = isset($_POST['genres']) ? $_POST['genres'] : [];
$selectedAuthors = isset($_POST['authors']) ? $_POST['authors'] : [];
$searchQuery = isset($_POST['searchQuery']) ? $_POST['searchQuery'] : '';
$showAll = isset($_POST['showAll']) ? $_POST['showAll'] : '';
// Build the SQL query based on selected filters and search query
$query = "
    SELECT
        n.novel_id,
        n.title,
        n.publication_date,
        n.banner,
        n.description,
        n.file,
        a.name AS author_name,
        a.biography AS author_biography,
        g.name AS genre_name
    FROM
        novels n
    JOIN
        authors a ON n.author_id = a.author_id
    JOIN
        genres g ON n.genre_id = g.genre_id
    WHERE
        1 = 1"; // Always true, used as a starting point for the WHERE clause

// Add conditions for selected genre and author
if (!empty($selectedGenres)) {
    $query .= " AND g.name IN ('" . implode("','", $selectedGenres) . "')";
}

if (!empty($selectedAuthors)) {
    $query .= " AND a.name IN ('" . implode("','", $selectedAuthors) . "')";
}

// Add condition for search query
if (!empty($searchQuery)) {
    $query .= " AND n.title LIKE '%" . $conn->real_escape_string($searchQuery) . "%'";
}
$a=1;
if($showAll){
    $a='';
}

if (!empty($a)) {
    $query .= " LIMIT 9";
}

// Execute the query
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    // Output HTML for filtered novels
    while ($row = $result->fetch_assoc()) {
        // Output HTML for each novel card
        echo '<div class="col-lg-4 col-md-6 col-sm-6">';
        echo '<div class="book-card mb-24">';
        echo '<a href="novel-detail.php?id='.$row['novel_id'].'" class="w-100" style="aspect-ratio:2/3; object-fit:cover;"><img src="' . $row['banner'] . '" alt="" style="width:100%; aspect-ratio:2/3; object-fit:cover;"></a>';
        echo '<div class="">';
        echo '<ul class="unstyled hover-buttons">';
        if (isset($_SESSION['user_id'])) {
            $stmtCheck = $conn->prepare("SELECT COUNT(*) FROM bookmarks WHERE user_id = ? AND novel_id = ?");
            $stmtCheck->bind_param("ii", $_SESSION['user_id'], $row['novel_id']);
            $stmtCheck->execute();
            $stmtCheck->bind_result($bookmarkCount);
            $stmtCheck->fetch();
            $stmtCheck->close();
            if ($bookmarkCount > 0) {
echo '<li>
  <a title="bookmark this" onclick="bookmark(this,event, \'POST\', \'bookmarked\', \'./modules/bookmark.php\', ' . $row['novel_id'] . ')" href="javascript:void(0)">
      <i class="fa fa-bookmark color-primary"></i>
  </a>
</li>';
}else{
echo '<li>
<a title="bookmark this" onclick="bookmark(this,event, \'POST\', \'bookmarked\', \'./modules/bookmark.php\', ' . $row['novel_id'] . ')" href="javascript:void(0)">
<i class="fal fa-bookmark"></i>
</a>
</li>';
}}else{
echo '<li>
  <a title="Login First" href="./login.php">
      <i class="fal fa-bookmark"></i>
  </a>
</li>';
}
        echo '<li><a href=""novel-detail.php?id='.$row['novel_id'].'""><i class="fal fa-eye"></i></a></li>';
        echo '</ul>';
        echo '</div>';
        echo '<div class="book-content">';
        echo '<h5 class="mt-24"><a href="novel-detail.php?id='.$row['novel_id'].'">' . $row['title'] . '</a></h5>';
        echo '<h6 class="dark auther">' . $row['author_name'] . '</h6>';
        echo '<hr>';
        echo '<h6 class="dark-gray genre">' . $row['genre_name'] . '</h6>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    // Handle the case where the query fails
    echo 'Error executing the query: ' . $conn->error;
}

// Close the database connection
$conn->close();
?>
