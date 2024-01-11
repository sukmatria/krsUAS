<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Data Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>

</head>
<body>
	<?php
	require "head.html";
	require "fungsi.php";
	?>
	<div class="utama">		
		<br><br><br>		
		<h3>Mata Kuliah Ditawarkan</h3>	
		<form method="post" action="sv_addTawar.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="idMatkul">Nama Mata Kuliah :</label>
				<select class="form-control" name="idMatkul" id="idMatkul">
					<?php 
						$sql = "select idmatkul, namamatkul from matkul order by namamatkul";
						$qry = mysqli_query($koneksi, $sql);
						while($hsl=mysqli_fetch_row($qry)) {
							echo "<option value=$hsl[0]>$hsl[1]</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="dosen">Dosen :</label>
				<select class="form-control" name="dosen" id="dosen">
					<?php 
						$sql = "select npp, namadosen from dosen order by namadosen";
						$qry = mysqli_query($koneksi, $sql);
						while($hsl=mysqli_fetch_row($qry)) {
							echo "<option value=$hsl[0]>$hsl[1]</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="kelompok">Kelompok :</label>
				<input class="form-control" type="text" name="kelompok" id="kelompok">
			</div>
			<div class="form-group">
				<label for="hari">Hari :</label>
				<select class="form-control" name="hari" id="hari">
					<?php 
						$hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu');
						for($i=0; $i<count($hari); $i++) {
							echo "<option value=$hari[$i]>$hari[$i]</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="jamkul">Jam Kuliah :</label>
				<select class="form-control" name="jamkul" id="jamkul">
					<?php 
						$jam = array('07.00-08.40', '08.40-10.20', '10.20-12.00', '12.30-14.10', '14.10-16.20', '16.20-18.00', '18.30-20.10');
						for($i=0; $i<count($jam); $i++) {
							echo "<option value=$jam[$i]>$jam[$i]</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="ruang">Ruang :</label>
				<input class="form-control" type="text" name="ruang" id="ruang">
			</div>
			<div>		
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
	<!--
	<script>
		$(document).ready(function(){
			$('#butsave').on('click',function(){			
				$('#butsave').attr('disabled', 'disabled');
				var nim 	= $('#nim').val();
				var nama	= $('#nama').val();
				var email 	= $('#email').val();
				
				$.ajax({
					type	: "POST",
					url		: "sv_addMhs.php",
					data	: {
								nim:nim,
								nama:nama,
								email:email
							  },
					contentType	:"undefined",					
					success : function(dataResult){						
						alert('success');
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html(dataResult);	
					}	   
				});
			});
		});
	</script>
	-->	
</body>
</html>