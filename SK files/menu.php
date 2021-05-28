<?php if ($_SESSION['level'] == "ADMIN") {?>

  <center>
    <p>
      <a href="index2.php"><button>HOME</button></a>
      <a href="subjek_senarai.php"><button>SENARAI SUBJEK</button></a>
      <a href="guru_senarai.php"><button>SENARAI GURU</button></a>
      <a href="pelajar_senarai.php"><button>SENARAI PELAJAR</button></a>
      <a href="laporan_statistik.php"><button>STATISTIK</button></a>
      <a href="logout.php"><button>LOG OUT</button></a>
    </p>
    <br>
    <?php $pengguna = "DASHBOARD ADMIN"; ?>
  </center>

<?php  } elseif ($_SESSION ['level'] == "GURU") {?>


  <center>
    <p>
      <a href="index2.php"><button>HOME</button></a>
      <a href="pilih_subjek.php"><button>KUIZ</button></a>
      <a href="prestasi_topik.php"><button>PRESTASI</button></a>
      <a href="import_daftar.php"><button>IMPORT</button></a>
      <a href="logout.php"><button>LOG KELUAR</button></a>
    </p>
    <br>
    <?php $pengguna = "DASHBOARD GURU"; ?>
  </center>
<?php }  else {  ?>

  <center>
    <br>
    <p>
      <a href="index2.php"><button>HOME</button></a>
      <a href="kuiz_subjek.php"><button>MULA KUIZ</button></a>
      <a href="skor_individu.php"><button>PRESTASI</button></a>
      <a href="logout.php"><button>KELUAR</button></a>
    </p>
    <br>
    <?php $pengguna = "DASHBOARD PELAJAR" ?>
  </center>

<?php } ?>
