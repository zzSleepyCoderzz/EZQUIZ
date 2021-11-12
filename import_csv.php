<?php

//Fail untuk sambung ke database
require 'sambung.php';

//Jika butang import ditekan
if (isset($_POST["import"])) {
  $filename = $_FILES["file"]["tmp_name"];

  //Jika fail mengandungi data
  if ($_FILES["file"]["size"] > 0) {
    $file = fopen($filename , "r");

    //Tambah semua rekod dalam fail csv ke database
    while (($getData = fgetcsv($file, 10000, ",")) != FALSE) {
      $import = "INSERT INTO pengguna(idpengguna, password, nama, jantina, aras) values
      ('".$getData[0]."' , '".$getData[1]."' , '".$getData[2]."','".$getData[3]."' , 'PELAJAR') ";
      $tambah = mysqli_query($hubung , $import);
      if (!isset($tambah)) {

        //Mesej jika gagal
        echo "<script>alert('Pindah naik fail CSV gagal');
        window.location = 'import_daftar.php' </script>";
      }

      else {

        //Mesej jika berjaya
        echo "<script>alert('Pindah naik fail CSV berjaya');
        window.location = 'pelajar_senarai.php' </script>";
      }
    }
    fclose($file);
  }

  //Jika butang import tidak ditekan
  else{
    echo "<script>alert('Tiada fail dipilih');
        window.location = 'import_daftar.php' </script>";
  }
}
