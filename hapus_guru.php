<?php
//Fail untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

//Diperlukan untuk suppress ralat sekiranya subjek tiada data
error_reporting(E_ERROR | E_PARSE);

$delguru = $_GET['idpengguna'];

//Mendapatkan semua rekod yang dihasilkan oleh guru tersebut
//ON does not seem to make a difference
$delete1 = mysqli_query($hubung,
"SELECT * FROM pengguna AS u INNER JOIN topik AS t
 ON u.idpengguna = t.idpengguna INNER JOIN soalan AS q
 ON t.idtopik = q.idtopik INNER JOIN perekodan AS r
 ON t.idtopik = r.idtopik INNER JOIN pilihan  AS c
 ON q.idsoalan = c.idsoalan WHERE u.idpengguna = $delguru");
 $infoDel = mysqli_fetch_array($delete1);
 $delete1 = $delguru;
 $delete2 = $infoDel['idpengguna'];
 
 //Menghapuskanm semua rekod yang dihasilkan oleh guru tersebut
 $hapuskan1 = mysqli_query($hubung, "DELETE FROM topik WHERE idpengguna = '$delete1'");
 $hapuskan2 = mysqli_query($hubung, "DELETE FROM pengguna WHERE idpengguna = '$delete1'");
 $hapuskan3 = mysqli_query($hubung, "DELETE FROM soalan WHERE idtopik = '$delete2'");
 $hapuskan4 = mysqli_query($hubung, "DELETE FROM pilihan WHERE idtopik = '$delete2'");
 $hapuskan5 = mysqli_query($hubung, "DELETE FROM perekodan WHERE idtopik = '$delete2'");

 //Mesej yang dipaparkan setelah berjaya hapuskan guru
 echo "<script>alert('Hapus Guru Berjaya');
 window.location = 'guru_senarai.php'</script>";

 ?>
