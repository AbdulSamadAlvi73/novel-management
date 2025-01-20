  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-book"></i><span>Novels</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./viewnovels.php">
              <i class="bi bi-circle"></i><span>View Novels</span>
            </a>
          </li>
          <li>
            <a href="./addnovel.php">
              <i class="bi bi-circle"></i><span>Add Novels</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#resource-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person"></i><span>Authors</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="resource-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./viewauthor.php">
              <i class="bi bi-circle"></i><span>View Authors</span>
            </a>
          </li>
          <li>
            <a href="./addauthor.php">
              <i class="bi bi-circle"></i><span>Add Author</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Genre-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-award"></i><span>Genre</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Genre-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./viewgenres.php">
              <i class="bi bi-circle"></i><span>View Genres</span>
            </a>
          </li>
          <li>
            <a href="./addgenre.php">
              <i class="bi bi-circle"></i><span>Add Genre</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#reviews-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-chat-quote"></i><span>Reviews</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="reviews-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="./viewreviews.php">
              <i class="bi bi-circle"></i><span>View Reviews</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->