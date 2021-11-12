<?php

//Fail mengandungi semua info untuk sambung ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "ezquiz";

//Kod untuk hubun ke database
$hubung = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
  echo "Proses sambung ke pangkalan data gagal";
  exit();
}

//Info sistem
$nama_sekolah = "SMK (L) METHODIST, JALAN HANG JEBAT";
$nama_sistem = "ADVANCE-SISTEM PENILAIAN KENDIRI";
$title = "EZQUIZ";
$lencana = "lencana.jpg";
?>


<script type="text/javascript">

  //Array warna yang tersedia
  var colors = ["#A9F8FB", "#3DDC97", "#B2FFA9", "#160F29", "#020100", "#336699", "#9EE493", "#9046CF", "E8998D", "#EED2CC", "#A1683A", "red", "green", "#F1D302", "#32CD32"];
  
  //Fungsi menukar warna
  function color() {

    var newcolor = colors[localStorage.getItem("colour")];
    document.getElementById("header1").style.backgroundColor = newcolor;

    var x = document.getElementsByClassName("menu1button");
    for (var i = 0; i < x.length; i++) {
      x[i].style.backgroundColor = newcolor;
    }

    var y = document.getElementsByClassName("button");
    for (var i = 0; i < y.length; i++) {
      y[i].style.backgroundColor = newcolor;
    }


  }

  //Fungsi merekod warna yang telah dipilih oleh pengguna
  function increment() {
    if (localStorage.getItem("colour") == "NaN") {
      localStorage.setItem("colour", 0);
    } else {
      if (localStorage.getItem("colour") >= colors.length - 1) {
        localStorage.setItem("colour", 0);
      } else {
        localStorage.setItem("colour", parseInt(localStorage.getItem("colour")) + 1);
      }
      location.reload();
    }
  }
</script>