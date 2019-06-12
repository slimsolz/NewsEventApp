<?php
  require_once '../../../includes/config.php';
  require_once '../../../includes/functions.php';
  require_once '../../../includes/database.php';
  require_once '../../../includes/menu.php';
  require_once '../../../includes/session.php';

	$message = "";
	if (!$session->isLoggedIn()) {
		redirectTo("../index.php");
	}

	$id = $_GET['id'];
	$menu = new Menu();

	$foundNew = Menu::findById($id);

	if (isset($_POST['yes'])) {
		$menu->id = $id;
		if ($menu->delete()) {
      $message = 'Successfully Deleted';
      redirectTo("manageMenu.php");
		}else{
      $message = 'Couldnt delete ... please try again';
      redirectTo("manageMenu.php");
		}
	}else if (isset($_POST['no'])) {
		redirectTo("manageMenu.php");
  }
?>

<?php require_once './layouts/header.php'; ?>
<div class="main-panel">

  <?php require_once './layouts/navbar.php';?>

  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Delete Menu</h4>
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
