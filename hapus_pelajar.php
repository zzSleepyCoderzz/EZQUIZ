<?php
require 'sambung.php';
require 'keselamatan.php';

//Diperlukan untuk suppress ralat sekiranya subjek tiada data
error_reporting(E_ERROR | E_PARSE);

//Mendapat ID Pengguna
$id = $_GET['idpengguna'];

//Hapuskan rekod pelajar berkenaan
$sql = "DELETE a,b FROM pengguna AS a INNER JOIN perekodan AS b WHERE a.idpengguna = '$id' ";

if (mysqli_query($hubung, $sql)) {
    //Mesej jika berjaya
    echo "<script>alert('Hapus Pelajar Berjaya');
    window.location='pelajar_senarai.php'</script>";
    exit;
} else {
    //Mesej jika tidak berjaya
    echo "<script>alert('Hapus Pelajar Gagal');
    window.location='pelajar_senarai.php'</script>";
}
 ?>
