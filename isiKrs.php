<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik::Pengisian KRS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
	<!-- Use fontawesome 5-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script>
		/*function cetak(hal) {
		  var xhttp;
		  var dtcetak;	
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  dtcetak= this.responseText;
			}
		  };
		  xhttp.open("GET", "ajaxUpdateMhs.php?hal="+hal, true);
		  xhttp.send();
		}*/
	</script>
</head>

<body>
	<?php
	session_start();
	//memanggil file berisi fungsi2 yang sering dipakai
	require "fungsi.php";
	require "head.html";

	/*	---- cetak data per halaman ---------	*/

	//--------- konfigurasi

	//jumlah data per halaman
	// $jmlDataPerHal = 3;

	//cari jumlah data
	if (isset($_POST['cari'])) {
		$cari = $_POST['cari'];
		$sql = "select * from matkul as m, dosen as d, kultawar as k 
            where k.idmatkul=m.idmatkul and
                  k.npp = d.npp
                  having
                  namamatkul like '%$cari%' or
                  namadosen like '%$cari%'";
	} else {
		$sql = "select * from matkul as m, dosen as d, kultawar as k
    where k.idmatkul = m.idmatkul and
    k.npp = d.npp";
	}
	$qry = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	$jmlData = mysqli_num_rows($qry);

	// $jmlHal = ceil($jmlData / $jmlDataPerHal);
	// if (isset($_GET['hal'])){
	// 	$halAktif=$_GET['hal'];
	// }else{
	// 	$halAktif=1;
	// }

	// $awalData=($jmlDataPerHal * $halAktif)-$jmlDataPerHal;

	//Jika tabel data kosong
	$kosong = false;
	if (!$jmlData) {
		$kosong = true;
	}
	//data berdasar pencarian atau tidak
	if (isset($_POST['cari'])) {
		$cari = $_POST['cari'];
		$sql = "select * from matkul as m, dosen as d, kultawar as k 
                        where k.idmatkul=m.idmatkul and
                          k.npp = d.npp
                          having
						  namamatkul like '%$cari%' or
                          namadosen like '%$cari%'";
	} else {
		$sql = "select * from matkul as m, dosen as d, kultawar as k 
    where k.idmatkul = m.idmatkul and
    k.npp = d.npp";
	}
	//Ambil data untuk ditampilkan
	$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

	?>
	<div class="utama">
		<h2 class="text-center">Pengisi KRS Semester Genap</h2>
		<h2 class="text-center">2023/2024</h2>
		<!-- <span class="float-left">
		<a class="btn btn-success" href="addTawar.php">Tambah Data</a>
	</span> -->
		<span class="float-left">
			<form action="" method="post" class="form-inline">
				<button class="btn btn-warning" type="submit">Cari</button>
				<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data Penawaran..." autofocus autocomplete="off">
			</form>
		</span>
		<br><br>
		<!-- <ul class="pagination"> -->
		<?php
		//navigasi pagination
		//cetak navigasi back
		// if ($halAktif>1){
		// 	$back=$halAktif-1;
		// 	echo "<li class='page-item'><a class='page-link' href=?hal=$back>&laquo;</a></li>";
		// }
		// //cetak angka halaman
		// for($i=1;$i<=$jmlHal;$i++){
		// 	if ($i==$halAktif){
		// 		echo "<li class='page-item'><a class='page-link' href=?hal=$i style='font-weight:bold;color:red;'>$i</a></li>";
		// 	}else{
		// 		echo "<li class='page-item'><a class='page-link' href=?hal=$i>$i</a></li>";
		// 	}	
		// }
		// //cetak navigasi forward
		// if ($halAktif<$jmlHal){
		// 	$forward=$halAktif+1;
		// 	echo "<li class='page-item'><a class='page-link' href=?hal=$forward>&raquo;</a></li>";
		// }
		?>
		<!-- </ul>	 -->
		<!-- Cetak data dengan tampilan tabel -->
		<div style="background-color: lightblue; height: 300px; overflow: scroll;" class="py-5 px-3">
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th>No.</th>
						<th>Mata Kuliah</th>
						<th>Dosen</th>
						<th>Jadwal Hari</th>
						<th>Jadwal Jam</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//jika data tidak ada
					if ($kosong) {
					?>
						<tr>
							<th colspan="6">
								<div class="alert alert-info alert-dismissible fade show text-center">
									<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
									Data tidak ada
								</div>
							</th>
						</tr>
						<?php
					} else {
						$no = 1;
						while ($row = mysqli_fetch_assoc($hasil)) {
						?>
							<tr>
								<td><?php echo $no ?></td>
								<td id="nmMatkul<?php echo $no ?>"><?php echo $row["namamatkul"] ?></td>
								<td id="namaDosen<?php echo $no ?>"><?php echo $row["namadosen"] ?></td>
								<td id="Hari<?php echo $no ?>"><?php echo $row["hari"] ?></td>
								<td id="JamKul<?php echo $no ?>"><?php echo $row["jamkul"] ?></td>
								<td>
									<a class="btn btn-danger" onclick="addlist(<?php echo $no ?>)">Pilih</a>
								</td>
							</tr>
					<?php
							$no++;
						}
					}
					?>
				</tbody>
			</table>
		</div>
		<div class="mt-4">
			<h2 class="text-center">Mata Kuliah Yang Dipilih</h2>
			<table class="table table-hover" id="daftar">
				<thead class="thead-dark">
					<tr>
						<th>Mata Kuliah</th>
						<th>Dosen</th>
						<th>Jadwal Hari</th>
						<th>Jadwal Jam</th>
					</tr>
				</thead>
			</table>
			<button type="submit" class="btn btn-dark" value="Simpan" onclick="saveData()">Simpan</button>
		</div>
	</div>
	<script>
		var itemSession = {
			nmMatkul : [],
			nmDsn : [],
			hari : [],
			jam : [],
		}
		function addlist(no) {
			var nmkul = $("#nmMatkul" + no).text();
			sessionStorage.setItem('nmkul', nmkul); 
			var nmdsn = $("#namaDosen" + no).text();
			sessionStorage.setItem('nmdsn', nmdsn);
			var hari = $("#Hari" + no).text();
			sessionStorage.setItem('hari', hari);
			var jam = $("#JamKul" + no).text();
			sessionStorage.setItem('jam', jam);
			itemSession['nmMatkul'].push(sessionStorage.getItem('nmkul'));
			itemSession['nmDsn'].push(sessionStorage.getItem('nmdsn'));
			itemSession['hari'].push(sessionStorage.getItem('hari'));
			itemSession['jam'].push(sessionStorage.getItem('jam'));
			var itemSessionString = JSON.stringify(itemSession);
			sessionStorage.setItem('itemSession', itemSessionString);
			var item = "<tr><td id=nmkul" + no + ">" + nmkul + "</td><td id=nmdsn" + no + ">" + nmdsn + "</td><td id=hari" + no + ">" + hari + "</td><td id=jam" + no + ">" + jam + "</td></tr>";
			$("#daftar").append(item);
		}
		function saveData() {
			var itemSes = sessionStorage.getItem('itemSession');
			// Menggunakan Ajax untuk mengirim data ke server (PHP)
			$.ajax({
            	type: 'POST',
            	url: 'sv_addKrs.php',
            	data: { itemSession: itemSes },
            	success: function(response) {
                	console.log(response); // Output dari server
                	// Handle respons sesuai kebutuhan Anda
            	},
            	error: function(error) {
                	console.error(error);
            	}
        	});
		}
	</script>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>

</html>