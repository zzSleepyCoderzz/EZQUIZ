<?php
require 'sambung.php';
session_start();
$topik_pilihan = $_SESSION['pilih_topik'];
 ?>

 <?php session_start(); ?>

 <?php

 if (!isset($_SESSION['score'])) {
   $_SESSION['score'] = 0;
 }

 if ($POST) {
   $idquestion = $_POST['idsoalan'];
   $number = $_POST['number'];
   $selected_choice = $_POST['choice'];
   $next = $number+1;
   $total = 4;


   $query = "SELECT * FROM soalan WHERE
   idtopik = $topik_pilihan";
   $results = mysqli_query($hubung, $query);
   $total = mysqli_num_rows($results);


   $q = "SELECT * FROM pilihan WHERE
   nom_soalan = $number AND jawapan=1 AND idsoalan = $idquestion";
   $result = mysqli_query($hubung,$q);
   $row = mysqli_fetch_assoc($result);
   $correct_choice = $row['idpilihan'];

   if ($correct_choice == $selected_choice) {
     $semakan = "TEPAT";
     $_SESSION['score']++;
   }

   if($number == $total){
     header("Location: soalan_markah.php");
     exit();
   }
   else {
     header("Location : soalan_papar.php?semakan = ".$semakan."&idtopik = ".$topik_pilihan."&n = ".$next."&score = ".$_SESSION['score']);
   }
 }
  ?>
