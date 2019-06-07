<?php
  require_once '../../../includes/config.php';
  require_once '../../../includes/functions.php';
  require_once '../../../includes/database.php';
  require_once '../../../includes/news.php';
  require_once '../../../includes/session.php';

/*check if user is already logged in*/
	$message = "";

  if (!$session->isLoggedIn()) {
		redirectTo('../index.php');
	}

	$id = $_GET['id'];
	$news = new News();

	$foundNew = News::findById($id);

	if (isset($_POST['yes'])) {
		$news->id = $id;
		if ($news->delete()) {
      $message = 'Successfully Deleted';
      redirectTo("manageNews.php");
		}else{
      $message = 'Couldnt delete ... please try again';
      redirectTo("manageNews.php");
		}
	}else if (isset($_POST['no'])) {
		redirectTo("manageNews.php");
  }
?>

<?php require_once './layouts/header.php'; ?>
<div class="main-panel">
  <!-- Navbar -->
  <?php require_once './layouts/navbar.php';?>
  <!-- End Navbar -->
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Delete News</h4>
          </div>
          <div class="card-body">
            <p class="well ">Are You Sure You Want To Delete This????</p>
            <form method="post" >
              <div class="btn-group">
                <button class="btn btn-success" name="yes"><i class="nc-icon nc-check-2"></i>&nbsp; YES</button> &nbsp; &nbsp; &nbsp;
                <button class="btn btn-danger" name="no"><i class="nc-icon nc-simple-remove"></i>&nbsp; NO</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php require_once './layouts/footer.php'; ?>
