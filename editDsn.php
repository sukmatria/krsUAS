<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Edit Data Dosen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "fungsi.php";
	require "head.html";
	// mendapatkan kode dari File updateDsn saat tombol edit ditekan
	$id=$_GET['kode'];
	$sql="select * from dosen where npp='$id'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">EDIT DATA DOSEN</h2>	
		<div class="row">
		<div class="col-sm-12">
			<form enctype="multipart/form-data" method="post" action="sv_editDsn.php">
				<div class="form-group">
					<label for="npp">NPP</label>
					<!-- value diset untuk mendapatkan baris nilai NIP yang ada pada database -->
					<input class="form-control" type="text" name="npp" id="npp" value="<?php echo $row['npp']?>" readonly>
				</div>
				<div class="form-group">
					<label for="namaDsn">Nama Dosen :</label>
					<input class="form-control" type="text" name="namaDsn" id="namaDsn" value="<?php echo $row['namadosen']?>">
				</div>
				<div class="form-group">
					<label for="homebase">Homebase :</label>
					<select name="homebase" id="homebase" class="form-control">
						<option value="A11">A11 - S1 Teknik Informatika</option>
						<option value="A12">A12 - S1 Sistem Informasi</option>
						<option value="A14">A14 - S1 DKV</option>
						<option value="A15">A15 - S1 Ilmu Komunikasi</option>
						<option value="A16">A16 - D4 Film dan Televisi</option>
						<option value="A22">A22 - D3 Teknik Informatika</option>
					</select>
				</div>				
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
				<input type="hidden" name="id" id="id" value="<?php echo $id?>">
			</form>
		</div>
		</div>
	</div>
	<script>
		// saat button submit ditekan maka akan mengirimkan ajax ke file sv_editDsn.php
		$('#submit').on('click',function(){
			var npp 	    = $('#npp').val();
			var namaDsn	    = $('#namaDsn').val();
			var homebase 	= $('#homebase').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editDsn.php",
				data	: {npp1:npp, namaDsn1:namaDsn, homebase1:homebase}
			});
		});
	</script>
</body>
</html>