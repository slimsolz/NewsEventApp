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

  $id = $_GET['id'];
	$news = new News();

	$foundNews = News::findById($id);
	$oldTitle = $foundNews->title;
  $oldStoryContent =  $foundNews->story_content;

  if (isset($_POST['submit'])) {
    $news->id = $id;
    $news->title = $title = trim($_POST['title']);
    $news->story_content = $story_content = $_POST['story_content'];

    if (empty($message)) {
			if ($news->save()) {
        $oldTitle = '' ;
        $oldStoryContent = '';
        $message = 'Successfully Updated';
			} else {
        $message = 'Couldn\'t update ... please try again';
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
          <h5 class="card-title">Edit News</h5>
        </div>
        <div class="card-body">
          <form role="form" method="post" action="">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" required <?php echo "value = \"{$oldTitle}\"" ?>>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Story Content</label>
                  <textarea class="form-control textarea"  name="story_content" id="story_content"><?php echo $oldStoryContent ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <input type="submit" name="submit" id="submit" value="UPDATE NEWS" class="btn btn-primary btn-round" >
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
