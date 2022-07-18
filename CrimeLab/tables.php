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
        <li class="active"><a href="tables.php"> <i class="icon-grid"></i>Police Officers </a></li>
        <!-- Note: Open by default when active is better but is yet to be achieved. -->
        <li><a href="#ModelViewer" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>3D Model
          </a>
          <ul id="ModelViewer" class="collapse list-unstyled ">
            <li><a href="crimeScene.php">Crime Scene</a></li>
            <li><a href="autopsy.php">Autopsy</a></li>
          </ul>
        </li>
        <li><a href="#crimeManage" aria-expanded="false" data-toggle="collapse"> <i class="icon-padnote"></i> Crime Management </a>
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
          <h2 class="h5 no-margin-bottom">Police Officers</h2>
        </div>
      </div>
      <!-- Breadcrumb-->
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item active">Police Officers </li>
        </ul>
      </div>
      <section class="no-padding-top">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-12">
              <div class="block">
                <div class="title"><strong>Police Officer Information</strong></div>
                <div class="block-body">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <input type="text" id="firstName" onkeyup="myFunction()" placeholder="Search for First Name" class="form-control">
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="block">
                        <div class="table-responsive">

                          <?php
                          $connection = mysqli_connect("localhost", "root", "");
                          $db = mysqli_select_db($connection, 'crimelab');

                          $query = "SELECT * FROM register";
                          $query_run = mysqli_query($connection, $query);
                          ?>
                          <table class="table table-striped table-sm" id="register">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Middle Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Badge No.</th>
                                <th scope="col">Address</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Birthday</th>
                              </tr>
                            </thead>
                            <?php
                            if ($query_run) {
                              foreach ($query_run as $row) {
                            ?>
                                <tbody>
                                  <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['firstName']; ?></td>
                                    <td><?php echo $row['middleName']; ?></td>
                                    <td><?php echo $row['lastName']; ?></td>
                                    <td><?php echo $row['position']; ?></td>
                                    <td><?php echo $row['badgeNo']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['birthDate']; ?></td>
                                  </tr>
                                </tbody>
                            <?php
                              }
                            } else {
                              echo "No Record Found";
                            }

                            ?>
                          </table>
                          <script>
                            function myFunction() {
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementById("firstName");
                              filter = input.value.toUpperCase();
                              var secondCol = tds[1].textContent.toUpperCase();
                              table = document.getElementById("register");
                              tr = table.getElementsByTagName("tr");
                              for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[1];
                                if (td) {
                                  txtValue = td.textContent || td.innerText;
                                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                  } else {
                                    tr[i].style.display = "none";
                                  }
                                }
                              }
                            }
                          </script>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
      </section>
      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
      <script src="vendor/chart.js/Chart.min.js"></script>
      <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
      <script src="js/front.js"></script>
</body>

</html>