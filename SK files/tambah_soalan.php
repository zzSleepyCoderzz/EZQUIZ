<?php
require 'sambung.php';
require 'keselamatan.php';
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

  if($insert_row){
    foreach ($pilihan as $pilihan_jawapan => $pilih) {
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

  echo "<script>alert('Soalan baru telah berjaya ditambah');
  window.location='tambah_soalan.php?idtopik=$idtopik'</script>";


}

$topik_pilihan = $_GET['idtopik'];
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
       <style media="screen">
       body{
         background-color: #ECEBE4;
       }

       #p1{
         font-family: "Feather Bold";
         font-size: 40px;
         margin-top: 20px;
         margin-bottom: 20px;
       }

       #p2{
         font-size: 18px;
         font-family: "DIN Next LT Pro Light";
       }

       #p3{
         margin-left: 40px;
         font-size: 18px;
         font-family: "DIN Next LT Pro Light";
       }

       #p4{
         font-size: 18px;
         font-family: "DIN Next LT Pro Light";

       }

       hr{
         width : 1070px;
       }

       b{
         font-family: "DIN Next LT Pro Bold";
       }

       #papar{
         background-color: #F0A202;
         border: none;
         color: white;
         padding: 8px 20px;
         text-align: center;
         font-family: "Feather Bold";
         display: inline-block;
         font-size: 12px;
         border-radius: 10px;
         border: 2px solid #F0A202;
         margin: 0;
       }

       #papar:hover{
         cursor: pointer;
         background-color: white;
         color: black;
         box-shadow: none;
       }

       #paparan_soalan{
         background-color: #ECEBE4;
         border-radius: 10px;
         border: 2px solid black;
         padding: 10px;
       }

       #paparan_soalan:focus{
         outline: none !important;
         border: 3px solid black;
         box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1)
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

       #inputjawapan{
         background-color: #ECEBE4;
         border-radius: 5px;
         border: 3px solid #2DD881;
         height: 20px;
       }

       #inputjawapan:focus{
         outline: none !important;
         border: 3.5px solid #2DD881;
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
         margin-right: 5px;
         height: 40px;
       }

       #cipta:hover{
         cursor: pointer;
         background-color: white;
         color: black;
       }

       #cipta1{
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
         height: 40px;
       }

       #cipta1:hover{
         cursor: pointer;
         background-color: white;
         color: black;
       }
       </style>
     <center><p id = "p1">TAMBAH SOALAN</p></center>
     <main>
       <table width = "100%" border = "0" align = "center">
         <tr>
           <td align = "center">
             <form method="post" enctype="multipart/form-data">
               <p>
                 <label id = "p2">Soalan :</label>
                 <input type="text" name="nom_soalan" value="<?php echo $next; ?>" size="5" readonly>
                 <input type="text" name="idtopik" value="<?php echo $topik_pilihan; ?>" hidden>
               </p>
               <p>
                 <textarea placeholder="Taip Soalan Anda Di Sini..."name="paparan_soalan" rows="7" cols="105" id="paparan_soalan" required></textarea>
               </p>
               <p>
                 <label id = "p2">Gambar :</label>
                 <small style="color:red">*Jika perlu</small>
                 <input type="file" name="gambar">
               </p>
               <br>
               <br>
               <p>
                 <label id = "p2">Pilihan 1:</label>
                 <input id = "inputpilihan" type="text" name="pilih1" size="50">
                 <label id = "p3">Pilihan 2:</label>
                 <input id = "inputpilihan"type="text" name="pilih2" size="50">
               </p>
               <p>
                 <label id = "p2" >Pilihan 3:</label>
                 <input id = "inputpilihan" type="text" name="pilih3" size="50">
                 <label id = "p3">Pilihan 4:</label>
                 <input id = "inputpilihan"type="text" name="pilih4" size="50">
               </p>
               <br>
               <p>
                 <label id = "p2">Pilihan Jawapan [1-4]:</label>
                 <input id = "inputjawapan" type="text" name="jawapan_betul" size="5" required>
               </p>
               <p>
                 <input id = "cipta" type="submit" name="submit" value="CIPTA">
                 <button id = "cipta1" onclick = "window.location.href='pilih_subjek.php'" > TAMAT </button>
               </p>
             </form>
           </td>
         </tr>
       </table>
     </center>
       <br>
       <br>
       <center>
         <font style = "font-size:13px"> COPYRIGHT &copy; 2021 </font>
       </center>
       <br>
       <br>
     </main>
   </body>
 </html>
