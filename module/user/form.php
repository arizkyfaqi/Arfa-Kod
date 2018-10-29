<?php

	$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

	$button = "Update";
	$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id' ");

	$row = mysqli_fetch_assoc($queryUser);

	$nama = $row["nama"];
	$email = $row["email"];
	$status = $row["status"];
	$level = $row["level"];


?>
<div class="row">
	<form action="<?php echo BASE_URL."module/user/action.php?user_id=$user_id"?>" method="POST" class="col-md-12" >
	
		<div class="element-form">
			<label>Nama</label>	
			<span><input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" /></span>
		</div>		

		<div class="element-form">
			<label>Email</label>	
			<span><input type="text" name="email" class="form-control" value="<?php echo $email; ?>" /></span>
		</div>	

		<div class="element-form">
			<label>Level</label>	
			<span>
				<input type="radio" name="level" value="superadmin" <?php echo ($level == "superadmin") ? "checked='true'" : false; ?> /> Superadmin
				<input type="radio" name="level" value="customer" <?php echo ($level == "customer") ? "checked='true'" : false; ?> /> Customer
			</span>
		</div>

		<div class="element-form">
			<label>Status</label>	
			<span>
				<input type="radio" name="status" value="on" <?php echo ($status == "on") ? "checked='true'" : false; ?> /> On
				<input type="radio" name="status" value="off" <?php echo ($status == "off") ? "checked='true'" : false; ?> /> Off
			</span>
		</div>

		<div class="element-form">
			<span><input type="submit" name="button" class="btn tombol-action" value="<?php echo $button; ?>" /></span>
		</div>			

	</form>
</div>