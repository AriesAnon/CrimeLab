<?php
session_start(); //Start new session;

if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
}
// Database Connection

$con = new mysqli("localhost", "root", "", "crimelab");
if ($con->connect_error) {
  die("Failed to connect :" . $con->connect_error);
} else {
  $stmt = $con->prepare("select * from register where email =?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt_result = $stmt->get_result();
  if ($stmt_result->num_rows > 0) {
    $data = $stmt_result->fetch_assoc();
    if ($data['password'] === $password) {
      //check if the variables are not empty
      //is not needed for some reason
      // if(isset($_SESSION['user']) && isset($_SESSION['position'])){
      //   session_unset();
      //   session_destroy();
      // }

      //new addition: creating a new session for variable passing
      $_SESSION['user'] = $data['firstName'] . " " . $data['lastName']; // dot for concatenation of the name
      $_SESSION['position'] = $data['position'];
      $_SESSION['id'] = $data['id'];
      $_SESSION['capability'] = $data['capability'];

      if ($_SESSION['capability'] == 1) { // user capability 1 is admin; 2 is user
        header('location:home_admin.php');
      } else {
        header('location: home.php');
      }
    } else {
      # error message
      $em = "Invalid Email or Password.";

      /*
        redirect to 'index.php' and 
        passing the error message
          */
      # redirect to 'index.php'
      header("Location: index.php?error=$em");
    }
  } else {
    $em = "Invalid Email or Password.";

    header("Location: index.php?error=$em");
  }
}
