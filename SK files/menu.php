
<?php
include 'sambung.php';
if ($_SESSION['level'] == "ADMIN") {
?>

  <center>
    <style media="screen">

    .button:hover{
      cursor: pointer;
      background-color: lightblue;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }
    .button{
      background-color:  #32CD32;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      font-family: "Feather Bold";
      display: inline-block;
      font-size: 16px;
      border-radius: 30px;
    }
    div{
      background-color: #ECEBE4;
      justify-content: space-between;
      display: flex;
      width: 70%;
    }

    </style>
    <br>
    <br>
    <div>
      <a href="index2.php"><button class = "button">HOME</button></a>
      <a href="subjek_senarai.php"><button class = "button">SENARAI SUBJEK</button></a>
      <a href="guru_senarai.php"><button class = "button">SENARAI GURU</button></a>
      <a href="pelajar_senarai.php"><button class = "button">SENARAI PELAJAR</button></a>
      <a href="laporan_statistik.php"><button class = "button">STATISTIK</button></a>
      <a href="logout.php"><button class = "button">LOG OUT</button></a>
    </div>

    <br>
    <?php $pengguna = "DASHBOARD ADMIN"; ?>
  </center>

<?php  } elseif ($_SESSION ['level'] == "GURU") {?>


  <center>
    <style media="screen">

    .button:hover{
      cursor: pointer;
      background-color: lightblue;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }
    .button{
      background-color:  #32CD32;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      font-family: "Feather Bold";
      display: inline-block;
      font-size: 16px;
      border-radius: 30px;
    }
    div{
      background-color: #ECEBE4;
      justify-content: space-between;
      display: flex;
      width: 50%;
    }

    </style>
    <br>
    <br>
    <div>
      <a href="index2.php"><button class = "button">HOME</button></a>
      <a href="pilih_subjek.php"><button class = "button">KUIZ</button></a>
      <a href="prestasi_topik.php"><button class = "button">PRESTASI</button></a>
      <a href="import_daftar.php"><button class = "button">IMPORT</button></a>
      <a href="logout.php"><button class = "button">LOG OUT</button></a>
    </div>
    <br>
    <?php $pengguna = "DASHBOARD GURU"; ?>
  </center>
<?php }  else {  ?>

  <center>
    <style media="screen">

    .button:hover{
      cursor: pointer;
      background-color: lightblue;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }
    .button{
      background-color:  #32CD32;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      font-family: "Feather Bold";
      display: inline-block;
      font-size: 16px;
      border-radius: 30px;
    }
    div{
      background-color: #ECEBE4;
      justify-content: space-between;
      display: flex;
      width: 40%;
    }

    </style>
    <br>
    <br>
    <div>
      <a href="index2.php"><button class = "button">HOME</button></a>
      <a href="kuiz_subjek.php"><button class = "button">MULA KUIZ</button></a>
      <a href="skor_individu.php"><button class = "button">PRESTASI</button></a>
      <a href="logout.php"><button class = "button">LOG OUT</button></a>
    </div>
    <br>
    <?php $pengguna = "DASHBOARD PELAJAR" ?>
  </center>

<?php } ?>
