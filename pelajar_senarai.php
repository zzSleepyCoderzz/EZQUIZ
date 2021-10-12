<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
?>

<?php
if (isset($_POST['SUBMIT'])) {
  $jumpakp = $_POST['carikp'];
?>
  <?php include 'menu.php'; ?>

  <center>
    <p id="p1"> SENARAI PELAJAR BERDAFTAR</p>
  </center>
  <div id="carian">
    <form method="post">
      <b>CARIAN NO.K/P:</b>
      <input type="text" name="carikp" maxLength='12' autofocus>
      <input id="butangcarian" type="submit" name="SUBMIT" value="CARI">
    </form>
  </div>

  <!--Permulaan Hasil Carian-->
  <hr>
  <center>
    <h2 id="h2">HASIL CARIAN :</h2>
  </center>
  <table width="70%" border="0" align="center">
    <tr>
      <td><b>Bil.</b></td>
      <td><b>ID Pelajar</b></td>
      <td><b>Password</b></td>
      <td><b>Nama Pelajar</b></td>
      <td><b>Jantina</b></td>
    </tr>
    <?php

    $no = 1;
    $data1 = mysqli_query($hubung, "SELECT * FROM pengguna
WHERE idpengguna='$jumpakp'
ORDER BY nama ASC");
    while ($info1 = mysqli_fetch_array($data1)) {
    ?>
      <tr>
        <td width="5%">
          <p id="td1"><?php echo $no; ?></p>
        </td>
        <td width="15%">
          <p id="td1"><?php echo $info1['idpengguna']; ?></p>
        </td>
        <td width="20%">
          <p id="td1"><?php echo $info1['password']; ?></p>
        </td>
        <td width="30%">
          <p id="td1"><?php echo $info1['nama']; ?></p>
        </td>
        <td width="20%">
          <p id="td1"><?php echo $info1['jantina']; ?></p>
        </td>
      </tr>
    <?php $no++;
    } ?>
  </table>

  <!--Tamat Hasil Carian-->

  <br>
  <main>
    <table width="70%" border="0" align="center" style='font-size:16px'>
      <tr>
        <td width="5%"><b> Bil. </b></td>
        <td width="15%"><b> ID Pelajar </b></td>
        <td width="20%"><b> Password </b></td>
        <td width="30%"><b> Nama Pelajar </b></td>
        <td width="10%"><b> Jantina </b></td>
        <td width="10%"><b> Tindakan </b></td>
      </tr>
      <hr>
      <?php
      $no = 1;
      $data1 = mysqli_query($hubung, "SELECT * FROM pengguna WHERE aras = 'PELAJAR' ORDER BY nama ASC");
      while ($info1 = mysqli_fetch_array($data1)) {
      ?>
        <tr>
          <td>
            <p id="td1"> <?php echo $no; ?> </p>
          </td>
          <td>
            <p id="td1"> <?php echo $info1['idpengguna']; ?></p>
          </td>
          <td>
            <p id="td1"> <?php echo $info1['password']; ?></p>
          </td>
          <td>
            <p id="td1"> <?php echo $info1['nama']; ?></p>
          </td>
          <td>
            <p id="td1"> <?php echo $info1['jantina']; ?></p>
          </td>
          <td><a href="hapus_pelajar.php?idpengguna=<?php echo preg_replace('/[\x80-\xFF]/', '', $info1['idpengguna']); ?>" onclick="return confirm ('AWAS!, Semua rekod yang berkaitan akan dihapuskan , Anda Pasti?')">
              <button id="delete">HAPUS</button></td>
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

      <!--Sekiranya Tiada Carian-->
    <?php } else { ?>

      <?php include 'menu.php'; ?>

      <center>
        <p id="p1"> SENARAI PELAJAR BERDAFTAR</p>
      </center>
      <div id="carian">
        <form method="post">
          <b>CARIAN NO.K/P:</b>
          <input type="text" name="carikp" maxLength='12' autofocus>
          <input id="butangcarian" type="submit" name="SUBMIT" value="CARI">
        </form>
      </div>

      <br>
      <main>
        <table width="70%" border="0" align="center" style='font-size:16px'>
          <tr>
            <td width="5%"><b> Bil. </b></td>
            <td width="15%"><b> ID Pelajar </b></td>
            <td width="20%"><b> Password </b></td>
            <td width="30%"><b> Nama Pelajar </b></td>
            <td width="10%"><b> Jantina </b></td>
            <td width="10%"><b> Tindakan </b></td>
          </tr>
          <hr>
          <?php
          $no = 1;
          $data1 = mysqli_query($hubung, "SELECT * FROM pengguna WHERE aras = 'PELAJAR' ORDER BY nama ASC");
          while ($info1 = mysqli_fetch_array($data1)) {
          ?>
            <tr>
              <td>
                <p id="td1"> <?php echo $no; ?> </p>
              </td>
              <td>
                <p id="td1"> <?php echo $info1['idpengguna']; ?></p>
              </td>
              <td>
                <p id="td1"> <?php echo $info1['password']; ?></p>
              </td>
              <td>
                <p id="td1"> <?php echo $info1['nama']; ?></p>
              </td>
              <td>
                <p id="td1"> <?php echo $info1['jantina']; ?></p>
              </td>
              <td><a href="hapus_pelajar.php?idpengguna=<?php echo preg_replace('/[\x80-\xFF]/', '', $info1['idpengguna']); ?>" onclick="return confirm ('AWAS!, Semua rekod yang berkaitan akan dihapuskan , Anda Pasti?')">
                  <button id="delete">HAPUS</button></td>
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
        <?php } ?>

        <!DOCTYPE html>
        <html lang="en" dir="ltr">

        <head>
          <meta charset="utf-8">
          <title></title>
        </head>

        <body>
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
              margin-left: 20px;
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

            b {
              font-family: "DIN Next LT Pro Bold";
            }

            hr {
              width: 1070px;
            }

            #td1 {
              font-family: "DIN Next LT Pro Light";
              margin: 0;
              font-size: 16px;
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
              box-shadow: none;
              margin-left: 230px;
            }

            #button1:hover {
              cursor: pointer;
              background-color: white;
              color: black;
            }

            #carian {
              padding-left: 231px;
              margin: 0;
              outline: none;
            }

            #h2 {
              font-family: "Feather Bold";
              font-size: 25px;
              padding-right: 880px;
            }

            #butangcarian {
              background-color: black;
              border: none;
              color: white;
              padding: 5px 10px;
              text-align: center;
              font-family: "Feather Bold";
              display: inline-block;
              font-size: 12px;
              border-radius: 10px;
              border-color: white;
              border: 2px solid black;
            }

            #butangcarian:hover {
              cursor: pointer;
              background-color: white;
              color: black;
            }
          </style>
        </body>
        </html>