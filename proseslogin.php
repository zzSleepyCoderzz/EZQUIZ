<?php

//Fail untuk sambung ke database
require 'sambung.php';

//Fail menu halaman utama
require 'header1.php';
session_start();

//Kod untuk semak sekiranya pengguna wujud
if (isset($_POST['idpengguna'])) {
  $user = $_POST['idpengguna'];
  $pass = $_POST['password'];
  $query = mysqli_query($hubung, "SELECT * FROM pengguna WHERE idpengguna = '$user' AND password = '$pass'");
  $row = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query) == 0 || $row['password'] != $pass){

  //Mesej jika pengguna tidak wujud atau password salah
  echo "<script> alert('ID Pengguna atau Kata Laluan yang salah');
  window.location = 'login.php'</script>";
}
else {

  //Mesej jika login berjaya 
  $_SESSION['idpengguna'] = $row ['idpengguna'];
  $_SESSION['level'] = $row ['aras'];
  echo "<script> alert('Login Berjaya');
  window.location = 'index2.php'</script>";
}
}
 ?>
