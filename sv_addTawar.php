<?php 
//memanggil file pustaka fungsi
require "fungsi.php";

$idMatkul = $_POST["idMatkul"];
$nppDosen = $_POST["dosen"];
$kelompok = $_POST["kelompok"];
$hari = $_POST["hari"];
$jamKuliah = $_POST["jamkul"];
$ruang = $_POST["ruang"];

$sql="insert kultawar values('', '$idMatkul','$nppDosen','$kelompok', '$hari', '$jamKuliah', '$ruang')";
mysqli_query($koneksi,$sql);
header("location:isiKrs.php");
?>