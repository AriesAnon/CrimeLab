<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRIMELAB SYSTEM</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Babylon -->
  <script src="https://cdn.babylonjs.com/babylon.max.js"></script>
  <script src="https://preview.babylonjs.com/viewer/babylon.viewer.js"></script>
  <script src="https://github.com/BabylonJS/Babylon.js/blob/master/Viewer/src/configuration/types/default.ts"></script>
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <!-- Custom Font Icons CSS-->
  <link rel="stylesheet" href="css/font.css">
  <!-- Google fonts - Muli-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <!-- Note: This is not working. Find out why. -->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="home.php" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">crime</strong><strong>lab</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">C</strong><strong>L</strong></div>
          </a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">
          <!-- Log out               -->
          <div class="list-inline-item logout"> <a id="logout" href="index.php" class="nav-link"> <span class="d-none d-sm-inline">Logout </span><i class="icon-logout"></i></a></div>
        </div>
      </div>
    </nav>
  </header>
  <!-- PAGE CONTENT STARTS HERE-->
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="images/user_pfp.png" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <?php // for displaying username and position based on the session data
          $user = $_SESSION['user'];
          $position = $_SESSION['position'];
          echo "<h1 class = 'h5'>$user</h1>";
          echo "<p>$position</p>";
          ?>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
        <li><a href="home.php"> <i class="icon-home"></i>Home </a></li>
        <li><a href="tables.php"> <i class="icon-grid"></i>Police Officers </a></li>
        <!-- Note: Open by default when active is better but is yet to be achieved. -->
        <li class="active"><a href="#ModelViewer" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>3D Model </a>
          <ul id="ModelViewer" class="collapse list-unstyled ">
            <li class="active"><a href="crimeScene.php">Crime Scene</a></li>
            <li><a href="autopsy.php">Autopsy</a></li>
          </ul>
        </li>
        <li><a href="#crimeManage" aria-expanded="false" data-toggle="collapse"> <i class="icon-padnote"></i> Crime
            Management </a>
          <ul id="crimeManage" class="collapse list-unstyled ">
            <li><a href="crime.php">Crime</a></li>
            <li><a href="witness.php">Witness</a></li>
            <li><a href="evidence.php">Evidence</a></li>
          </ul>
        </li>
    </nav>
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">3D Model of the Crime Scene</h2>
        </div>
      </div>
      <!-- Breadcrumb-->
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">3D Model </li>
          <li class="breadcrumb-item active">Crime Scene</li>
        </ul>
      </div>
      <!-- 3d Model Container -->
      <section class="no-padding-top">
        <babylon extends="default" templates.viewer.params.enable-drag-and-drop="true">
          <model url="https://models.babylonjs.com/CornellBox/cornellBox.babylon">
          </model>
          <camera>
            <behaviors>
              <auto-rotate type="0"></auto-rotate>
              <framing type="2" zoom-on-bounding-info="true" zoom-stops-animation="false"></framing>
              <!-- enable default bouncing behavior -->
              <bouncing type="1"></bouncing>
            </behaviors>
          </camera>
        </babylon>
      </section>
    </div>
    <!-- Page Content End-->

    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-custom.js"></script>
    <script src="js/front.js"></script>
</body>

</html>