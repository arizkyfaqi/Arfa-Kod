<?php
	
	if ($user_id) {
		header("location:".BASE_URL);
	}

?>
<div class="container register">
	<div class="row register">

		<form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST" class="col-md-12">

			<div class="d-flex justify-content-center">
				<?php
					$notif = isset($_GET['notif']) ? $_GET['notif'] : false; 
					$nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false; 
					$email = isset($_GET['email']) ? $_GET['email'] : false;

					if ($notif == "require") {
					 	echo "<div class='alert alert-warning' role='alert'> Anda harus melengkapi form dibawah !</div>";
					 } elseif ($notif == "password") {
					 	echo "<div class='alert alert-warning' role='alert'> Password yang anda masukan tidak sama ! </div>";
					 } elseif ($notif == "email") {
					 	echo "<div class='alert alert-warning' role='alert'> Email yang anda masukan sudah terdaftar !</div>";
					 }
				?>
			</div>

			<div class="form-register col-md-4 offset-md-4">
				<label>Nama</label>
				<span><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" class="form-control" /></span>
			</div>		

			<div class="form-register col-md-4 offset-md-4">
				<label>Email</label>
				<span><input type="text" name="email" value="<?php echo $email; ?>" class="form-control" /></span>
			</div>
			
			<div class="form-register col-md-4 offset-md-4">
				<label>Password</label>
				<span><input type="password" name="password" class="form-control" /></span>
			</div>
			
			<div class="form-register col-md-4 offset-md-4">
				<label>Re-type Password</label>
				<span><input type="password" name="re_password" class="form-control" /></span>
			</div>	
			
			<div class="form-register col-md-4 offset-md-4">
				<span><input type="submit" name="submit" value="register" class="btn tombol-action"></span>
			</div>	
		</form>
		
	</div>
</div>