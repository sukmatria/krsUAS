<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Sistem</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<script src="bootstrap4/js/bootstrap.js"></script>
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
</head>
<body>
	<div class="container">
		<div class="w-25 mx-auto text-center mt-5">
			<div class="card bg-dark text-light">
				<div class="card-body">
				<h2 class="card-title">REGISTER</h2>	
				<form method="post" action="">
					<div class="form-group">
						<label for="username">Nama user</label>
						<input class="form-control" type="text" name="username" id="username" autofocus>
					</div>
					<div class="form-group">
						<label for="passw">Password</label>
						<input class="form-control" type="password" name="password" id="passw">
					</div>			
					<div>		
						<button class="btn btn-info" type="submit">Register</button>
					</div>
				</form>
				</div>
			</div>
		</div>	
	</div>
	<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require "fungsi.php";
		$username=$_POST['username'];
		$passw=md5($_POST['password']);
        if(substr($username, 0, 3) == "A12") {
            $status = "mhs";
        } else if(substr($username, 0, 4) == "0686") {
            $status = "dosen";
        } else {
            $status = "admin";
        }
		$sql="insert into user (username, password, status) values ('$username', '$passw', '$status')";
		$hasil=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));

		if (mysqli_affected_rows($koneksi)>0){
			header("location:index.php");
		}else{
			echo "<div class='alert alert-danger w-25 mx-auto text-center mt-1 alert-dismissible'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Maaf, Register Gagal. Ulangi Register.
			</div>";
		}
    }
	?>	
</body>
</html>