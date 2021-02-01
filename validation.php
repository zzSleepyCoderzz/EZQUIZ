<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$host = "localhost";
$dbUsername = "id15998711_db_ezquiz";
$dbPassword = "gP]P^9ko}4dLBk2*";
$dbname = "id15998711_ezquiz";

$con = mysqli_connect($host, $dbUsername, $dbPassword);

mysqli_select_db($con , $dbname);

$s = "select * from users where username = '$username' && password = '$password' ";

$result = mysqli_query($con , $s);

$num = mysqli_num_rows($result);

if($num == 1){
  header('location:home.html');
}

else{
  header('location:index.html');
}



?>
