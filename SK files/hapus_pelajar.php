<?php
require 'sambung.php';
require 'keselamatn.php';

$Delpelajar = $_GET['idpengguna'];

 $hapuskan1 = mysqli_query($hubung, "DELETE FROM pengguna WHERE idpengguna = '$Delpelajar'");
 $hapuskan2 = mysqli_query($hubung, "DELETE FROM perekodan WHERE idpengguna = '$Delpelajar'");



 echo "<script>alert('Hapus Pelajar Berjaya');
 window.location = 'guru_senarai.php'</script>";5
 ?>
