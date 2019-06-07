<?php
  require_once '../../../includes/config.php';
  require_once '../../../includes/functions.php';
  require_once '../../../includes/database.php';
  require_once '../../../includes/menu.php';
  require_once '../../../includes/session.php';
  require_once './layouts/header.php';

  /*check if user is already logged in*/
  $message = "";

	if (!$session->isLoggedIn()) {
		redirectTo("../index.php");
  }

  $menu = new Menu();

  if (isset($_POST['submit'])) {
    if (isset($_POST['title'])) {
      $menu->title = $title = trim($_POST['title']);
    }
    if (isset($_POST['category'])) {
      $menu->category = $category = trim($_POST['category']);
    }
    if (isset($_POST['price'])) {
      $menu->price = $price = $_POST['price'];
    }
    if (isset($_POST['description'])) {
      $menu->description = $description = $_POST['description'];
    }
    if (isset($_POST['display_status'])) {
      $menu->display_status = $display_status = $_POST['display_status'];
    }

    if (empty($message)) {
      if ($menu->save()) {
          $message = 'Successful';
      } else {
          $message = 'Couldnt save ... please try again';
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
          <h5 class="card-title">New Menu</h5>
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
                  <label for="category">Category</label>
                  <select type="text" class="form-control" name="category" id="category" required >
                    <option disabled selected>Select A Category</option>
                    <option value="starters">Starters</option>
                    <option value="drinks">Drinks</option>
                    <option value="sandwiches">Sandwiches</option>
                    <option value="salads">Salads</option>
                    <option value="entrees">Entrees</option>
                    <option value="desserts">Desserts</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" name="price" id="price" required placeholder="0.00">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" id="description" required placeholder="Description">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="display_status" required>Display Status</label>
                  <select class="form-control" name="display_status" id="display_status">
                    <option name="display_status" disabled selected>--- Select one ---</option>
                    <option name="display_status" value="0">False</option>
                    <option name="display_status" value="1">True</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <input type="submit" name="submit" id="submit" value="ADD MENU" class="btn btn-primary btn-round" >
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
