<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "ezquiz";
$hubung = mysqli_connect ($host , $user, $password, $database );
if (mysqli_connect_errno()){
  echo "Proses sambung ke pangkalan data gagal";
  exit();
}

$nama_sekolah = "SMK (L) METHODIST, JALAN HANG JEBAT";
$nama_sistem = "ADVANCE-SISTEM PENILAIAN KENDIRI";
$motto1 = "In KUNA, WE TRUST";
$motto2 = "COMPILING...";
$footer = "LOREM IPSUM SIT AMET";
$logo = "logo.jpg";
$lencana = "lencana.jpg";
 ?>
