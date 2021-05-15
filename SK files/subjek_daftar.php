<?php
require 'sambung.php';
require 'keselamatan.php';
require 'header.php';
 ?>

 <?php
if (isset($_POST['submit'])) {
  $nom_subjek = $_POST['nom_subjek'];
  $subjek_baru = $_POST['subjek'];
  $query = "INSERT INTO subjek (idsubjek,subjek) values ('$nom_subjek' , '$subjek_baru')";
  $insert_row = mysqli_query($hubung , $query);

  echo <script>alert('Subjek baru telah ditambah');
  window.location = 'subjek_senarai.php'</script>;
}

$query = "SELECT * FROM subjek";
$subjek = mysqli_query($hubung,$query);
$total = mysqli_num_rows($subjek);
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
     <center><h2>DAFTAR SUBJEK</h2></center>
     <main>
       <table width = "70%" border = "0" align = "center">
         <tr>
           <td>
             <form method = "post">
               <p>
                 <label>Subjek ke-</label><?php echo $next; ?>
                 <input type="text" value="<?php echo $next; ?>" name = "nom_subjek" hidden>
               </p>
               <p>
                 <label>Subjek :</label>
                 <input type="text" name="subjek" size = "40" required>
               </p>
               <p>
                  <input type="submit" name="submit" value="DAFTAR">
               </p>
             </form>
           </td>
         </tr>
       </table>
     </main>
     <?php include 'footer.php'; ?>
   </body>
 </html>
