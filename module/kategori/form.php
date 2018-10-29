<?php
	
	$kategori_id = isset($_GET['kategori_id']) ? $_GET ['kategori_id'] : false;

 	$kategori = "";
 	$status = "";
 	$button = "Add";

 	if ($kategori_id) {
 		$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id' ");
 		$rowKategori = mysqli_fetch_assoc($queryKategori);

 		$kategori = $rowKategori['kategori'];
 		$status = $rowKategori['status'];
 		$button = "Update";
 	}
		
?>

<div class="row">
	<form action="<?php echo BASE_URL."module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="POST" class="col-md-12">
		
		<div class="col-md-12 element-form">
			<label>Kategori</label>
			<span><input class="form-control" type="text" name="kategori" value="<?php echo $kategori; ?>" ></span>
		</div>

		<div class="col-md-12 element-form">
			<label>Status</label>
			<span>
				<input type="radio" name="status" value="on" <?php echo ($status == "on") ? "checked='true'" : false; ?> /> On
				<input type="radio" name="status" value="off" <?php echo ($status == "off") ? "checked='true'" : false; ?> /> Off
			</span>
		</div>

		<span class="col-md-12 element-form"><input class="btn tombol-action" type="submit" name="button" value="<?php echo $button; ?>"></span>

	</form>
</div>