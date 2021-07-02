<?php
session_start();
if(!isset($_SESSION['idpengguna'])){
  header('Location : index.php');
  exit();
}
 ?>
