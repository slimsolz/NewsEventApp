<?php
  require_once '../../../includes/config.php';
  require_once '../../../includes/functions.php';
  require_once '../../../includes/database.php';
  require_once '../../../includes/admin.php';
  require_once '../../../includes/session.php';

/*check if user is already logged in*/
	$message = "";
	if (!$session->isLoggedIn()) {
		redirectTo("../index.php");
	}

	$id = $_GET['id'];
	$admin = new Admin();

	$foundNew = Admin::findById($id);

	if (isset($_POST['yes'])) {
		$admin->id = $id;
		if ($admin->delete()) {
      $message = 'Successfully Deleted';
      redirectTo("../logout.php");
		}else{
      $message = 'Couldnt delete ... please try again';
      redirectTo("manageAdmin.php");
		}
	}else if (isset($_POST['no'])) {
		redirectTo("manageAdmin.php");
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
            <h4 class="card-title">Delete Admin</h4>
          </div>
          <div class="card-body">
            <p class="h3 ">Are You Sure You Want To Delete You Account? This action can not be undone. <br> <span class="bg-danger">You will automatically be logged out.</span></p>
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
