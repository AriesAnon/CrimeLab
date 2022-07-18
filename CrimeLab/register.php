<?php 
    session_start();
    include("config.php");
    
 if (isset($_POST['check_submit_btn'])) 
  {
     $email = $_POST['email'];
     $email_query = "SELECT * FROM register WHERE email = '$email' ";
     $email_query_run = mysqli_query($mysqli,$email_query);

     if(mysqli_num_rows($email_query_run) >0 )
      {
         echo "Email already exists! Please try another one.";
      }
  }


    if (isset($_POST['save'])) {
      
    $capability = $_POST['capability'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName =  $_POST['lastName'];
    $birthDate = $_POST['birthDate'];
    $gender =  $_POST['gender'];
    $address =  $_POST['address'];
    $position =  $_POST['position'];
    $department =  $_POST['department'];
    $officeAddress =  $_POST['officeAddress'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $badgeNo = $_POST['badgeNo'];

    mysqli_query($mysqli, "INSERT INTO register (capability, badgeNo, firstName, middleName, lastName, birthDate, gender, address, position, department, officeAddress, email, password, confirmPassword) 
    VALUES ('$capability', '$badgeNo','$firstName', '$middleName', '$lastName', '$birthDate', '$gender', '$address', '$position', '$department', '$officeAddress', '$email', '$password', '$confirmPassword')");

  
    $_SESSION['message'] = "saved";
        header('location:registration.php');

    }
      //echo("inasdasd");
    
?>