<?php

//Fail untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

//Fail header selepas log in
include 'header.php';

//Mendapat ID Pengguna sesi tersebut
$nokp = $_SESSION['idpengguna'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>

  <!-- Fail menu selepas log in -->
  <?php include 'menu.php'; ?>
</head>

<body>

  <!-- Bahagian css -->
  <style media="screen">
    body {
      background-color: #ECEBE4;
    }

    #p1 {
      font-family: "Feather Bold";
      font-size: 40px;
      margin-top: 20px;
      margin-bottom: 20px;
    }

    #p2 {
      font-size: 18px;
      font-family: "DIN Next LT Pro Light";
    }
  </style>

  <!-- Paparkan jenis dashboard -->
  <center>
    <p id="p1"><?php echo $pengguna; ?> </p>
  </center>
  <main>
    <table width="70%" border="0" align="center">
      <tr>
        <td>
          <center>

            <?php

            //Paparkan ID dan nama pengguna
            $dataA = mysqli_query($hubung, "SELECT * FROM pengguna WHERE idpengguna = '$nokp'");
            $infoA = mysqli_fetch_array($dataA);
            ?>
            <p id="p2"> SELAMAT DATANG, <?php echo $infoA['nama']; ?>.</p>
            <p id="p2">ID Pengguna anda ialah <?php echo $infoA['idpengguna']; ?>.</p>
          </center>
        </td>
      </tr>
    </table>
  </main>
  <center style="margin-top:150px;"><?php include 'footer.php'; ?></center>
</body>

</html>