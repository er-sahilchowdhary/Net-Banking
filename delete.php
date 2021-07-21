<?php
// include database connection file
include_once("bankconnection.php");

// Get id from URL to delete that user
$employee_id = $_POST['id'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM admin WHERE id=$employee_id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:home.html");
?>