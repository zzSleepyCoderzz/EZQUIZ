<?php
require 'sanmbung.php';
require 'keselamatan.php';

$soalanDel = $_GET['idsoalan'];
$hapuskan1 = mysqli_query($hubung, "DELETE FROM soalan WHERE idsoalan = '$soalanDel' ");
$hapuskan2 = mysqli_query($hubung, "DELETE FROM pilihan WHERE idsoalan = '$soalanDel' ");

echo "<script>alert(Hapus soalan berjaya');
window.location = 'pilih_subjek.php' </script>";
 ?>
