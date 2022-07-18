<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>CRIME LABORATORY SYSTEM</title>
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/register_style.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper main p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">CrimeLab Registration</h2>
                    <form action="register.php" method="POST">
                    <div class="input-group col-3">
                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="capability" required>
                                            <option disabled="disabled" selected="selected" value="" >Capability</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Officer</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                        </div>
                        <div class="input-group col-3">
                            <input class="input--style-2" type="text" value="<?php if (isset($_POST['badgeNo'])) { echo $_POST['badgeNo']; }  ?>" placeholder="Badge Number" name="badgeNo" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-3">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" value="<?php if (isset($_POST['firstName'])) { echo $_POST['firstName']; }  ?>" placeholder="First Name" name="firstName" 
                                    required/>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" value="<?php if (isset($_POST['middleName'])) { echo $_POST['middleName']; }  ?>" placeholder="Middle Name"
                                        name="middleName" required/>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" value="<?php if (isset($_POST['lastName'])) { echo $_POST['lastName']; }  ?>" placeholder="Last Name" name="lastName"
                                        required/>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Birthdate"
                                        name="birthDate" required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender" required>
                                            <option disabled="disabled" selected="selected" value="" >Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Address" value="<?php if (isset($_POST['address'])) { echo $_POST['address']; }  ?>" name="address" required>
                        </div>
                           <div class="input-group">
                            <div class="col-2">
                            <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="position" required>
                                        <option disabled="disabled" selected="selected" value="" >Position</option>
                                        <option>Director General</option>
                                        <option>Police General</option>
                                        <option>Deputy Director General</option>
                                        <option>Police Lieutenant General</option>
                                        <option>Director</option>
                                        <option>Police Major General</option>
                                        <option>Chief Superintendent</option>
                                        <option>Police Brigadier General</option>
                                        <option>Senior Superintendent</option>
                                        <option>Police Colonel</option>
                                        <option>Superintendent</option>
                                        <option>Police Lieutenant Colonel</option>
                                        <option>Chief Inspector</option>
                                        <option>Police Major</option>
                                        <option>Senior Inspector</option>
                                        <option>Police Captain</option>
                                        <option>Inspector</option>
                                        <option>Police Lieutenant</option>
                                        <option>Chief Inspector</option>
                                        <option>Senior Police Officer IV</option>
                                        <option>Senior Police Officer III</option>
                                        <option>Senior Police Officer II</option>
                                        <option>Senior Police Officer I</option>
                                        <option>Police Executive Master Sergeant</option>
                                        <option>Police Chief Master Sergeant</option>
                                        <option>Police Senior Master Sergeant</option>
                                        <option>Police Master Sergeant</option>
                                        <option>Police Officer III</option>
                                        <option>Police Officer II</option>
                                        <option>Police Officer I</option>
                                        <option>Police Staff Sergeant</option>
                                        <option>Police Corporal</option>
                                        <option>Police Corporal</option>
                                        <option>Patrolman</option>
                                        <option>Patrolwoman</option>
                                        <option>Director General</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                            </div>
                            </div>
                            </div>
                            <div class="input-group">
                            <div class="col-2">
                            <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="department" required>
                                        <option disabled="disabled" selected="selected" value="">Department</option>
                                        <option>La Union Provincial Police Office</option>
                                        <option>Police General</option>
                                        <option>San Fernando City Police Station</option>
                                        <option>Police Lieutenant General</option>
                                        <option>San Juan Police Station</option>
                                        <option>Bacnotan Police Station</option>
                                        <option>Pagdalagan Police Station</option>
                                        <option>Bauang Police Station</option>
                                        <option>San Gabriel Municipal Police Station</option>
                                        <option>Baguio City Police Office Station 5</option>
                                        <option>Baguio City Police Office Station 6</option>
                                        <option>Baguio City Police Office Station 7</option>
                                        <option>Luna Police Station</option>
                                        <option>Agoo Police Station</option>
                                        <option>Tubao Police Station</option>
                                        <option>PNP Station La Union</option>
                                        <option>Santiago Norte Police Station</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                            </div>
                            </div>
                            </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" value="<?php if (isset($_POST['officeAddress'])) { echo $_POST['officeAddress']; }  ?>" placeholder="Office Address" name="officeAddress"
                                required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2 email_checking" type="text" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; }  ?>" placeholder="Email" name="email" required>
                            <small class="error_email" style="color: red;"></small>

                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" value="<?php if (isset($_POST['password'])) { echo $_POST['password']; }  ?>" placeholder="Password" name="password"
                                required id="myInput" onckeyup="check();" />
                        </div>
                        <div class="row row-space col-2 showPasswordField">
                            <input class="showPasswordField col-2" type="checkbox" onclick="showPasswordFunction()"
                                name="checkbox1">
                            Show Password
                            <!-- JAVASCRIPT FOR SHOW PASSWORD -->
                            <script>
                                function showPasswordFunction() {
                                    //Does not accept "password" as ID. Find out why later
                                    var x = document.getElementById("myInput");
                                    if (x.type === "password") {
                                        x.type = "text";
                                    } else {
                                        x.type = "password";
                                    }
                                }
                            </script>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Confirm Password"
                                name="confirmPassword" required id="confirmPassword" onkeyup="check();" />
                            <span id="message"></span>
                        </div>
                        <!-- JAVASCRIPT FOR PASSWORD VALIDATION -->
                        <script>
                            var check = function () {
                                if (document.getElementById('myInput').value ==
                                    document.getElementById('confirmPassword').value) {
                                    document.getElementById('message').style.color = 'green';
                                    document.getElementById('message').innerHTML = 'Passwords Match';

                                    var btn = document.getElementById("registerButton");
                                    btn.disabled = false;

                                } else {
                                    document.getElementById('message').style.color = 'red';
                                    document.getElementById('message').innerHTML = 'Passwords not matching';
                                    
                                    var btn = document.getElementById("registerButton");
                                    btn.disabled = true;
                                    
                                }
                            }
                        </script>
                        <div class="row row-space col-2 showPasswordField">
                            <input class="showPasswordField col-2" type="checkbox"
                                onclick="showConfirmPasswordFunction()" name="checkbox2">
                            Show Password
                            <!-- JAVASCRIPT FOR SHOW CONFIRM PASSWORD -->
                            <script>
                                function showConfirmPasswordFunction() {
                                    var y = document.getElementById("confirmPassword");
                                    if (y.type === "password") {
                                        y.type = "text";
                                    } else {
                                        y.type = "password";
                                    }
                                }

                            </script>
                        </div>
                        <div class="p-t-0">
                            <button class="btn btn--radius btn--green" type="submit" name="save" id="registerButton"
                                disabled>Register</button>
                                <script>
                                    $('#registerButton').on('click', function(){
                                        Swal.fire(
                                            'REGISTERED!',
                                            'Data is Saved!',
                                            'success',
                                            '10000'
                                          )
                                        })
                                </script>
                                <?php
                                    include("config.php");
                                ?>
                           
                                <div button class="btn btn--radius btn--red"> <a id="back" href="home_admin.php" class="nav-link" style="color: white; "> <span class="d-none d-sm-inline"> Back </span><i class="icon-back"></i></a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <!-- CUSTOM JS -->
    <script src="js/custom.js"></script>
    

    <!-- showPassword JS-->
    <!--<script src="js/main.js"></script>-->
    <!-- notes: some functions does not work when fetching from external script-->
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->