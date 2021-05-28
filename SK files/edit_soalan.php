<?php
require 'sanmbung.php';
require 'keselamatan.php';
include 'header.php';
 ?>

 <?php
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
      <center><h2>KEMASKINI SOALAN</h2></center>
      <main>
        <table width = "70%" borde = "0" align = "center">
          <tr>
            <td>
              <form action="save_edit_soalan.php" method="POST" enctype="multipart/form-data">
                <p>
                  <label>Soalan ke- <?php echo $nom_soalan; ?></label>
                  <input type="text" name="idsoalan" value="<?php echo $soalan_terpilih; ?>" readonly hidden>
                </p>
                <p>
                  <label>Soalan</label>
                  <textarea id="paparan_soalan" name="paparan_soalan" rows="7" cols="105" autofocus> <?php echo $soalan; ?></textarea>
                </p>
                <p>
                  <label> Gambar <br>
                  <?php
                  if ($gambarajah == NULL) {
                    echo "-TIADA-";
                  }
                  else {
                    echo "<img src='gambar/".$gambarajah"' width = '30%' height = '30%'> ";
                  }
                   ?>
                   <input type="text" name="gambarAsal" value="<?php echo $gambarajah; ?>" readonly hidden>
                   <br>
                   <br><small style="color:red">*Jika perlu</small>
                   </label>
                   <input type="file" name="gambar">
                </p>
                <?php
                $no = 1;
                $pilihan = mysqli_query($hubung, "SELECT * FROM pilihan
                AS a INNER JOIN soalan AS q ON q.idsoalan = a.idsoalan WHERE
                q.idsoalan= $soalan_terpilih");
                while ($dataPilihan = mysqli_fetch_array($pilihan)) {
                ?>
                <p>
                  Pilihan <?php echo $no; ?>
                </p>
                <p>
                  <?php
                  if ($dataPilihan['jawapan'] == '1') {
                    echo "Jawapan :";
                    echo $dataPilihan['pilihan_jawapan'];
                  }
                   ?>
                </p>
                <?php $no++; }?>
                <p>
                  <input type="submit" name="submit" value="KEMASKINI">
                  <input type="button" value="BATAL" onclick="history.back()">
                </p>
              </form>
            </td>
          </tr>
        </table>
      </main>
      <?php include 'footer.php'; ?>
    </body>
  </html>
