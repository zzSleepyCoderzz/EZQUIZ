<?php

//Diperlukan untuk suppress ralat sekiranya soalan tiada data
error_reporting(E_ERROR | E_PARSE);

//Fail untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

//Jika butang save soalan ditekan 
if(isset($_POST['submit'])){

  //Menyimpan gambarajah
  $picAsal = $_POST['gambarAsal'];
  if ($_FILES['gambar']['name'] == NULL) {
    $newnamepic = $picAsal;
  }
  else {
    $gambar = $_FILES['gambar']['name'];
    $imageArr = explode('.',$gambar);
    $newnamepic = $imageArr[0].'.'.$imageArr[1];
    $uploadPath = "gambar/".$newnamepic;
    $isUploaded = move_uploaded_file($_FILES["gambar"]["tmp_name"], $uploadPath);
  }

  $idsoalan = $_POST['idsoalan'];
  $soalan = $_POST['paparan_soalan'];

  //Masukkan data terkini ke dalam database
  $result = mysqli_query($hubung, "UPDATE soalan SET nom_soalan = nom_soalan,
   soalan = '$soalan', gambarajah = '$newnamepic', idtopik = idtopik WHERE idsoalan = '$idsoalan' ");

  //Mesej jika berjaya
  echo "<script>alert('Soalan berjaya dikemaskini');
  window.location ='pilih_subjek.php'</script>";
}
 ?>
