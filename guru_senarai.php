<?php

//Fail yang diperlukan untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

//Fail header standard selepas log in
include 'header.php';

//Diperlukan untuk supress ralat kerana sekiranya guru tidak menghasilkan apa=apa soalan
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>

  <!-- Fail bagi menu standard selepas log in-->
  <?php include 'menu.php'; ?>
</head>

<body>

  <!-- Bahagian css -->
  <style media="screen">
    body {
      background-color: #ECEBE4;
    }

    p {
      font-family: "DIN Next LT Pro Light";
      font-size: 25px;
      margin: 0;
      padding-right: 30px;
    }

    #p1 {
      font-family: "Feather Bold";
      font-size: 40px;
      margin-top: 20px;
      margin-bottom: 20px;
    }

    #div1 {
      background-color: #ECEBE4;
      justify-content: space-between;
      display: flex;
      width: 16%;
    }

    #div2 {
      padding-left: 300px;
    }

    #div3 {
      padding-left: 300px;
    }

    #button1 {
      background-color: #3C91E6;
      border: none;
      color: white;
      padding: 8px 20px;
      text-align: center;
      font-family: "Feather Bold";
      display: inline-block;
      font-size: 12px;
      border-radius: 10px;
      border: 2px solid #3C91E6;
      margin: 0;
    }

    #button1:hover {
      cursor: pointer;
      background-color: white;
      color: black;
    }

    b {
      font-family: "DIN Next LT Pro Bold";
    }

    hr {
      width: 1005px;
    }

    #delete {
      background-color: red;
      border: none;
      color: white;
      padding: 8px 20px;
      text-align: center;
      font-family: "Feather Bold";
      display: inline-block;
      font-size: 12px;
      border-radius: 10px;
      border: 2px solid red;
      margin: 0;
    }

    #delete:hover {
      cursor: pointer;
      background-color: white;
      color: black;
      box-shadow: none;
    }
  </style>
  <center>
    <p id="p1"> SENARAI GURU BERDAFTAR </p>
  </center>
  <br>
  <main>

    <!-- Memaparkan info tentang guru-guru yang berdaftar -->
    <table width="70%" border="0" align="center" style="font-size:16px;font-family:DIN Next LT Pro Light;">
      <tr align="center">
        <td width="5%"><b> Bil.</b></td>
        <td width="20%"><b> Nama </b></td>
        <td width="10%"><b> Nom.</b></td>
        <td width="7%"><b> Bil.Topik </b></td>
        <td width="10%"><b> Bil.Soalan </b></td>
        <td width="5%"><b> Tindakan </b></td>
      </tr>
      <hr>
      <?php

      //Kod untuk mendapat semua data tentang guru-guru
      $no = 1;
      $data1 = mysqli_query($hubung, "SELECT * FROM pengguna WHERE aras = 'GURU' ORDER BY nama ASC");
      while ($info1 = mysqli_fetch_array($data1)) {
        $topik = mysqli_query($hubung, "SELECT idtopik, COUNT(idtopik) as 'biltopik' FROM topik WHERE idpengguna = '$info1[idpengguna]' GROUP BY idpengguna");
        $infoTopik = mysqli_fetch_array($topik);
        $soalan = mysqli_query($hubung, "SELECT idsoalan, COUNT(idsoalan) as 'bilsoalan' FROM soalan WHERE idtopik = '$infoTopik[idtopik]' GROUP BY idsoalan");
        $infosoalan = mysqli_fetch_array($soalan);
      ?>

        <!-- Kod untuk memaparkan info yang diambil dari database -->
        <tr align="center">
          <td> <?php echo $no; ?></td>
          <td> <?php echo $info1['nama']; ?></td>
          <td> <?php echo $info1['idpengguna']; ?></td>
          <td> <?php echo $infoTopik['biltopik']; ?></td>
          <td> <?php echo $infosoalan['bilsoalan']; ?></td>
          <td><a href="hapus_guru.php?idpengguna=<?php echo $info1['idpengguna'];  ?>" onclick="return confirm ('AWAS!, Semua rekod yang berkaitan akan dihapuskan , Anda Pasti?')">
              <button id="delete"> HAPUS </button></td>
        </tr>
      <?php $no++;
      } ?>
    </table>
  </main>
  <br>
  <br>
  <center>
    <font style='font-size:14px'> *SENARAI TAMAT* <br> Jumlah Rekod : <?php echo $no - 1; ?> </font>
  </center>
  <center style="margin-top:60px;">
    <?php include 'footer.php'; ?>
    <center>
</body>

</html>