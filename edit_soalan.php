<?php

//Fail untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

//Fail header standard
include 'header.php';
?>

<?php

//Mendapat rekod soalan yang ingin diubah
$soalan_terpilih = $_GET['idsoalan'];
$pilihSoalan = mysqli_query($hubung, "SELECT * FROM soalan WHERE idsoalan = $soalan_terpilih");
while ($dataSoalan = mysqli_fetch_array($pilihSoalan)) {
  $nom_soalan = $dataSoalan['nom_soalan'];
  $soalan = $dataSoalan['soalan'];
  $gambarajah = $dataSoalan['gambarajah'];
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
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
      font-size: 18px;
      margin: 0;
      padding-right: 30px;
    }

    #p1 {
      font-family: "Feather Bold";
      font-size: 40px;
      margin-top: 20px;
      margin-bottom: 20px;
    }

    #paparan_soalan {
      background-color: #ECEBE4;
      border-radius: 10px;
      border: 2px solid black;
      padding: 10px;
    }

    #paparan_soalan:focus {
      outline: none !important;
      border: 3px solid black;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1)
    }

    #cipta {
      background-color: #00ff00;
      border: none;
      color: black;
      padding: 8px 20px;
      text-align: center;
      font-family: "Feather Bold";
      display: inline-block;
      font-size: 12px;
      border-radius: 10px;
      border: 2px solid #00ff00;
      height: 40px;
    }

    #cipta:hover {
      cursor: pointer;
      background-color: white;
      color: black;
    }

    #cipta1 {
      background-color: red;
      border: none;
      color: black;
      padding: 8px 20px;
      text-align: center;
      font-family: "Feather Bold";
      display: inline-block;
      font-size: 12px;
      border-radius: 10px;
      border: 2px solid red;
      box-shadow: none;
      margin-left: 10px;
      height: 40px;
    }

    #cipta1:hover {
      cursor: pointer;
      background-color: white;
      color: black;
    }
  </style>
  <center>
    <p id="p1">KEMASKINI SOALAN</p>
  </center>
  <br>
  <br>
  <main>
    <table width="100%" border="0" align="center">
      <tr width="100%" align="center">
        <td>

          <!-- Form di mana semua perubahan direkod sebelum dihantar ke database -->
          <form action="save_edit_soalan.php" method="POST" enctype="multipart/form-data">
            <p>
              <label>Soalan ke- <?php echo $nom_soalan; ?></label>
              <input type="text" name="idsoalan" value="<?php echo $soalan_terpilih; ?>" readonly hidden>
            </p>
            <br>
            <p>
              <label>Soalan</label>
            </p>
            <p>
              <textarea id="paparan_soalan" name="paparan_soalan" rows="7" cols="105" autofocus> <?php echo $soalan; ?></textarea>
            </p>
            <br>
            <br>
            <p>
              <label> Gambar :
                <?php
                if ($gambarajah == NULL) {
                  echo "-TIADA-";
                } else {
                  echo "<img src = 'gambar/$gambarajah' width='30%' height='30%' alt = '*Gambar*' />";
                }
                ?>
                <input type="text" name="gambarAsal" value="<?php echo $gambarajah; ?>" readonly hidden>
                <br>
                <br><small style="color:red">*Jika perlu</small>
              </label>
              <input type="file" name="gambar">
            </p>
            <br>

            <!-- Mendapat serta memaparkan jawapan soalan -->
            <?php
            $no = 1;
            $pilihan = mysqli_query($hubung, "SELECT * FROM pilihan
                AS a INNER JOIN soalan AS q ON q.idsoalan = a.idsoalan WHERE
                q.idsoalan= $soalan_terpilih");
            while ($dataPilihan = mysqli_fetch_array($pilihan)) {
              if ($dataPilihan['jawapan'] == '1') {
                $jawapan =  $dataPilihan['pilihan_jawapan'];
              }
            ?>
              <p>
                Pilihan <?php echo $no; ?> : <?php echo $dataPilihan['pilihan_jawapan']; ?>
              </p>
            <?php $no++;
            } ?>
            <br>
            <p> Jawapan : <?php echo $jawapan; ?></p>
            <br>

            <!-- Butang untuk mengemaskini soalan -->
            <p>
              <input id="cipta" type="submit" name="submit" value="KEMASKINI">
              <input id="cipta1" type="button" value="BATAL" onclick="history.back()">
            </p>
            <br>
            <br>
          </form>
        </td>
      </tr>
    </table>
  </main>
  <center>
    <font style="font-size:13px; margin-right:20px;"> COPYRIGHT &copy; 2021 </font>
  </center>
  <br>
  <br>
</body>

</html>