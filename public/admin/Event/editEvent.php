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

  $id = $_GET['id'];
	$event = new Event();

	$foundEvent = Event::findById($id);
	$oldTitle = $foundEvent->title;
  $oldLocation =  $foundEvent->location;
  $oldDescription =  $foundEvent->description;

  if (isset($_POST['submit'])) {
    $event->id = $id;
    $event->title = $title = trim($_POST['title']);
    $event->location = $location = $_POST['location'];
    $event->description = $description = $_POST['description'];
    $event->display_status = $display_status = $_POST['display_status'];

    if (empty($message)) {
			if ($event->save()) {
        $oldTitle = '' ;
        $oldLocation =  '';
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
          <h5 class="card-title">Edit Event</h5>
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
                  <label for="location">Location</label>
                  <input type="text" class="form-control" name="location" id="location" required <?php echo "value = \"{$oldLocation}\"" ?>>
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
                <input type="submit" name="submit" id="submit" value="UPDATE EVENT" class="btn btn-primary btn-round" >
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
