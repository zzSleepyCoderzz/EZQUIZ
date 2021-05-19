<?php
require 'sambung.php';
require 'keselamatan.php';
if(isset($_POT['submit'])){
  $picAsal = $_POST['gambarASal'];
  if ($_FILES['gambar']['name'] == NULL) {
    $newnamepic = $picasal;
  }
  else {
    $gambar = $_FILES['gambar']['name'];
    $imageArr = explode('.',$gambar);
    $random = rand(10000 , 99999);
    $newnamepic = $imageArr[0].$random.'.'.$imageArr[1];
    $uploadPath = "gambar/".$newnamepic;
    $isUploaded = move_uploaded_file($_FILES["gambar"]["tmp_name"], $uploadPath);
  }

  $idsoalan = $_POST['idsoalan'];
  $soalan = $_POST['paparan_soalan'];

  $result = mysqli_query($hubung, "UPDATE soalan SET nom_soalan = '$nom_soalan',
   soalan = '$soalan', gambarajah = '$newnamepic', idtopik = '$istopik' WHERE idsoalan = '$idsoalan' ");

  echo "<script>alert('Soalan berjaya dikemaskini');
  window.location = 'pilih_subjek.php' </script>";
}
 ?>
