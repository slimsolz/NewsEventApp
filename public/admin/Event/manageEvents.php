<?php
  require_once '../../../includes/config.php';
  require_once '../../../includes/functions.php';
  require_once '../../../includes/database.php';
  require_once '../../../includes/event.php';
  require_once '../../../includes/session.php';
  require_once './layouts/header.php';

  $message = "";

	if (!$session->isLoggedIn()) {
		redirectTo("../index.php");
  }

  $result = Event::findAll();
?>
<div class="main-panel">

  <?php require_once './layouts/navbar.php';?>

  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Events</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" style="text-align: center">
                <thead class=" text-primary">
                  <th>Title</th>
                  <th>Location</th>
                  <th>Description</th>
                  <th>Display Status</th>
                  <th colspan="2">Actions</th>
                </thead>
                <tbody>
                  <?php
                    foreach ($result as $event) {
                      echo "<tr>";
                      echo "<td>". $event->title ."</td>";
                      echo "<td>". $event->location ."</td>";
                      echo "<td>". $event->description ."</td>";
                      echo "<td>". $event->display_status ."</td>";
                      echo '<td><a href ="editEvent.php?subject='. urlencode("Edit Event").'&id='. $event->id .'">Edit</a></td>';
                      echo '<td><a href ="deleteEvent.php?subject='. urlencode("Delete Event").'&id='. $event->id .'">Delete</a></td>';
                      echo "</tr>";
                    }
                  ?>
                </tbody>
              </table>
              <?php
                echo '<a href="addEvent.php">
                  <i class="nc-icon nc-simple-add"></i> Add Event
                  </a>';
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php require_once './layouts/footer.php'; ?>