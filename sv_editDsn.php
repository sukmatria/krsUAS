<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$id=$_POST["npp1"];
$namaDsn=$_POST["namaDsn1"];
$homebase=$_POST["homebase1"];
$uploadOk=1;

//membuat query
$sql="update dosen set namadosen='$namaDsn',
					 homebase='$homebase'
					 where npp='$id'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateDsn.php");
?>