<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: ../view/login.php');
}
?>

<?php
//including the database connection file
include("../connection/db_conn.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");


echo" onClick=\"return confirm('Are you sure you want to delete?')";
//redirecting to the display page (view.php in our case)
header("Location: ../view/login.php");
?>