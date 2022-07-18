<?php
session_start();
$id=$_SESSION['id'];

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRIMELAB SYSTEM</title>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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
  <style>
    .gallery img {
      width: 127px;
    }
  </style>
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
        <li><a href="tables.php"> <i class="icon-grid"></i> Police Officers</a></li>
        <!-- Note: Open by default when active is better but is yet to be achieved. -->
        <li><a href="#ModelViewer" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>3D Model
          </a>
          <ul id="ModelViewer" class="collapse list-unstyled ">
            <li><a href="crimeScene.php">Crime Scene</a></li>
            <li><a href="autopsy.php">Autopsy</a></li>
          </ul>
        </li>
        <li class="active"><a href="#crimeManage" aria-expanded="false" data-toggle="collapse"> <i class="icon-padnote"></i> Crime Management </a>
          <ul id="crimeManage" class="collapse list-unstyled ">
            <li><a href="crime.php">Crime</a></li>
            <li><a href="witness.php">Witness</a></li>
            <li class="active"><a href="evidence.php">Evidence</a></li>
          </ul>
        </li>
    </nav>
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Crime Management</h2>
        </div>
      </div>

      <?php
      $id = $_SESSION['id'];
      $db = mysqli_connect('localhost', 'root', '', 'crimelab');
      $results = mysqli_query($db, "SELECT * FROM crime WHERE id = '$id'");
      ?>

      <!-- Breadcrumb-->
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">Crime Management</li>
          <li class="breadcrumb-item active">Evidence</li>
        </ul>
      </div>
      <section class="no-padding-top">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="block margin-bottom-sm">
                <div class="title"><strong>Crime Information</strong></div>
                <div class="table-responsive">
                  <?php
                  $connection = mysqli_connect("localhost", "root", "");
                  $db = mysqli_select_db($connection, 'crimelab');

                  $query = "SELECT images.* FROM images INNER JOIN crime ON images.crimeId=crime.crimeId WHERE crime.id='$id'";
                  $query_run = mysqli_query($connection, $query);
                  ?>
                  <table class="table table-striped table-sm" id="images">
                    <thead>
                      <tr>
                        <th scope="col">IMAGE ID</th>
                        <th scope="col">CRIME ID</th>
                        <th scope="col">IMAGE UPLOADED</th>
                        <th scope="col">PREVIEW</th>
                      </tr>
                    </thead>
                    <?php
                    if ($query_run) {
                      foreach ($query_run as $row) {
                    ?>
                        <tbody>
                          <tr>
                            <td><?php echo $row['imageId']; ?></td>
                            <td><?php echo $row['crimeId']; ?></td>
                            <td><?php echo $row['imageUploaded']; ?></td>
                            <td><img width = "200px" src="uploads/<?= $row['imageUploaded'] ?>"></td>
                            <td>
                              <a href="addevidence.php?del=<?php echo $row['imageId']; ?>" class="del_btn">DELETE</a>
                            </td>
                          </tr>
                        </tbody>
                    <?php
                      }
                    } else {
                      echo "No Record Found";
                    }
                    ?>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="block">
                <div class="block-body">
                  <!-- Form Elements -->
                  <div class="col-lg-12">
                    <div class="block">
                      <!-- START OF TEST CODE FOR IMAGE VIEWER -->

                      <form method="post" action="upload.php" enctype="multipart/form-data">
                        <div class="title"><strong> EVIDENCE </strong></div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">CRIME ID</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="crimeId" required>
                          </div>
                        </div>
          
                        <?php
                        if (isset($_GET['error'])) {
                          echo "<p class='error'>";
                          echo htmlspecialchars($_GET['error']);
                          echo "</p>";
                        }
                        ?>

                        <input type="file" name="images[]" multiple>

                        <button type="submit" name="upload" id="upload">
                    Upload</button>
                    <script>
                                    $('#upload').on('click', function(){
                                        Swal.fire(
                                            'Image Uploaded',
                                            'Data is Saved!',
                                            'success',
                                            '10000'
                                          )
                                        })
                                </script>
                        </br>
                        </br>
                      </form>

                      <!-- END OF IMAGE VIEWER -->
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