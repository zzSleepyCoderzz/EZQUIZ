<?php
require 'sambung.php';
include 'header.php';
if (isset($_POST['idpengguna'])){
  $idpengguna = $_POST['idpengguna'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $jantina = $_POST['jantina'];
  $daftar = "INSERT INTO pengguna (idpengguna, password, nama, jantina, aras) VALUES ('$idpengguna', '$password', '$nama', '$jantina' 'PELAJAR')";
  $hasil = mysqli_query($hubung, $daftar);
  if ($hasil) {
    echo "<script>alert('Pendaftaran berjaya');
    window.location = 'login.php'</script>";
  }
  else{
    echo "<script>alert('Pendaftaran gagal');
    window.location = 'daftar_baru.php'</script>";
  }
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php include 'menu1.php'; ?>
   </head>
   <body>
     <center> <h2>PENDAFTARAN PENGGUNA BARU</h2></center>
     <table width = "70%" border = "0" align = "center">
       <tr>
         <td>
           <form method="POST">
             <label>NOMBOR KAD PENGENALAN</label><br>
             <input onblur = "checkLength(this)" type="text" name="idpengguna" placeholder="Tanpa tanda -" maxlength = "12" size = "25"
             onkeypress="return event.charCode >= 48 && event.charCode <= 57" required autofocus>
             <script>
             function checkLength(el) {
               if (el.value.length) {
                 alert("Nombor KP mesti 12 digit")
               }
             }
             </script>
             <br><label>Katalaluan</label></br>
             <input onblur = "checkLength(this)" type="text" name="idpengguna" placeholder="Tanpa tanda -" maxlength = "12" size = "25"
             onkeypress="return event.charCode >= 48 && event.charCode <= 57" required >
             <br><label>Nama Pelajar</label></br>
             <input type="text" name="nama" size="50" placeholder="Nama Penuh Anda" required><br>
             <label>Jantina</label><br><select  name="jantina">
               <option value="">---Pilih----</option>
               <option value="LELAKI">LELAKI</option>
               <option value="PEREMPUAN">PEREMPUAN</option>
             </select><br>
             <input type="reset" value="Reset">
             <button type="submit">Daftar</button><br>
             <font color = "blue">*Pastikan maklumat anda betul sebelum membuat pendaftaran. </font>
           </form>
         </td>
       </tr>
     </table>
     <?php include 'footer.php'; ?>
   </body>
 </html>
