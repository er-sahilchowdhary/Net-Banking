<?php
$database_server="localhost";
$database_username="root";
$database_password="";
$database_name="bank_system";

$conn=mysqli_connect($database_server,$database_username,$database_password,$database_name);


if(!$conn)
{
  die("failed to connect:".mysqli_connect_error());

}


else
{
 echo "database connection succesfully";


}





?>