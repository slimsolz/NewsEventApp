<?php
  require_once '../../../includes/config.php';
  require_once '../../../includes/functions.php';
  require_once '../../../includes/database.php';
  require_once '../../../includes/menu.php';
  require_once '../../../includes/session.php';
  require_once './layouts/header.php';

  $message = "";

	if (!$session->isLoggedIn()) {
		redirectTo("../index.php");
  }

  $id = $_GET['id'];
	$menu = new Menu();

  $foundMenu = Menu::findById($id);
  $oldTitle = $foundMenu->title;
	$oldCategory = $foundMenu->category;
  $oldPrice =  $foundMenu->price;
  $oldDescription =  $foundMenu->description;

  if (isset($_POST['submit'])) {
    $menu->id = $id;
    if (isset($_POST['title'])) {
      $menu->title = $title = trim($_POST['title']);
    }
    if (isset($_POST['description'])) {
      $menu->description = $description = $_POST['description'];
    }
    $menu->category = $category = trim($_POST['category']);
    $menu->price = $price = $_POST['price'];
    $menu->display_status = $display_status = $_POST['display_status'];

    if (empty($message)) {
			if ($menu->save()) {
        $oldTitle = '';
        $oldPrice =  '';
        $oldDescription = '';
        $message = 'Successfully Updated';
			}else {
        $message = 'Couldnt update ... please try again';
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
          <h5 class="card-title">Edit Menu</h5>
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
                  <label for="category">Category</label>
                  <select type="text" class="form-control" name="category" id="category" required>
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
                  <input type="text" class="form-control" name="price" id="price" required <?php echo "value = \"{$oldPrice}\"" ?>>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" id="description" required <?php echo "value = \"{$oldDescription}\"" ?>>
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
                <input type="submit" name="submit" id="submit" value="UPDATE MENU" class="btn btn-primary btn-round" >
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
