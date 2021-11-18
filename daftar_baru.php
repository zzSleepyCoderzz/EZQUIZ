<?php
//Fail untuk sambung ke database
require 'sambung.php';

//Fail header halaman utama
include 'header1.php';


//Semak sekiranya pengguna wujud
if (isset($_POST['idpengguna'])) {
  $idpengguna = $_POST['idpengguna'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $jantina = $_POST['jantina'];
  $daftar = "INSERT INTO pengguna (idpengguna, password, nama, jantina, aras) VALUES ('$idpengguna', '$password', '$nama', '$jantina', 'PELAJAR')";
  $hasil = mysqli_query($hubung, $daftar);

  //Jika pengguna wujud
  if ($hasil) {
    echo "<script>alert('Pendaftaran berjaya');
    window.location = 'login.php'</script>";
  }

  //Jika pengguna tidak wujud
  else {
    echo "<script>alert('Pendaftaran gagal');
      window.location = 'daftar_baru.php'</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <br>
  <br>

  <!-- Fail menu halaman utama -->
  <?php include 'menu1.php'; ?>
</head>

<body>

  <!-- Bahagian css -->
  <style>
    body {
      background-color: #ECEBE4;
      margin: 0;
      overflow: scroll;
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
    }

    #div1 {
      background-color: #ECEBE4;
      justify-content: space-between;
      display: flex;
      width: 12%;
      padding-right: 50px;
    }

    #div2 {
      padding-left: 300px;
    }

    #div3 {
      padding-left: 300px;
    }

    #daftarbutton {
      background-color: black;
      border: none;
      color: white;
      padding: 8px 20px;
      text-align: center;
      font-family: "Feather Bold";
      display: inline-block;
      font-size: 12px;
      border-radius: 10px;
      border-color: white;
      border: 2px solid black;
    }

    #daftarbutton:hover {
      cursor: pointer;
      background-color: white;
      color: black;
    }

    #inputid {
      background-color: #ECEBE4;
      border: 0;
      border-bottom: 2px solid grey;
      border-radius: 2px;
      height: 30px;
      background-image: url("id.png");
      background-repeat: no-repeat;
      background-size: 30px;
      padding-left: 30px;
    }

    #inputid:focus {
      outline: none !important;
      border: 0;
      border-bottom: 3px solid #555;
      border-radius: 3px;
      height: 30px;
    }

    #inputpin {
      background-color: #ECEBE4;
      border: 0;
      border-bottom: 2px solid grey;
      border-radius: 2px;
      height: 30px;
      background-image: url("pin.png");
      background-repeat: no-repeat;
      background-size: 30px;
      padding-left: 30px;
    }

    #inputpin:focus {
      outline: none !important;
      border: 0;
      border-bottom: 3px solid #555;
      border-radius: 3px;
      height: 30px;
    }

    #inputname {
      background-color: #ECEBE4;
      border: 0;
      border-bottom: 2px solid grey;
      border-radius: 2px;
      height: 30px;
      background-image: url("name.png");
      background-repeat: no-repeat;
      background-size: 30px;
      padding-left: 30px;
    }

    #inputname:focus {
      outline: none !important;
      border: 0;
      border-bottom: 3px solid #555;
      border-radius: 3px;
      height: 30px;
    }

    .dropdown {
      font-family: "DIN Next LT Pro Light";
      height: 30px;
      width: 120px;
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      padding: 12px 16px;
      z-index: 1;
    }
  </style>

  <center style="margin-left:20px;margin-top:30px;">
    <p id="p1">PENDAFTARAN PENGGUNA BARU</p>
  </center>
  <center>
    <br>
    <br>
    <table width="100%" border="0" align="center">
      <tr>
        <td align="center">

          <!-- Form yang mengandungi semua maklumat yang perlu diisi -->
          <form method="POST">

            <!-- ID Pengguna -->
            <div id="div2">
              <p>ID Pengguna</p>
            </div>
            <div id="div2">
              <p><input id="inputid" onblur="checkLength(this)" maxlength = "12" type="text" name="idpengguna" placeholder="Tanpa tanda -"  size="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required> </p>
            </div>
            <br>
            <br>
            <!-- Fungsi menyemak samada ID Pengguna adalah 12 digit -->
            <script>
              function checkLength(el) {
                if (el.value.length != 12) {
                  alert("ID Pengguna mesti 12 digit")
                }
              }
            </script>

            <!-- Kata Laluan -->
            <div id="div2">
              <p>Kata Laluan</p>
            </div>
            <div id="div2">
              <p><input id="inputpin" type="password" name="password" placeholder="4 digit sahaja" maxlength="4" size="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></p>
            </div>
            <br>
            <br>

            <!-- Nama Penuh -->
            <div id="div2">
              <p>Nama Penuh</p>
            </div>
            <div id="div2">
              <p><input id="inputname" type="text" name="nama" size="30" placeholder="Nama Penuh Anda" required></p>
            </div>
            <br>
            <br>
            <div id="div2">
              <p>Jantina</p>
            </div>

            <!-- Jantina -->
            <div id="div3">
              <select class="dropdown" name="jantina">
                <option value="">---Pilih----</option>
                <option value="LELAKI">LELAKI</option>
                <option value="PEREMPUAN">PEREMPUAN</option>
              </select>
            </div>
            <br>
            <br>

            <!-- Butang untuk daftar -->
            <div id="div1">
              <button id="daftarbutton" type="submit">DAFTAR</button>
              <button id="daftarbutton" type="reset">RESET</button>
            </div>
          </form>
        </td>
      </tr>
    </table>
  </center>
  <br>
  <br>
  <center style="margin-right:20px;">
    <font style="font-size:13px"> COPYRIGHT &copy; 2021 </font>
  </center>
  <br>
  <br>
</body>

</html>