<?php
require 'sambung.php';
require 'keselamatan.php';

//Diperlukan untuk suppress ralat sekiranya pelajar tiada data
error_reporting(E_ERROR | E_PARSE);

//Mendapat ID Pengguna
$id = $_GET['idpengguna'];

$dbname = $database;
$conn = mysqli_connect("localhost", "root", "", $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Hapuskan rekod pelajar berkenaan
$sql = "DELETE FROM pengguna WHERE idpengguna = $id ";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);

    //Mesej jika berjaya
    echo "<script>alert('Hapus Pelajar Berjaya');
    window.location = 'pelajar_senarai.php'</script>";
    exit;
} else {

    //Mesej jika tidak berjaya
    echo "Error deleting record";
}
 ?>
