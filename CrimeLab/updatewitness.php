<?php
session_start();
include("config.php");
?>

<?php
if(isset($_POST['updateWitness']))

$witnessNo = $_POST['witnessNo'];
$witnessName = $_POST['witnessName'];
$witnessAddress = $_POST['witnessAddress'];
$witnessType = $_POST['witnessType'];
$witnessTestimony = $_POST['witnessTestimony'];

$query = "UPDATE witness SET witnessName='$witnessName', witnessAddress='$witnessAddress', witnessType='$witnessType', witnessTestimony='$witnessTestimony' WHERE witnessNo='$witnessNo' ";
$query_run = mysqli_query($mysqli, $query);

if($query_run)
{
    echo '<script> alert("DATA UPDATED"); </script>';
    if ($_SESSION['capability'] == 1) { // user capability 1 is admin; 2 is user
        header('location:witness_admin.php');
      } else {
        header('location: witness.php');
      }
}
else
{
    echo '<script> alert("DATA NOT UPDATED"); </script>';
}


?>