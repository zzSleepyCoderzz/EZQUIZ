<?php

//Fail untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

//Fail  header halaman utama
require 'header.php';
?>

<?php

//Jika butang daftar subjek ditekan
if (isset($_POST['submit'])) {
  $nom_subjek = $_POST['nom_subjek'];
  $subjek_baru = $_POST['subjek'];
  $query = "INSERT INTO subjek (idsubjek,subjek) values ('$nom_subjek' , '$subjek_baru')";
  $insert_row = mysqli_query($hubung, $query);

  //Mesej jika berjaya
  echo "<script>alert('Subjek baru telah ditambah');
  window.location = 'subjek_senarai.php'</script>";
}

//Dapatkan semua subjek yang didaftar
$query = "SELECT * FROM subjek";
$subjek = mysqli_query($hubung, $query);
$total = mysqli_num_rows($subjek);
$next = $total + 1;
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

  <!-- Bahagian CSS -->
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
      font-size: 24px;
      font-family: "DIN Next LT Pro Light";
    }

    #p3 {
      font-size: 18px;
      font-family: "DIN Next LT Pro Bold";
    }

    #daftar {
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
      height: 40px;
    }

    #daftar:hover {
      cursor: pointer;
      background-color: white;
      color: black;
    }

    #daftar1 {
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
      margin-right: 5px;
      height: 40px;
      width: 100px;
    }

    #daftar1:hover {
      cursor: pointer;
      background-color: white;
      color: black;
    }

    #inputsubjek {
      background-color: #ECEBE4;
      border-radius: 5px;
      border: 2px solid #A89B9D;
      height: 20px;
    }

    #inputsubjek:focus {
      outline: none !important;
      border: 3px solid #111D4A;
    }
  </style>

  <center>
    <p id="p1">DAFTAR SUBJEK</p>
  </center>
  <main>
    <center>

      <!-- Form di mana semua maklumat subjek baru mesti diisi-->
      <form method="post">

        <!-- Subjek ke-berapa-->
        <p>
          <label id="p2">Subjek ke- <?php echo $next; ?></label>
          <input type="text" value="<?php echo $next; ?>" name="nom_subjek" hidden>
        </p>

        <!-- Nama Subjek -->
        <p>
          <label id="p3">Subjek :</label>
          <input id="inputsubjek" type="text" name="subjek" size="30" required>
        </p>
        <br>
        <br>

        <!-- Butang untuk submit -->
        <p>
          <input id="daftar" type="submit" name="submit" value="DAFTAR">
          <input id="daftar1" onclick="window.history.back()" value="PULANG">
        </p>
      </form>
      <center>
  </main>
  <center style="margin-top:100px;">
  </center>
  <?php include 'footer.php'; ?>
</body>

</html>