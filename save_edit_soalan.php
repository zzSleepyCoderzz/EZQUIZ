<?php
error_reporting(E_ERROR | E_PARSE);
require 'sambung.php';
require 'keselamatan.php';

if(isset($_POST['submit'])){
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

  $result = mysqli_query($hubung, "UPDATE soalan SET nom_soalan = nom_soalan,
   soalan = '$soalan', gambarajah = '$newnamepic', idtopik = idtopik WHERE idsoalan = '$idsoalan' ");

  echo "<script>alert('Soalan berjaya dikemaskini');
  window.location ='pilih_subjek.php'</script>";
}
 ?>
