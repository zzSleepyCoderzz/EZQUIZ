<?php
//Fail untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

//Diperlukan untuk suppress ralat sekiranya subjek tiada data
error_reporting(E_ERROR | E_PARSE);

//Mendapatkan ID Soalan yang ingin dihapus
$soalanDel = $_GET['idsoalan'];
$idtopik = $_GET['idtopik'];

//Delete rekod soalan
$hapuskan1 = mysqli_query($hubung, "DELETE FROM soalan WHERE idsoalan = '$soalanDel' ");
$hapuskan2 = mysqli_query($hubung, "DELETE FROM pilihan WHERE idsoalan = '$soalanDel' ");


//Mesej jika berjaya delete
echo "<script>alert('Hapus soalan berjaya');
window.location='papar_soalan.php?idtopik=$idtopik'</script>";
 ?>
