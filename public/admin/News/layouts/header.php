<?php require_once '../../../includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" href="../../assets/img/core-img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    News-Event Management System
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../../assets/img/logo-small.png">
          </div>
        </a>
        <a href=# class="simple-text logo-normal">
          <?php echo $_SESSION['user']; ?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="../Admin/manageAdmin.php">
            <i class="nc-icon nc-single-02"></i>
            <p>Admins</p>
            </a>
          </li>
          <li>
            <a href="manageNews.php">
            <i class="nc-icon nc-tile-56"></i>
              <p>Manage News</p>
            </a>
          </li>
          <li>
            <a href="../Menu/manageMenu.php">
            <i class="nc-icon nc-tile-56"></i>
              <p>Manage Menu</p>
            </a>
          </li>
          <li>
            <a href="../Event/manageEvents.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Manage Events</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
