<?php
  require_once '../../../includes/config.php';
  require_once '../../../includes/functions.php';
  require_once '../../../includes/database.php';
  require_once '../../../includes/admin.php';
  require_once '../../../includes/session.php';
  require_once './layouts/header.php';

  $message = "";

	if (!$session->isLoggedIn()) {
		redirectTo("../index.php");
  }

  $id = $_GET['id'];
	$admin = new Admin();

	$foundAdmin = Admin::findById($id);
  $oldEmail = $foundAdmin->email;
  $oldFirstName =  $foundAdmin->firstName;
  $oldLastName = $foundAdmin->lastName;
  $oldPassword = $foundAdmin->password;

  if (isset($_POST['submit'])) {
    $admin->id = $id;
    $admin->email = $oldEmail;
    if (isset($_POST['firstName'])) {
      $admin->firstName = $firstName = trim($_POST['firstName']);
    }
    if (isset($_POST['lastName'])) {
      $admin->lastName = $lastName = trim($_POST['lastName']);
    }
    if ($_POST['password'] === $_POST['password2']) {
      $admin->password = $password = $_POST['password'];
    } else {
      $message = 'Passwords don\'t match';
    }


    if (empty($message)) {
			if ($admin->save()) {
        $oldEmail = '';
        $oldFirstName = '';
        $oldLastName = '';
        $oldPassword = '';

        $message = 'Successfully Updated';
			} else {
        $message = 'Couldn\'t update ... please try again';
      }
    }
  }
?>

<div class="main-panel">

<?php require_once './layouts/navbar.php';?>

<div class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card card-user">
        <div class="card-header">
          <h5 class="card-title">Update Admin</h5>
        </div>
        <div class="card-body">
          <form role="form" method="post" action="">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email">email</label>
                  <input type="email" class="form-control" name="email" id="email" disabled required <?php echo "value = \"{$oldEmail}\"" ?>>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input type="text" class="form-control" name="firstName" id="firstName" required <?php echo "value = \"{$oldFirstName}\"" ?>>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control" name="lastName" id="lastName" required <?php echo "value = \"{$oldLastName}\"" ?>>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" required <?php echo "value = \"{$oldPassword}\"" ?>>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="password2">Re-Enter Password</label>
                  <input type="password" class="form-control" name="password2" id="password2" required <?php echo "value = \"{$oldPassword}\"" ?>>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <input type="submit" name="submit" id="submit" value="UPDATE ADMIN" class="btn btn-primary btn-round" >
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
