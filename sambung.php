<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "ezquiz";
$hubung = mysqli_connect ($host , $user, $password, $database );
if (mysqli_connect_errno()){
  echo "Proses sambung ke pangkalan data gagal";
  exit();
}

$nama_sekolah = "SMK (L) METHODIST, JALAN HANG JEBAT";
$nama_sistem = "ADVANCE-SISTEM PENILAIAN KENDIRI";
$title = "EZQUIZ";
$lencana = "lencana.jpg";
 ?>

 <script type="text/javascript">
 var num = 0;
 var newcolor = "#32CD32";
 var colors = ["#A9F8FB" , "#3DDC97" , "#B2FFA9" ,"#160F29" , "#020100" ,"#336699" , "#9EE493" , "#9046CF" ,"E8998D" , "#EED2CC" ,"#A1683A" ,"red" , "green" , "#F1D302" , "#32CD32"];
 function color(){
   newcolor = colors[num];
   document.getElementById('header1').style.backgroundColor = newcolor;
   var x = document.getElementsByClassName( "menu1button" );
   for( var i = 0; i < x.length; i++ ) {
     x[i].style.backgroundColor= newcolor;
   }

   var y = document.getElementsByClassName( "button" );
   for( var i = 0; i < y.length; i++ ) {
     y[i].style.backgroundColor= newcolor;
   }


    if(num >= colors.length-1){
      num = 0;
    }
    else{
      num += 1;
    }
 }
 </script>
