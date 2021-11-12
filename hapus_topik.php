<?php
require 'sambung.php';
require 'keselamatan.php';

//Diperlukan untuk suppress ralat sekiranya topik tiada data
error_reporting(E_ERROR | E_PARSE);

//Dapatkan ID Topik
$topik = $_GET['idtopik'];

//Dapatkan data topik
$del = mysqli_query($hubung , "SELECT * FROM topik AS t INNER JOIN soalan as q
ON q.idtopik = t.idtopik INNER JOIN pilihan AS c
On q.idsoalan = c.idsoalan WHERE t.idtopik = $topik");

$dataDel = mysqli_fetch_array($del);

//Delete rekod subjek
$result1 = mysqli_query($hubung , "DELETE FROM topik WHERE idtopik = '$topik'");
$result2 = mysqli_query($hubung , "DELETE FROM soalan WHERE idtopik = '$topik'");
$result3 = mysqli_query($hubung , "DELETE FROM pilihan WHERE idsoalan = '$dataDel[idsoalan]'");
$result4 = mysqli_query($hubung , "DELETE FROM perekodan WHERE idtopik = '$topik' ");

//Mesej jika berjaya
echo "<script>alert('Hapus Topik Berjaya');
window.location='pilih_subjek.php'</script>";
 ?>
