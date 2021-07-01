<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
 ?>


<?php
$topik_pilihan = $_SESSION['pilih_topik'];

$dataTopik = mysqli_query($hubung , "SELECT * FROM soalan AS q
INNER JOIN topik AS t ON t.idtopik = q.idtopik
INNER JOIN subjek AS s ON s.idsubjek = t.idsubjek
WHERE t.idtopik = $topik_pilihan GROUP BY q.idsoalan");

$getSoalan = mysqli_fetch_array($dataTopik);
$total = mysqli_num_rows($dataTopik);

$number = (int) $_GET['n'];

$query1 = mysqli_query($hubung , "SELECT * FROM soalan WHERE
nom_soalan = $number AND idtopik = $topik_pilihan");
$question = mysqli_fetch_assoc($query1);

$query2 = mysqli_query($hubung, "SELECT * FROM pilihan AS c
INNER JOIN soalan AS q ON c.idsoalan = q.idsoalan
WHERE q.nom_soalan = $number AND c.idsoalan = $question[idsoalan]");

$choices = $query2;
   ?>

   <!DOCTYPE html>
   <html lang="en" dir="ltr">
     <head>
       <meta charset="utf-8">
       <title></title>
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
         font-family: "DIN Next LT Pro Bold";
         font-size: 28px;
       }

       #p3{
         font-family: "DIN Next LT Pro Light";
         font-size: 20px;
         margin:0;
       }

       #pilih{
         padding: 10px 20px;
         font-size: 16px;
         text-align: center;
         cursor: pointer;
         outline: none;
         color: black;
         background-color: #00ff00;
         border: none;
         border-radius: 15px;
         box-shadow: 0 4px #999;
         font-family: "Feather Bold";
       }

       #pilih:hover{
         cursor: pointer;
       }

       #pilih:active {
         background-color: #3e8e41;
         box-shadow: 0 5px #666;
         transform: translateY(4px);
       }
       </style>
       <center>
       <p id = "p1">Subjek: <?php echo $getSoalan['subjek']; ?></p>
       <p id = "p2">Topik : <?php echo $getSoalan['topik']; ?></p>
       </center>
       <center>
       <table width = "70%" border = "0" align = "center">
         <tr>
           <td align = "center">
             <hr>
             <?php
             if($number == 1){
               echo "<p style ='font-weight:1000;margin:0;'>Sila baca soalan dengan teliti</p>";
             }
             else{
               $jawapan = $_GET['semakan'];
               if ($jawapan == "TEPAT") {
                 echo "Tahniah, jawapan bagi soalan";
                 echo $number-1;
                 echo " adalah <font color = 'blue' size = '+3'> TEPAT </font>";
               }
             else {
                 echo "Maaf, jawapan bagi soalan";
                 echo $number-1;
                 echo " adalah <font color = 'red' size = '+3'> SALAH </font>";
               }
             }
              ?>
           </td>
         </tr>
         <tr>
           <td align = "center">
             <hr><p style ='font-weight:1000;margin:0;'>Soalan <?php echo $number; ?> dari <?php echo $total; ?></p>
             <br>
             <br>
             <p id = "p3"><?php echo $question['soalan']; ?></p><br>
             <?php
             if ($question['gambarajah'] == NULL) {
              echo "<p>-TIADA GAMBAR-</p>";
             }
             else {
               echo "<img src = 'gambar/".$question['gambarajah']."'
               width = '30%' height = '30%'>";
             }
              ?>
              <form action="soalan_semak.php" method="post">
                  <?php while ($row = mysqli_fetch_assoc($choices)): ?>
                  <input  name = "choice" type = "radio" value="<?php echo $row['idpilihan']; ?>" required> <?php echo $row['pilihan_jawapan']; ?>
                <?php endwhile; ?>
                <br>
                <br>
                <input id = "pilih" type="submit" value="PILIH">
                <input type="hidden" name="number" value="<?php echo $number; ?>">
                <input type="hidden" name="idsoalan" value="<?php echo $question['idsoalan']; ?>">
              </form>
           </td>
         </tr>
       </table>
      </center>
      <center style="margin-top:40px;">
       <?php include 'footer.php'; ?>
      </center>
     </body>
   </html>
