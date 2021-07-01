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

  echo "<script>alert('Subjek baru telah ditambah');
  window.location = 'subjek_senarai.php'</script>";
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
       font-size: 24px;
       font-family: "DIN Next LT Pro Light";
     }

     #p3{
       font-size: 18px;
       font-family: "DIN Next LT Pro Bold";
     }

     #daftar{
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

     #daftar:hover{
       cursor: pointer;
       background-color: white;
       color: black;
     }

     #inputsubjek{
       background-color: #ECEBE4;
       border-radius: 5px;
       border: 2px solid #A89B9D;
       height: 20px;
     }

     #inputsubjek:focus{
       outline: none !important;
       border: 3px solid #111D4A;
     }

     </style>

     <center><p id = "p1">DAFTAR SUBJEK</p></center>
     <main>
       <center>
             <form method = "post">
               <p>
                 <label id = "p2">Subjek ke- <?php echo $next; ?></label>
                 <input type="text" value="<?php echo $next; ?>" name = "nom_subjek" hidden>
               </p>
               <p>
                 <label id = "p3">Subjek :</label>
                 <input id = "inputsubjek" type="text" name="subjek" size = "30" required>
               </p>
               <br>
               <br>
               <p>
                  <input id = "daftar" type="submit" name="submit" value="DAFTAR">
               </p>
             </form>
       <center>
     </main>
     <center style="margin-top:100px;">
     </center>
     <?php include 'footer.php'; ?>
   </body>
 </html>
