
<?php

	if ($user_id) {
		header("location:".BASE_URL."index.php?page=main");
	}

?>

<div class="container page-login">
	<div class="row login">
		
		<form action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST" class="col-md-12">

			<div class="d-flex justify-content-center">
				<?php

					$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

					if ($notif == true) {
						echo "<div class='alert alert-danger' role='alert'> Maaf, email atau password yang anda masukan salah ! </div>";
					}
				?>
			</div>
			
			<div class="col-md-4 offset-md-4 form-login	">
				<label>Email</label>
				<span><input type="text" name="email" class="form-control" /></span>
			</div>
			
			<div class="col-md-4 offset-md-4 password form-login">
				<label>Password</label>
				<span><input type="password" name="password" class="form-control"></span>
			</div>
			
			<div class="col-md-4 offset-md-4 form-login">
				<span><input type="submit" name="submit" value="login" class="btn tombol-action"></span>
			</div>

			<div class="d-flex justify-content-center form-login" role="alert">
				<p class="col-md-4 text-center alert alert-info">Harap Register <a href="<?php echo BASE_URL."index.php?page=register"; ?>" class="alert-link">Di sini.</a></p>
			</div>

		</form>

	</div>
</div>