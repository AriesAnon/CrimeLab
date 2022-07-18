<?php
session_start();
include("config.php");
?>

<?php
if(isset($_POST['updateCrime']))

$crimeId = $_POST['crimeId'];
$crimeCategory = $_POST['crimeCategory'];
$residential = $_POST['residential'];
$description = $_POST['description'];
$location = $_POST['location'];
$status = $_POST['status'];
$dateReported = $_POST['dateReported'];

$query = "UPDATE crime SET crimeCategory='$crimeCategory',residential='$residential', description='$description', location='$location', status='$status', dateReported='$dateReported' WHERE crimeId='$crimeId' ";
$query_run = mysqli_query($mysqli, $query);

if($query_run)
{
    echo '<script> alert("DATA UPDATED"); </script>';
    if ($_SESSION['capability'] == 1) { // user capability 1 is admin; 2 is user
        header('location:crime_admin.php');
      } else {
        header('location: crime.php');
      }
}
else
{
    echo '<script> alert("DATA NOT UPDATED"); </script>';
}


?>