<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "EZQUIZ";
$hubung = mysqli_connect ($host , $user, $password,$database );
if (mysqli_connect_errno()){
  echo "Proses sambung ke pangkalan data gagal";
  exit();
}

$nama_sekolah = "SMK (L) METHODIST, JALAN HANG JEBAT";
$nama_sistem = "ADVANCE-SISTEM PENILAIAN KENDIRI";
$motto1 = "WE BEIN GAY TODAY";
$motto2 = "KYS";
$footer = "AI IS GONNA KILL Y'ALL";
$logo = "logo.jpg";
$lencana = "lencana.jpg";
 ?>
