<?php
require 'sambung.php';
require 'keselamatn.php';
include 'header.php';
 ?>

<?php
if(isset($_POST['submit'])){
  if($_FILES['gambar']['name'] == NULL){
    $newnamepic = "";
  }
  else {
    $gambar = $_FILES['gambar']['name'];
    $imageArr = explode('.',$gambar);
    $random = rand(10000 , 99999);
    $newnamepic = $imageArr[0].$random.'.'.$imageArr[1];
    $uploadPath = "gambar/".$newnamepic;
    $isUploaded = move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadPath);
  }

  $nom_soalan = $_POST['nom_soalan'];
  $idtopik = $_POST['idtopik'];
  $soalan = $_POST['paparan_soalan'];
  $jawapan_betul = $_POST['jawapan_betul'];

  $pilihan = array();
  $pilihan[1] = $_POST['pilih1'];
  $pilihan[2] = $_POST['pilih2'];
  $pilihan[3] = $_POST['pilih3'];
  $pilihan[4] = $_POST['pilih4'];

  $query = "INSERT INTO soalan(nom_soalan , soalan, gambarajah, idtopik)
  values ('$nom_soalan','$soalan','$newnamepic','$idtopik')";
  $insert_row = mysqli_query($hubung, $query);
  $last_id = mysqli_insert_id($hubung);

  echo "<script>alert('Soalan baru telah berjaya ditambah');
  window.location = tambah_soalan.php?idtopik = $idtopik";

  if($insert_row){
    foreach ($pilihan as $pilihan_jawapan => $pilh) {
      if($pilih != ''){
        if ($jawapan_betul == $pilihan_jawapan) {
          $jawapan = 1;
        }
        else{
          $jawapan = 0;
        }
        $query = "INSERT INTO pilihan (nom_soalan,jawapan,pilihan_jawapan,idsoalan)
        values ('$nom_soalan', '$jawapan', '$pilih', '$last_id')";
        $insert_row = mysqli_query($hubung , $query);
      }
    }
  }
}

$topik_pilihan = $_GET['topik'];
$_SESSION['topik_semasa'] = $topik_pilihan;

$query = "SELECT * FROM soalan WHERE idtopik = '$topik_pilihan'";
$soalan = mysqli_query($hubung , $query);
$total = mysqli_num_rows($soalan);
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
     <center><h2>TAMBAH SOALAN</h2></center>
     <main>
       <table width = "70%" border = "0" align = "center">
         <tr>
           <td>
             <form method="post" enctype="multipart/form-data">
               <p>
                 <label>Bilangan Soalan</label>
                 <input type="text" name="nom_soalan" value="<?php echo $next; ?>" size="5" readonly>
                 <input type="text" name="id_topik" value="<?php echo $topik_pilihan; ?>" hidden>
               </p>
               <p>
                 <label>Soalan</label>
                 <textarea name="paparan_soalan" rows="7" cols="105" id="paparan_soalan" required></textarea>
               </p>
               <p>
                 <label>Gambar</label>
                 <small style="color:red">*Jika perlu</small>
                 <input type="file" name="gambar">
               </p>
               <p>
                 <label>Pilihan 1:</label>
                 <input type="text" name="pilih1" size="50">
               </p>
               <p>
                 <label>Pilihan 2:</label>
                 <input type="text" name="pilih2" size="50">
               </p>
               <p>
                 <label>Pilihan 3:</label>
                 <input type="text" name="pilih3" size="50">
               </p>
               <p>
                 <label>Pilihan 4:</label>
                 <input type="text" name="pilih4" size="50">
               </p>
               <p>
                 <label>Pilihan Jawapan [1-4]:</label>
                 <input type="text" name="jawapan_betul" size="5" required>
               </p>
               <p>
                 <input type="submit" name="submit" value="CIPTA">
                 <button onclick = "window.location.href = 'index2.php'"> TAMAT </button>
               </p>
             </form>
           </td>
         </tr>
       </table>
     </main>
     <?php include 'footer.php'; ?>
   </body>
 </html>
