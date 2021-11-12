<?php

//Fail untuk sambung ke database
require 'sambung.php';
session_start();

//Dapatkan topik semasa
$topik_pilihan = $_SESSION['pilih_topik'];
?>

 <?php session_start() ?>

 <?php

  //Setkan score kepada 0
  if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
  }

  //Jika butang semak ditekan
  if ($_POST) {
    $idquestion = $_POST['idsoalan'];
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number + 1;
    $total = 4;


    //Dapatkan soalan yang berkaitan denagn topik yang dipilih
    $query = "SELECT * FROM soalan WHERE
   idtopik = $topik_pilihan";
    $results = mysqli_query($hubung, $query);
    $total = mysqli_num_rows($results);


    //Dapatkan jawapan
    $q = "SELECT * FROM pilihan WHERE
   nom_soalan = $number AND jawapan=1 AND idsoalan = $idquestion";
    $result = mysqli_query($hubung, $q);
    $row = mysqli_fetch_assoc($result);
    $correct_choice = $row['idpilihan'];

    //Pulangkan nilai betul atau salah
    if ($correct_choice == $selected_choice) {
      $semakan = "TEPAT";
      $_SESSION['score']++;
    }

    //Teruskan kepada soalan seterusnya atau tamat
    if ($number == $total) {
      header("Location: soalan_markah.php?jum=" . $next - 1);
      exit();
    } else {
      header("Location: soalan_papar.php?semakan=" . $semakan . "&idtopik=" . $topik_pilihan . "&n=" . $next . "&score=" . $_SESSION['score']);
    }
  }
  ?>
