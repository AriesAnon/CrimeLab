<?php
session_start();
$id = $_SESSION['id'];
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
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <!-- Custom Font Icons CSS-->
  <link rel="stylesheet" href="css/font.css">
  <!-- Google fonts - Muli-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default_admin.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
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
          <!-- Navbar Header--><a href="home_admin.php" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">crimelab</strong><strong>Admin</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">CL</strong><strong>A</strong></div>
          </a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">
          <div class="list-inline-item logout"> <a id="logout" href="index.php" class="nav-link"> <span class="d-none d-sm-inline">Logout </span><i class="icon-logout"></i></a></div>
        </div>
      </div>
    </nav>
  </header>
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="images/admin_pfp.png" alt="..." class="img-fluid rounded-circle"></div>
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
        <li class="active"><a href="home_admin.php"> <i class="icon-home"></i>Home </a></li>
        <li><a href="tables_admin.php"> <i class="icon-grid"></i>Police Officers </a></li>
        <!-- Note: Open by default when active is better but is yet to be achieved. -->
        <li><a href="#ModelViewer" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>3D Model
          </a>
          <ul id="ModelViewer" class="collapse list-unstyled ">
            <li><a href="crimeScene_admin.php">Crime Scene</a></li>
            <li><a href="autopsy_admin.php">Autopsy</a></li>
          </ul>
        </li>
        <li><a href="#crimeManage" aria-expanded="false" data-toggle="collapse"> <i class="icon-home"></i> Crime Management </a>
          <ul id="crimeManage" class="collapse list-unstyled ">
            <li><a href="crime_admin.php">Crime</a></li>
            <li><a href="witness_admin.php">Witness</a></li>
            <li><a href="evidence_admin.php">Evidence</a></li>
          </ul>
        </li>
        <li><a href="registration.php"> <i class="icon-logout"></i>Register Users</a></li>
    </nav>
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
      </div>
      <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-user-1"></i></div><strong>Ongoing Cases</strong>
                  </div>
                  <?php
                  $connection = mysqli_connect("localhost", "root", "");
                  $db = mysqli_select_db($connection, 'crimelab');
                  $status = "open";
                  $query = "SELECT count(*) as total FROM crime WHERE status='$status'";
                  $query_run = mysqli_query($connection, $query);
                  $open_cases = mysqli_fetch_assoc($query_run);
                  ?>
                  <div class="number dashtext-1"><?php echo $open_cases['total']; ?></div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-contract"></i></div><strong>Pending Cases</strong>
                  </div>
                  <?php
                  $connection = mysqli_connect("localhost", "root", "");
                  $db = mysqli_select_db($connection, 'crimelab');
                  $status = "pending";
                  $query = "SELECT count(*) as total FROM crime WHERE status='$status'";
                  $query_run = mysqli_query($connection, $query);
                  $pending_cases = mysqli_fetch_assoc($query_run);
                  ?>
                  <div class="number dashtext-2"><?php echo $pending_cases['total']; ?></div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Solved Cases</strong>
                  </div>
                  <?php
                  $connection = mysqli_connect("localhost", "root", "");
                  $db = mysqli_select_db($connection, 'crimelab');
                  $status = "closed";
                  $query = "SELECT count(*) as total FROM crime WHERE status='$status'";
                  $query_run = mysqli_query($connection, $query);
                  $solved_cases = mysqli_fetch_assoc($query_run);
                  ?>
                  <div class="number dashtext-3"><?php echo $solved_cases['total']; ?></div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>All Cases</strong>
                  </div>
                  <?php
                  $connection = mysqli_connect("localhost", "root", "");
                  $db = mysqli_select_db($connection, 'crimelab');
                  $status = "open";
                  $query = "SELECT count(*) as total FROM crime";
                  $query_run = mysqli_query($connection, $query);
                  $total_cases = mysqli_fetch_assoc($query_run);
                  ?>
                  <div class="number dashtext-4"><?php echo $total_cases['total']; ?></div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
      $db = mysqli_connect('localhost', 'root', '', 'crimelab');
      $results = mysqli_query($db, "SELECT * FROM crime WHERE NOT status ='Closed'");
      ?>
      <section class="no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <hr size="2" width="90%" color="#8a8d93">
              <div class="title"></br>
                <h2><strong>Active and Pending Cases</strong></h2></br>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-sm" id="crime">
                  <thead>
                    <tr>
                      <th scope="col">CRIME ID</th>
                      <th scope="col">OFFICER ID</th>
                      <th scope="col">CRIME CATEGORY</th>
                      <th scope="col">RESIDENTIAL</th>
                      <th scope="col">DESCRIPTION</th>
                      <th scope="col">LOCATION</th>
                      <th scope="col">STATUS</th>
                      <th scope="col">DATE REPORTED</th>
                    </tr>
                  </thead>
                  <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['crimeId']; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['crimeCategory']; ?></td>
                        <td><?php echo $row['residential']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['dateReported']; ?></td>
                      </tr>
                    </tbody>

                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
  <!-- JavaScript files-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="js/charts-home.js"></script>
  <script src="js/front.js"></script>
</body>

</html>