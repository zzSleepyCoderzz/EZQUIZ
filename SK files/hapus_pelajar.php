<?php
require 'sambung.php';
require 'keselamatan.php';

$id = $_GET['idpengguna'];
$dbname = $database;
$conn = mysqli_connect("localhost", "root", "", $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM pengguna WHERE idpengguna = $id ";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    echo "<script>alert('Hapus Pelajar Berjaya');
    window.location = 'pelajar_senarai.php'</script>";
    exit;
} else {
    echo "Error deleting record";
}
 ?>
