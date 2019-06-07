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

  $result = Menu::findAll();
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
            <h4 class="card-title">Menus</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" style="text-align: center">
                <thead class=" text-primary">
                  <th>Title</th>
                  <th>Category</th>
                  <th>Price(&#x24;)</th>
                  <th>Description</th>
                  <th>Display Status</th>
                  <th colspan="2">Actions</th>
                </thead>
                <tbody>
                  <?php
                    foreach ($result as $menu) {
                      echo "<tr>";
                      echo "<td>". $menu->title ."</td>";
                      echo "<td>". $menu->category ."</td>";
                      echo "<td>". $menu->price ."</td>";
                      echo "<td>". $menu->description ."</td>";
                      echo "<td>". $menu->display_status ."</td>";
                      echo '<td><a href ="editMenu.php?subject='. urlencode("Edit Menu").'&id='. $menu->id .'">Edit</a></td>';
                      echo '<td><a href ="deleteMenu.php?subject='. urlencode("Delete Menu").'&id='. $menu->id .'">Delete</a></td>';
                      echo "</tr>";
                    }
                  ?>
                </tbody>
              </table>
              <?php
                echo '<a href="addMenu.php">
                  <i class="nc-icon nc-simple-add"></i> Add Menu
                  </a>';
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php require_once './layouts/footer.php'; ?>