<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

$guru = $_SESSION['idpengguna'];
 ?>

<?php if (isset($_POST['submit'])){
  $nom_soalan = $_POST['nom_soalan'];
  $topik = $_POST['paparan_topik'];
  $idsubjek = $_POST['subjek'];
  $markah = $_POST['markah'];

  $query = "INSERT INTO topik (idtopik, topik, markah, idsubjek, idpengguna)
  VALUES (NULL, '$topik' , '$markah', '$idsubjek', '$guru')";
  $insert_row = mysqli_query($hubung , $query);
  $last_id = mysqli_insert_id($hubung);

  echo "<script>alert('Topik baru telah ditambah');
  window.location = 'tmabah_soalan.php?idtopik= $last_id'</script>";
}
$subjek_pilihan = $_GET['idsubjek'];

$query = "SELECT * FROM topik WHERE idsubjek = '$subjek_pilihan'";
$topik = mysqli_query($hubung , $query);
$total = mysqli_num_rows($topik);
$next = $total+1;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'menu.php'; ?>
  </head>
  <body>
    <center><h2> TAMBAH TOPIK</h2></center>
    <main>
      <table width = "70%" border = "0" align = "center">
        <tr>
          <td>
            <form action="tambah_topik.php" method="post">
              <p>
                <label> SUBJEK </label>
                <?php
                $result = mysqli_query($hubung , "SELECT * FROM subjek
                WHERE idsubjek = '$subjek_pilihan'");
                while ($res = mysqli_fetch_array($result)) {
                  $paparsubjek = $res['subjek'];
                }
                echo $paparsubjek;
                 ?>
              </p>
              <p>
                <label> BILANGAN TOPIK</label>
                <?php echo $next; ?>
                <input type="text" name="nom_soalan" value="<?php echo $next; ?>" hidden>
              </p>
              <p>
                <label> TOPIK </label>
                <input type="text" name="paparan_topik" size="60" required>
              </p>
              <p>
                <label> MARKAH </label>
                <input type="text" name="markah" size="10" required>
              </p>
              <p>
                <input type="submit" name="submit" value="TAMBAH" required>
              </p>
            </form>
          </td>
        </tr>
      </table>
    </main>
    <?php include 'footer.php'; ?>
  </body>
</html>
