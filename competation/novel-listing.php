<?php require_once './modules/conn.php';
require_once './modules/userActivity.php';
$query = "SELECT COUNT(*) AS total_rows FROM novels";

$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalRows = $row['total_rows'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="BookStore HTML5 Template" />

  <title>Novels Nest - Find your favorite Novels</title>
  <?php require_once './components/head.php' ?>
</head>

<body>
  <!-- Preloader-->
  <div id="preloader">
    <div class="loader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- Back To Top Start -->
  <a href="#main-wrapper" id="backto-top" class="back-to-top"><i class="fas fa-angle-up"></i></a>
  <!-- Main Wrapper Start -->
  <div id="main-wrapper" class="main-wrapper overflow-hidden">
    <?php require_once './components/header.php' ?>
    <!-- Banner-3 Start -->
    <div class="hero-banner-3 bg-lightest-gray">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
            <div class="text-block">
              <h1 class="mb-12">Novels</h1>
              <p class="dark-gray">Novels are windows to worlds unseen, where imagination dances with words, and every page is an invitation to explore the boundless realms of human experience.</p>
            </div>
          </div>
          <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12">
            <div class="images-row">
              <img src="assets/media/banner/banner2-2.png" class="blog-img" alt="">
              <img src="assets/media/banner/banner2-3.png" class="blog-img big" alt="">
              <img src="assets/media/banner/banner2-1.png" class="blog-img" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner-3 End-->


    <!-- Main Content Start -->
    <div class="page-content">
      <section>
        <div class="container">
          <div class="row">
            <div class="top-row p-40">
              <div class="col-sm-6">
                <div class="left-block">
                  <h6 class="dark-gray">Showing 1-9 of <?php echo $totalRows?> results</h6>
                  <a href="#" id="showAllLink" class="color-primary fs-6">Show All</a>
                </div>
              </div>
           
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3">
              <div class="sidebar">
                <div class="sidebar mb-48">
                  <div class="sidebar-block">
                    <div class="filters">
                      <form>
                        <div class="filter-block">
                          <h4 class="mb-24">Filter</h4>
                          <div class="form-group has-search">
                            <input type="text" class="form-control" placeholder="Find the books..." id="searchInput">
                            <button type="submit" class="b-unstyle"><i class="fal fa-search" onclick="filterNovels()"></i></button>
                          </div>
                        </div>
                        <hr>
                        <hr>
                        <div class="filter-block">
                          <div class="title mb-32">
                            <h5>Novel Genres</h5>
                            <i class="far fa-horizontal-rule"></i>
                          </div>
                          <?php
$queryTopGenres = "SELECT genres.name, COUNT(novels.genre_id) as novel_count
                   FROM genres
                   LEFT JOIN novels ON genres.genre_id = novels.genre_id
                   GROUP BY genres.genre_id
                   ORDER BY novel_count DESC
                   LIMIT 2";

$resultTopGenres = mysqli_query($conn, $queryTopGenres);

if ($resultTopGenres) {
    echo '<ul class="unstyled list">';
    while ($row = mysqli_fetch_assoc($resultTopGenres)) {
        echo '<li class="mb-16">';
        echo '<div class="filter-checkbox">';
        echo '<input type="radio" name="genre" class="genre-checkbox" id="' . $row['name'] . '" data-genre="' . $row['name'] . '">';
        echo '<label for="' . $row['name'] . '">' . $row['name'] . '</label>';
        echo '</div>';
        echo '<h6 class="dark-gray">(' . $row['novel_count'] . ')</h6>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo 'Error executing the top genres query: ' . mysqli_error($conn);
}

$queryRestGenres = "SELECT genres.name, COUNT(novels.genre_id) as novel_count
                    FROM genres
                    LEFT JOIN novels ON genres.genre_id = novels.genre_id
                    GROUP BY genres.genre_id
                    ORDER BY novel_count DESC
                    LIMIT 2, 100"; // Skip the top 2 and fetch the next 100

$resultRestGenres = mysqli_query($conn, $queryRestGenres);
if ($resultRestGenres) {
    echo '<ul id="more-categories" class="accordion-collapse collapse unstyled list" data-bs-parent="#accordionExample">';
    while ($row = mysqli_fetch_assoc($resultRestGenres)) {
        echo '<li class="mb-16">';
        echo '<div class="filter-checkbox">';
        echo '<input type="radio" name="genre" id="' . $row['name'] . '">';
        echo '<label for="' . $row['name'] . '">' . $row['name'] . '</label>';
        echo '</div>';
        echo '<h6 class="dark-gray">(' . $row['novel_count'] . ')</h6>';
        echo '</li>';
    }
    echo '</ul>';
    echo '<a href="#" class="accordion-button load-more-btn" data-bs-toggle="collapse" data-bs-target="#more-categories" aria-expanded="true"> Show More</a>';
} else {
    echo 'Error executing the rest genres query';
}
?>

                        </div>
                        <hr>
                        <div class="filter-block">
                          <div class="title mb-32">
                            <h5>Authors</h5>
                            <i class="far fa-horizontal-rule"></i>
                          </div>
                          <?php
$queryTopAuthors = "SELECT authors.name, COUNT(novels.author_id) as novel_count
                    FROM authors
                    LEFT JOIN novels ON authors.author_id = novels.author_id
                    GROUP BY authors.author_id
                    ORDER BY novel_count DESC
                    LIMIT 2";

$resultTopAuthors = mysqli_query($conn, $queryTopAuthors);

if ($resultTopAuthors) {
    echo '<ul class="unstyled list">';
    while ($row = mysqli_fetch_assoc($resultTopAuthors)) {
        echo '<li class="mb-16">';
        echo '<div class="filter-checkbox">';
        echo '<input type="radio" class="author-checkbox" data-author="' . $row['name'] . '" id="' . $row['name'] . '">';
        echo '<label for="' . $row['name'] . '">' . $row['name'] . '</label>';
        echo '</div>';
        echo '<h6 class="dark-gray">(' . $row['novel_count'] . ')</h6>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo 'Error executing the top authors query: ' . mysqli_error($conn);
}

$queryRestAuthors = "SELECT authors.name, COUNT(novels.author_id) as novel_count
                     FROM authors
                     LEFT JOIN novels ON authors.author_id = novels.author_id
                     GROUP BY authors.author_id
                     ORDER BY novel_count DESC
                     LIMIT 2, 100"; // Skip the top 2 and fetch the next 100

$resultRestAuthors = mysqli_query($conn, $queryRestAuthors);

if ($resultRestAuthors) {
    echo '<ul id="more-authors" class="accordion-collapse collapse unstyled list" data-bs-parent="#accordionExample">';
    while ($row = mysqli_fetch_assoc($resultRestAuthors)) {
        echo '<li class="mb-16">';
        echo '<div class="filter-checkbox">';
        echo '<input type="radio" class="author-checkbox" data-author="' . $row['name'] . '" id="' . $row['name'] . '">';
        echo '<label for="' . $row['name'] . '">' . $row['name'] . '</label>';
        echo '</div>';
        echo '<h6 class="dark-gray">(' . $row['novel_count'] . ')</h6>';
        echo '</li>';
    }
    echo '</ul>';
    echo '<a href="#" class="accordion-button load-more-btn" data-bs-toggle="collapse" data-bs-target="#more-authors" aria-expanded="true"> Show More</a>';
} else {
    echo 'Error executing the rest authors query';
}
?>

                        </div>
                        <hr>
                        <button type="reset" id="restBtn" class="b-unstyle cus-btn w-100 mt-2" name="reset">
                          <span class="icon"><img src="assets/media/icons/click-button.png" alt=""></span>Reset
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-9">
              <div class="row" id="filteredNovelsContainer">
                
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- Main Content End -->
    <!-- Footer Start -->
    <?php require './components/footer.php'?>
    <!-- Footer Area End  -->
  </div>
  <?php require './components/script.php' ?>
  <?php require './modules/errorAlert.php';require_once './modules/adminActivity.php';?>
  <script>
$(document).ready(function () {
    // Attach click event to "Show All" link
    $('#showAllLink').on('click', function (e) {
        e.preventDefault();

        // Trigger the server-side script with the 'showAll' parameter
        updateFilteredNovels(true);
    });

    // Attach input event to search input
    $('#searchInput').on('input', function () {
        updateFilteredNovels();
    });

    // Attach click event to genre checkboxes
    $('.genre-checkbox').on('click', function () {
        updateFilteredNovels();
    });

    // Attach click event to author checkboxes
    $('.author-checkbox').on('click', function () {
        updateFilteredNovels();
    });

    $('#restBtn').on('click', function () {
        updateFilteredNovels();
    });

    // Initialize filtered novels on page load
    updateFilteredNovels();

    function updateFilteredNovels(showAll = false) {
        // Collect selected genres and authors
        var selectedGenres = $('.genre-checkbox:checked').map(function () {
            return $(this).data('genre');
        }).get();

        var selectedAuthors = $('.author-checkbox:checked').map(function () {
            return $(this).data('author');
        }).get();

        // Get the search query
        var searchQuery = $('#searchInput').val();

        // Send AJAX request to the server
        $.ajax({
            type: 'POST',
            url: './modules/novelSearcher.php', // Replace with the actual PHP handler file
            data: {
                action: 'filterNovels',
                genres: selectedGenres,
                authors: selectedAuthors,
                searchQuery: searchQuery,
                showAll: showAll ? 'true' : ''
            },
            success: function (response) {
                // Update the container with filtered novels
                $('#filteredNovelsContainer').html(response);
                console.log(response)
            }
        });
    }
});


  </script>
</body>

</html>