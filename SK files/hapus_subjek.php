<?php
require 'sambung,php';
require 'keselamtan.php';
$del_subjek = $_GET['idsubjek'];
$delete1 = mysqli_query($hubung , "SELECT * FROM subjek AS s
  INNER JOIN topik AS t ON s.idsubjek = t.idsubjek
  INNER JOIN soalan AS q ON t.idsubjek = q.idtopik
  INNER JOIN perekodan AS r ON t.idsubjek = r.idtopik
  INNER JOIN pilihan AS c ON q.idsubjek = c.idsoalan
  WHERE s.idsubjek = $del_subjek");
$infoDel = mysqli_fetch_array($delete1);
$delete1 = $del_subjek;
$delete2 = $infoDel['idtopik'];

$hapuskan1 = mysqli_query($hubung , "DELETE FROM subjek WHERE idsubjek = '$delete1' ");
$hapuskan2 = mysqli_query($hubung , "DELETE FROM topik WHERE idsubjek = '$delete1' ");
$hapuskan3 = mysqli_query($hubung , "DELETE FROM soalan WHERE idtopik = '$delete2' ");
$hapuskan4 = mysqli_query($hubung , "DELETE FROM pilihan WHERE idtopik = '$delete2' ");
$hapuskan5 = mysqli_query($hubung , "DELETE FROM perekodan WHERE idtopik = '$delete2' ");

echo "<script>alert('Hapus Subjek berjaya');
window.location = 'subjek_senarai.php'</script>";
?>
