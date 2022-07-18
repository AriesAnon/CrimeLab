<?php 
    session_start();
    include("config.php");
    $db = mysqli_connect('localhost', 'root', '', 'crimelab');
    

    $crimeId="";
    $crimeCategory ="";
    $residential ="";
    $description ="";
    $location ="";
    $status ="";
    $dateReported ="";
    $id=$_SESSION['id'];
   
    if (isset($_POST['addCrimenow'])) {

        $crimeId =$row['crimeId'];
        $crimeCategory = $_POST['crimeCategory'];
        $residential = $_POST['residential'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $status = $_POST['status'];
        $dateReported = $_POST['dateReported'];
    

        mysqli_query($mysqli, "INSERT INTO crime (id, crimeCategory, residential, description, location, status, dateReported)
        VALUES('$id', '$crimeCategory', '$residential', '$description', '$location', '$status', '$dateReported')");


        $_SESSION['message'] = "saved";
        if ($_SESSION['capability'] == 1) { // user capability 1 is admin; 2 is user
            header('location:crime_admin.php');
          } else {
            header('location: crime.php');
          }

    }

    if (isset($_GET['del'])) {
        $crimeId = $_GET['del'];
        mysqli_query($db, "DELETE FROM crime WHERE crimeId=$crimeId");
        $_SESSION['message'] = "Address deleted!"; 
        if ($_SESSION['capability'] == 1) { // user capability 1 is admin; 2 is user
            header('location:crime_admin.php');
          } else {
            header('location: crime.php');
          }
    }
    
?>