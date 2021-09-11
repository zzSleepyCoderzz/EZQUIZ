<?php
require 'sambung.php';
require 'keselamatan.php';

error_reporting(E_ERROR | E_PARSE);

$soalanDel = $_GET['idsoalan'];
$hapuskan1 = mysqli_query($hubung, "DELETE FROM soalan WHERE idsoalan = '$soalanDel' ");
$hapuskan2 = mysqli_query($hubung, "DELETE FROM pilihan WHERE idsoalan = '$soalanDel' ");

echo "<script>alert('Hapus soalan berjaya');
window.location='papar_soalan.php'</script>";
 ?>
