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

  $query = "INSERT INTO topik (topik, markah, idsubjek, idpengguna)
  VALUES ('$topik' , '$markah', '$idsubjek', '$guru')";
  $insert_row = mysqli_query($hubung , $query);
  $last_id = mysqli_insert_id($hubung);

  echo "<script>alert('Topik baru telah ditambah');
  window.location='tambah_soalan.php?idtopik=$last_id&topik=$topik'</script>";
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
    <style media="screen">
    body{
      background-color: #ECEBE4;
    }

    p{
      font-family: "DIN Next LT Pro Light";
      font-size: 18px;
      margin : 0;
      padding-right: 30px;
    }

    #p1{
      font-family: "Feather Bold";
      font-size: 40px;
      margin-top: 20px;
      margin-bottom: 20px;
    }
    label{
      font-family: "DIN Next LT Pro Bold";
    }

    #cipta{
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
      margin-right: 10px;
      height: 40px;
    }

    #cipta:hover{
      cursor: pointer;
      background-color: white;
      color: black;
    }

    #inputpilihan{
      background-color: #ECEBE4;
      border-radius: 5px;
      border: 2px solid #A89B9D;
      height: 20px;
    }

    #inputpilihan:focus{
      outline: none !important;
      border: 3px solid #111D4A;
    }

    </style>
    <center><p id = "p1"> TAMBAH TOPIK</p></center>
    <br>
    <br>
    <main>
      <table width = "30%" border = "0" align = "center">
        <tr align = "center">
          <td align = "left">
            <form action="tambah_topik.php" method="post">
              <p>
                <label> SUBJEK : </label>
                <?php
                $result = mysqli_query($hubung , "SELECT * FROM subjek
                WHERE idsubjek = '$subjek_pilihan'");
                while ($res = mysqli_fetch_array($result)) {
                  $paparsubjek = $res['subjek'];
                }
                echo $paparsubjek;
                 ?>
                 <input type="text" value="<?php echo $subjek_pilihan; ?>" name="subjek" hidden/>
              </p>
              <p style="margin-top:5px;">
                <label> BILANGAN TOPIK : </label>
                <?php echo $next; ?>
                <input  type="text" name="nom_soalan" value="<?php echo $next; ?>" hidden>
              </p>
              <p style="margin-top:5px;">
                <label> TOPIK : </label>
                <input id = "inputpilihan" type="text" name="paparan_topik" size="50" required>
              </p>
              <p style="margin-top:5px;">
                <label> MARKAH : </label>
                <input id = "inputpilihan" type="text" name="markah" size="10" required>
              </p>
              <tr>
                <td width = "10%" align = "center">
                  <br>
                  <br>
                  <input id="cipta" type="submit" name="submit" value="TAMBAH">
                </td>
              </tr>
            </form>
          </td>
        </tr>
      </table>
    </main>
     <center style="margin-top:30px;"><?php include 'footer.php'; ?></center>
  </body>
</html>
