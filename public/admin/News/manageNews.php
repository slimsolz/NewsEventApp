<?php
  require_once '../../../includes/config.php';
  require_once '../../../includes/functions.php';
  require_once '../../../includes/database.php';
  require_once '../../../includes/news.php';
  require_once '../../../includes/session.php';
  require_once './layouts/header.php';

  /*check if user is already logged in*/
  $message = "";

  if (!$session->isLoggedIn()) {
    redirectTo('../index.php');
  }

  $result = News::findAll();

?>
<div class="main-panel">
  <!-- Navbar -->
  <?php require_once './layouts/navbar.php';?>
  <!-- End Navbar -->
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">News</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" style="text-align: center">
                <thead class=" text-primary">
                  <th>Title</th>
                  <th>Story Content</th>
                  <th>Publish Date</th>
                  <th colspan="2">Actions</th>
                </thead>
                <tbody>
                  <?php
                    foreach ($result as $news) {
                      echo "<tr>";
                      echo "<td>". $news->title ."</td>";
                      echo "<td>". substr($news->story_content, 0, 40) ."... </td>";
                      echo "<td>". $news->publish_date ."</td>";
                      echo '<td><a href ="editNews.php?subject='. urlencode("Edit News").'&id='. $news->id .'">Edit</a></td>';
                      echo '<td><a href ="deleteNews.php?subject='. urlencode("Delete News").'&id='. $news->id .'">Delete</a></td>';
                      echo "</tr>";
                    }
                  ?>
                </tbody>
              </table>
              <?php
                echo '<a href="addNews.php">
                  <i class="nc-icon nc-simple-add"></i> Add News
                  </a>';
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php require_once './layouts/footer.php'; ?>
