<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
// mendapatkan kode dari File updateDsn saat tombol delete ditekan 
$id=$_GET["kode"];

//membuat query hapus data
$sql="delete from dosen where npp='$id'";
mysqli_query($koneksi,$sql);
header("location:homeAdmin.php");
?>