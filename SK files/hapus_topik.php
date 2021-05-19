<?php
require 'sambung.php';
require 'keselamatan.php';

$topik = $_GET[idtopik];
$del = mysqli_query($hubung , "SELECT * FROM topik AS t INNER JOIN soalan as q
ON q.idtopik = t.idtopik INNER JOIN pilihan AS c
On q.idsoalan = c.idsoalan WHERE t.idtopik = $topik");

$dataDel = mysqli_fecth_array($del);


$result1 = mysqli_query($hubung , "DELETE FROM topik WHERE idtopik = '$topik'");
$result2 = mysqli_query($hubung , "DELETE FROM soalan WHERE idtopik = '$topik'");
$result3 = mysqli_query($hubung , "DELETE FROM pilihan WHERE idsoalan = '$dataDel['idsoalan']'");
$result4 = mysqli_query($hubung , "DELETE FROM perekodan WHERE idtopik = '$topik'");

echo "<script>alert(Hapus topik berjaya');
window.location = 'papar_topik.php' </script>";
 ?>
