<?php
require 'sanmbung.php';
require 'keselamatan.php';
include 'header.php';
 ?>

 <?php
session_start();
  ?>

  <?php
$topik_pilihan = $_SESSION['pilih_topik'];

$dataTopik = mysqli_query($hubung , "SELECT * FROM soalan AS q
INNER JOIN topik AS t ON t.idtopik = q.topik
INNER JOIN subjek AS s ON s.idsubjek = q.idsoalan
WHERE t.idtopik = $topik_pilihan GROUP BY q.idsoalan");

$getSoalan = mysqli_fetch_array($dataTopik);
$total = mysqli_num_rows($dataTopik);

$number = (int) $_GET['n'];

$query1 = mysqli_query($hubung , "SELECT * FROM soalan WHERE
nom_soalan = $number AND idtopik = $topik_pilihan");
$question - mysqli_fetch_assoc($query1);

$query2 = mysqli_query($hubung, "SELECT * FROM pilihan AS c
INNER JOIN soalan AS q ON c.soalan = q.idsoalan
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
       <h2>Subjek: <?php echo $getSoalan['subjek']; ?></h2>
       <h3>Subjek: <?php echo $getSoalan['topik']; ?></h3>
       <table width = "70%" border = "0" align = "center">
         <tr>
           <td>
             <hr>
             <?php
             if($number == 1){
               echo "Sila baca soalan dengan teliti";
             }
             else if{
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
           <td>
             <hr> Soalan <?php echo $number; ?> dari <?php echo $total; ?>
             <br>
             <?php echo $question['soalan']; ?> <br>
             <?php
             if ($question['gambarajah'] == NULL) {
               // code...
             }
             else {
               echo "<img src = 'gambar/".$question['gambarajah']."'
               width = '30%' height = '30%'>";
             }
              ?>
              <form action="soalan_semak.php" method="post">
                <ul>
                  <?php while ($row = mysqli_fetch_assoc($choices)): {
                    // code...
                  } ?>
                  <li><input name = "choice" type = "radio" value="<?php echo $row['idpilihan']; ?>" required> <?php echo $row['pilihan_jawapan']; ?></li>
                <?php endwhile; ?>
                </ul>
                <input type="submit" value="Pilih">
                <input type="hidden" name="number" value="<?php echo $number; ?>">
                <input type="hidden" name="idsoalan" value="<?php echo $question['idsoalan']; ?>">
              </form>
           </td>
         </tr>
       </table>
       <?php include 'footer.php'; ?>
     </body>
   </html>
