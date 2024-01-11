<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$npp=$_POST["npp"];
$npptahun=$_POST["nppTahun"];
$namaDsn=$_POST["namaDsn"];
$homebase=$_POST["homebase"];
$nppOtomatis="0686.11.$npptahun.$npp";
$uploadOk=1;
$cekNPP=mysqli_num_rows(mysqli_query($koneksi, "select npp from dosen where npp='$nppOtomatis'"));
// Check jika terjadi kesalahan
if ($uploadOk == 0) {
    echo "Maaf, file tidak dapat terupload<br>";
// jika semua berjalan lancar
} else {   
    //membuat query
	if($cekNPP > 0) {
		echo '<script languange="javascript">
			alert("Kode NPP sudah ada yang menggunakan");
			window.location="addDsn.php";
			</script>';
			exit();
	} else {
		$sql="insert dosen values('$nppOtomatis','$namaDsn','$homebase')";
		mysqli_query($koneksi,$sql);
		header("location:addDsn.php");
		//echo "File ". basename( $_FILES["foto"]["name"]). " berhasil diupload";
	} 
}
?>