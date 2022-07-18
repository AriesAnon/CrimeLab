<?php
session_start();
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
  <!-- Datepicker -->
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
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
            <li class="active"><a href="crime.php">Crime</a></li>
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
          <li class="breadcrumb-item active">Crime</li>
        </ul>
      </div>
      <section class="no-padding-top">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="block margin-bottom-sm">
                <div class="title"><strong>Crime Information</strong></div>
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
                        <th scope="col">DELETE</th>
                        <th scope="col">EDIT</th>
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
                          <td>
                            <a href="addcrime.php?del=<?php echo $row['crimeId']; ?>" class="del_btn" onclick="return confirm('Are you sure you want to delete this data?');">DELETE</a>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success editbtn"> EDIT </button>
                          </td>
                        </tr>
                      </tbody>

                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
            <!-- Form Elements -->
            <div class="col-lg-12">
              <div class="block">
                <div class="title"><strong>ADD CRIME INFORMATION</strong></div>
                <div class="block-body">
                  <form action="addcrime.php" class="form-horizontal" method="POST">

                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Crime Category</label>
                      <div class="col-sm-9">
                        <select type="text" class="form-control mb-3 mb-3" name="crimeCategory" required>
                          <option disabled="disabled" selected="selected" value="">---</option>
                          <option>Violent Crime</option>
                          <option>Property Crime</option>
                          <option>Public Disorder Crime</option>
                          <option>White Collar Crime</option>
                          <option>High-Tech Crime</option>
                          <option>Organized Crime</option>
                        </select>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Residential</label>
                      <div class="col-sm-9">
                        <select type="text" class="form-control mb-3 mb-3" name="residential" required>
                          <option disabled="disabled" selected="selected" value="">---</option>
                          <option>neighborhood</option>
                          <option>city</option>
                          <option>alley way</option>
                          <option>forest</option>
                          <option>beach</option>
                          <option>parkinglot</option>
                          <option>bar/night club</option>
                          <option>restaurant</option>
                          <option>hotel/motel</option>
                          <option>unknown location</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Crime Description</label>
                      <div class="col-sm-9">
                        <input type="text" placeholder="Enter Description" class="form-control" name="description" required>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Location</label>
                      <div class="col-sm-9">
                        <input type="text" placeholder="Enter Location" class="form-control" name="location" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Status</label>
                      <div class="col-sm-9">
                        <select type="text" class="form-control mb-3 mb-3" name="status" required>
                          <option disabled="disabled" selected="selected" value="">---</option>
                          <option value="Open">Open</option>
                          <option value="Close">Closed</option>
                          <option value="Pending">Pending</option>
                      </div>
                    </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">Date Reported</label>
                <div class="col-sm-9">
                  <div class="row">
                    <div class="col-md-3">
                      <!-- Add Datepicker -->
                      <input type="date" class="form-control" name="dateReported" required>
                      <!-- <input type="text" placeholder="MM/DD/YY" class="form-control" name="dateReported" required> -->
                    </div>
                  </div>
                </div>
              </div>

              <!-- TESTING: MOVED THE LAST PART OVER HERE-->
              <div class="line"></div>
              <div class="form-group row">
                <div class="col-sm-9 ml-auto">
                  <button type="submit" class="btn btn-secondary">Cancel</button>
                  <button type="submit" name="addCrimenow" class="btn btn-primary" id="click">Confirm</button>
                  <script>
                                    $('#click').on('click', function(){
                                        Swal.fire(
                                            'Confirmed',
                                            'Data is Saved!',
                                            'success',
                                            '10000'
                                          )
                                        })
                                </script>


                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
  <!--EDIT FIELD -->
  <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"> EDIT CRIME INFORMATION </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <!-- UPDATE CRIME -->
        <form action="updatecrime.php" class="form-horizontal" method="POST">
          <div class="line"></div>
          <div class="form-group row">
            <input type="hidden" name="crimeId" id="crimeId"></input>
            <input type="hidden" name="id" id="id"></input>
            <label class="col-sm-3 form-control-label">Crime Category</label>
            <div class="col-sm-9">
              <select type="text" class="form-control mb-3 mb-3" name="crimeCategory" id="crimeCategory">
                <option>---</option>
                <option>Violent Crime</option>
                <option>Property Crime</option>
                <option>Public Disorder Crime</option>
                <option>White Collar Crime</option>
                <option>High-Tech Crime</option>
                <option>Organized Crime</option>
              </select>
            </div>
          </div>
          <div class="line"></div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Residential</label>
            <div class="col-sm-9">
              <select type="text" class="form-control mb-3 mb-3" name="residential" id="residential">
                <option>---</option>
                <option>neighborhood</option>
                <option>city</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Crime Description</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Enter Description" class="form-control" name="description" id="description">
            </div>
          </div>
          <div class="line"></div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Location</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Enter Location" class="form-control" name="location" id="location">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Status</label>
            <div class="col-sm-9">
              <select type="text" class="form-control mb-3 mb-3" name="status" id="status">
                <option>---</option>
                <option>Open</option>
                <option>Closed</option>
                <option>Pending</option>
            </div>
          </div>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 form-control-label">Date Reported</label>
      <div class="col-sm-9">
        <div class="row">
          <div class="col-md-3">
            <input type="text" placeholder="MM/DD/YY" class="form-control" name="dateReported" id="dateReported">
          </div>
        </div>
      </div>
    </div>
    <div class="line"></div>
    <div class="form-group row">
      <div class="col-sm-7 ml-auto">
        <button type="submit" class="btn btn-secondary"> Cancel </button>
        <button type="submit" name="updateCrime" class="btn btn-primary"> Update </button>
      </div>
    </div>
    <!--#########################################################################################-->
    </form>
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

  <!-- Datepicker Script -->
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/datepicker/moment.min.js"></script>
  <script src="vendor/datepicker/daterangepicker.js"></script>

  <script>
    $(document).ready(function() {
      $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#crimeId').val(data[0]);
        $('#id').val(data[1]);
        $('#crimeCategory').val(data[2]);
        $('#residential').val(data[3]);
        $('#description').val(data[4]);
        $('#location').val(data[5]);
        $('#status').val(data[6]);
        $('#dateReported').val(data[7]);
      });
    });
  </script>

  <!-- Pop Up Notif / Confirmation -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>