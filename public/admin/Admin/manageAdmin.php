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

  $currentUserId = $_SESSION['adminId'];

  $result = Admin::findAll();
?>
<div class="main-panel">

  <?php require_once './layouts/navbar.php';?>

  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Admins</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" style="text-align: center">
                <thead class=" text-primary">
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th colspan="2">Actions</th>
                </thead>
                <tbody>
                  <?php
                    foreach ($result as $admin) {
                      if ( $currentUserId == $admin->id) {
                        echo "<tr>";
                        echo "<td>". $admin->firstName ."</td>";
                        echo "<td>". $admin->lastName ."</td>";
                        echo "<td>". $admin->email ."</td>";
                        echo '<td><a href ="editAdmin.php?subject='. urlencode("Edit Admin").'&id='. $admin->id .'">Edit</a></td>';
                        echo '<td><a href ="deleteAdmin.php?subject='. urlencode("Delete Admin").'&id='. $admin->id .'">Delete</a></td>';
                        echo "</tr>";
                      } else {
                        echo "<tr>";
                        echo "<td>". $admin->firstName ."</td>";
                        echo "<td>". $admin->lastName ."</td>";
                        echo "<td>". $admin->email ."</td>";
                        echo '<td><a class="disable" href ="editAdmin.php?subject='. urlencode("Edit Admin").'&id='. $admin->id .'">Edit</a></td>';
                        echo '<td><a class="disable" href ="deleteAdmin.php?subject='. urlencode("Delete Admin").'&id='. $admin->id .'">Delete</a></td>';
                        echo "</tr>";
                      }
                    }
                  ?>
                </tbody>
              </table>
              <?php
                echo '<a href="addAdmin.php">
                  <i class="nc-icon nc-simple-add"></i> Add Admin
                  </a>';
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php require_once './layouts/footer.php'; ?>
