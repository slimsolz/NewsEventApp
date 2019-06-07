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

  $news = new News();

  if (isset($_POST['submit'])) {
    if (isset($_POST['title'])) {
      $news->title = $title = trim($_POST['title']);
    }
    if (isset($_POST['story_content'])) {
      $news->story_content = $story_content = $_POST['story_content'];
    }

    if (empty($message)) {
      if ($news->save()) {
        $message = 'Successfully Added';
      } else {
        $message = 'Couldn\'t add ... please try again';
      }
    }
  }
?>

<div class="main-panel">
<!-- Navbar -->
<?php require_once './layouts/navbar.php';?>

<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Add News</h5>
        </div>
        <div class="card-body">
          <form role="form" method="post" action="">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" required placeholder="Title">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Story Content</label>
                  <textarea class="form-control textarea"  name="story_content" id="story_content" placeholder="Story Goes Here...."></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <input type="submit" name="submit" id="submit" value="ADD NEWS" class="btn btn-primary btn-round" >
              </div>
            </div>
          </form>
          <?php echo outputMessage($message); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once './layouts/footer.php'; ?>
