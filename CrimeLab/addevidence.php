<?php 
    session_start();
    include("config.php");
    $db = mysqli_connect('localhost', 'root', '', 'crimelab');

    $crimeId="";

    if (isset($_GET['del'])) {
        $imageId = $_GET['del'];
        mysqli_query($db, "DELETE FROM images WHERE imageId=$imageId");
        $_SESSION['message'] = "Deleted!"; 
        if ($_SESSION['capability'] == 1) { // user capability 1 is admin; 2 is user
            header('location:evidence_admin.php');
          } else {
            header('location: evidence.php');
          }
    }

    ?>