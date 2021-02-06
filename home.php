<?php

session_start();



$host = "localhost";
$dbUsername = "id15998711_db_ezquiz";
$dbPassword = "gP]P^9ko}4dLBk2*";
$dbname = "id15998711_ezquiz";

$con = mysqli_connect($host, $dbUsername, $dbPassword);

if(!con){
  die("Connection failed: " . mysqli_connect_error());
}

else{
  mysqli_select_db($con , $dbname);
}

?>
