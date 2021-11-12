<?php

//Fail untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

//Fail header selepas log in
include 'header.php';
?>


<?php

//Mengemaskini topik yang dipilih
if (isset($_POST['update'])) {
  $idsubjek = $_POST['idsubjek'];
  $idtopik = $_POST['idtopik'];
  $topikBaru = $_POST['paparan_topik'];
  $markahBaru = $_POST['markah'];

  $result = mysqli_query($hubung, "UPDATE topik SET topik = '$topikBaru',
  markah = '$markahBaru', idsubjek = '$idsubjek' WHERE idtopik = '$idtopik'");

  //Mesej yang dipaparkan sekiranya kemaskini berjaya
  echo "<script>alert('Kemaskini rekod telah berjaya');
  window.location='pilih_subjek.php'</script>";
}
?>

<?php

//Mendapat rekod topik yang ingin diubahsuai
$topikEdit = $_GET['idtopik'];
$pilihTopik = mysqli_query($hubung, "SELECT * FROM topik WHERE idtopik = $topikEdit");
while ($dataTopik = mysqli_fetch_array($pilihTopik)) {

  $pilihSubjek = mysqli_query($hubung, " SELECT * FROM subjek WHERE
  idsubjek = $dataTopik[idsubjek] ");
  $dataSubjek = mysqli_fetch_array($pilihSubjek);

  $idTOPIK = $topikEdit;
  $editTOPIK = $dataTopik['topik'];
  $editMARKAH = $dataTopik['markah'];
}
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

    p {
      font-family: "DIN Next LT Pro Light";
      font-size: 18px;
      margin: 0;
      margin-top: 5px;
      padding-right: 30px;
    }

    #p1 {
      font-family: "Feather Bold";
      font-size: 40px;
      margin-top: 20px;
      margin-bottom: 20px;
    }

    label {
      margin: 0;
    }

    #inputpilihan {
      background-color: #ECEBE4;
      border-radius: 5px;
      border: 2px solid #A89B9D;
      height: 20px;
    }

    #inputpilihan:focus {
      outline: none !important;
      border: 3px solid #111D4A;
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
      margin-right: 5px;
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
      margin-left: 5px;
    }

    #cipta1:hover {
      cursor: pointer;
      background-color: white;
      color: black;
    }
  </style>
  <center>
    <p id="p1">KEMASKINI TOPIK</p>
  </center>
  <main>
    <table width="17%" border="0" align="center" style="font-size:18px; margin-left:650px;">
      <tr>
        <td>

          <!-- Form di mana semua maklumat yang mahu diubahsuai perlu diinput-->
          <form action="edit_topik.php" method="post">

            <!-- Memaparkan senarai subjek yang dicipta -->
            <p>
              <label> Subjek: </label>
              <select name="idsubjek">
                <option selected value="
                     <?php echo $dataTopik['idsubjek']; ?>
                     <?php echo $dataSubjek['subjek']; ?>"></option>

                <?php
                //Mendapat senarai subjek yang dicipta
                $data2 = mysqli_query($hubung, "SELECT * FROM subjek");
                while ($info2 = mysqli_fetch_array($data2)) {
                  echo "<option value = '$info2[idsubjek]'>$info2[subjek]</option>";
                }
                ?>
              </select>
            </p>

            <!-- Memaparkan topik yang asal -->
            <p>
              Topik : <input id="inputpilihan" type="text" name="paparan_topik" size="20" value="<?php echo $editTOPIK; ?>">
            </p>

            <!-- Memaparkan markah yang asal -->
            <p>
              <label>Markah :</label>
              <input id="inputpilihan" type="text" name="markah" size="5%" value="<?php echo $editMARKAH; ?>">
            </p>
            <br>
            <br>

            <!-- Butang kemaskini -->
            <p>
              <input type="hidden" name="idtopik" value="<?php echo $idTOPIK; ?>">
              <input id="cipta" type="submit" name="update" value="KEMASKINI">
              <input id="cipta1" value="BATAL" onclick="history.back()" size="2" type="button">
            </p>
          </form>
        </td>
      </tr>
    </table>
    <br>
    <center>
      <p style="margin-right:3px;margin-top:70px;">
        <font style="font-size:13px; font-family: 'Times New Roman';"> COPYRIGHT &copy; 2021 </font>
      </p>
    </center>
  </main>
</body>

</html>