<?php 
    session_start();
    include("config.php");
    $db = mysqli_connect('localhost', 'root', '', 'crimelab');

    $crimeId="";
    $witnessName ="";
    $witnessAddress ="";
    $witnessType ="";
    $witnessTestimony ="";
   
    if (isset($_POST['addWitnessnow'])) {

        $crimeId = $_POST['crimeId'];
        $witnessName = $_POST['witnessName'];
        $witnessAddress = $_POST['witnessAddress'];
        $witnessType = $_POST['witnessType'];
        $witnessTestimony= $_POST['witnessTestimony'];
    
        mysqli_query($mysqli, "INSERT INTO witness (crimeId, witnessName,  witnessAddress, witnessType, witnessTestimony)
        VALUES('$crimeId','$witnessName',  '$witnessAddress', '$witnessType', '$witnessTestimony')");
    
        $_SESSION['message'] = "saved";
        if ($_SESSION['capability'] == 1) { // user capability 1 is admin; 2 is user
            header('location:witness_admin.php');
          } else {
            header('location: witness.php');
          }

    }

    if (isset($_GET['del'])) {
        $witnessNo = $_GET['del'];
        mysqli_query($db, "DELETE FROM witness WHERE witnessNo=$witnessNo");
        $_SESSION['message'] = "Deleted!"; 
        if ($_SESSION['capability'] == 1) { // user capability 1 is admin; 2 is user
            header('location:witness_admin.php');
          } else {
            header('location: witness.php');
          }
    }

    ?>