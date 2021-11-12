<?php

//Fail untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

$topik_pilihan = $_GET['idtopik'];
$topik = mysqli_query($hubung, "SELECT * FROM topik WHERE
idtopik = '$topik_pilihan'");
$infoTopik = mysqli_fetch_array($topik);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
</head>

<body>
  <style media="screen">
    table {
      border-collapse: separate;
      border-spacing: 0 15px;
    }
  </style>
  <center>
    <table width="100%" border="0">
      <tr>

        <!-- Papar lencana sekolah -->
        <td width="10%"><img src="<?php echo $lencana; ?>" width="105" height="105" hspace="7" align="left"></td>
        <td valign="left">
          <h5><?php echo "$nama_sekolah"; ?></h5>
          <p><strong>LAPORAN PRESTASI PELAJAR BAGI TOPIK : <?php echo $infoTopik['topik']; ?></strong></p>
        </td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td width="5%"><b> Bil. </b></td>
        <td width="34%"><b> Nama Pelajar </b></td>
        <td width="45%"><b> Skor Tertinggi </b></td>
        <td width="10%"><b> Bil. Ujian </b></td>
      </tr>
      <tr>
        <hr>
      </tr>
      <?php
      $no = 1;

      $rekod = mysqli_query($hubung, "SELECT idpengguna, idtopik, MAX(skor), COUNT(idpengguna) as 'Bil' FROM perekodan WHERE
       idtopik = '$topik_pilihan' GROUP BY idpengguna HAVING MAX(skor) >= 0");

      //Dapatkan dan paparkan semua rekod kuiz yang diambil 
      while ($infoRekod = mysqli_fetch_array($rekod)) {

        $pelajar = mysqli_query($hubung, "SELECT * FROM pengguna WHERE idpengguna = '$infoRekod[idpengguna]'");
        $infoPelajar = mysqli_fetch_array($pelajar);
      ?>
        <tr style="font-size:16px">
          <td> <?php echo $no; ?></td>
          <td> <?php echo $infoPelajar['nama']; ?></td>
          <td> <?php echo $infoRekod['MAX(skor)']; ?></td>
          <td> <?php echo $infoRekod['Bil']; ?></td>
        </tr>
      <?php $no++;
      } ?>
    </table>
  </center>
  <br>
  <br>
  <center>
    <h5>*LAPORAN TAMAT* <br>
      Jumlah Rekod : <?php echo $no - 1; ?></h5><br>
    <a href="index2.php"> Home </a>
    <a href="javascript:window.print()"> Cetak Laporan </a>
    <a href="logout.php"> Logout </a>
  </center>
</body>

</html>