<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Data Dosen</title>
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
	?>
	<div class="utama">		
		<br><br><br>		
		<h3>TAMBAH DATA DOSEN</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addDsn.php" enctype="multipart/form-data">
			<div class="form-group">
				<div class="flex flex-row">
					<label for="npp">NPP:</label>
					<select name="nppTahun" id="nppTahun" class="form-control form-control-sm w-25 d-inline ml-2" required>
        				<?php 
						for($i=1990; $i<=2023; $i++) {
							echo "<option value='$i'>$i</option>";
						}
						?>
      				</select>
				</div>
				<input class="mt-2 form-control" type="text" maxlength="3" placeholder="Input 3 Digit NPP" name="npp" id="npp" required>
			</div>
			<div class="form-group">
				<label for="namaDsn">Nama Dosen:</label>
				<input class="form-control" type="text" name="namaDsn" placeholder="Input Nama Dosen" id="namaDsn">
			</div>
			<div class="form-group">
				<label for="homebase">Homebase:</label>
				<select name="homebase" id="homebase" class="form-control" place>
					<option value="A11">A11 - S1 Teknik Informatika</option>
					<option value="A12">A12 - S1 Sistem Informasi</option>
					<option value="A14">A14 - S1 DKV</option>
					<option value="A15">A15 - S1 Ilmu Komunikasi</option>
					<option value="A16">A16 - D4 Film dan Televisi</option>
					<option value="A22">A22 - D3 Teknik Informatika</option>
				</select>
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