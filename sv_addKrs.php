<?php
session_start();
//memanggil file pustaka fungsi
require "fungsi.php";
// Menerima data dari Ajax
$itemSessionString = $_POST['itemSession'];

// Menyimpan data ke session PHP
$_SESSION['itemSession'] = $itemSessionString;
if(isset($_SESSION['itemSession'])) {
    $itemSessionObject = json_decode($itemSessionString, true);
    for($i = 0; $i < count($itemSessionObject['nmMatkul']); $i++) {
        $nmMatkul = $itemSessionObject['nmMatkul'][$i];
        $nmDsn = $itemSessionObject['nmDsn'][$i];
        $hari = $itemSessionObject['hari'][$i];
        $jamData = $itemSessionObject['jam'][$i];
        $jamArray = explode('-', $jamData);
        $jamMulai = $jamArray[0];
        $jamSelesai = $jamArray[1];
        $thnAkademik = mysqli_query($koneksi, "select thAkd from jadwal where namaMatkul='$nmMatkul' and hari1='$hari' and mulai1='$jamMulai' and selesai1='$jamSelesai'");
        $nim = $_SESSION['username'];
        $idMatkul = mysqli_query($koneksi, "select idmatkul from matkul where namaMatkul='$nmMatkul'");
        $nppDosen = mysqli_query($koneksi, "select npp from dosen where namadosen='$nmDsn'");
        $hariKuliah = $hari;
        $jamKuliah = $jamData;
        // Ambil nilai dari hasil query
        $thnAkademik = mysqli_fetch_assoc($thnAkademik)['thAkd'];
        $idMatkul = mysqli_fetch_assoc($idMatkul)['idmatkul'];
        $nppDosen = mysqli_fetch_assoc($nppDosen)['npp'];

        $sql="insert krs values('', '$thnAkademik','$nim','$idMatkul','NULL','$nppDosen','$hariKuliah','$jamKuliah')";
        mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    }
} else {
    echo '<script languange="javascript">
			alert("Gagal Memasukan Data KRS");
			window.location="isiKrs.php";
			</script>';
			exit();
}
header("location:isiKrs.php");
?>