<?php
		
	$materi_id = isset($_GET['materi_id']) ? $_GET['materi_id'] : false;

	$judul = "";
	$kategori_id = "";
	$isi = "";
	$status = "";
	$tanggal = "";
	$tag = "";
	$gambar = "";
	$button = "Add";
	$keterangan_gambar = "";

	if ($materi_id) {
		$queryKategori = mysqli_query($koneksi, "SELECT * FROM materi WHERE materi_id='$materi_id' ");
		$row = mysqli_fetch_assoc($queryKategori);
		
		$judul = $row['judul'];
		$kategori_id = $row['kategori_id'];
		$isi = $row['isi'];
		$status = $row['status'];
		$tanggal = $row['tanggal'];
		$tag = $row['tag'];
		$gambar = $row['gambar'];
		$button = "Update";

		$keterangan_gambar = "(Klik \"Choose File\" Jika ingin mengganti gambar)";
		$gambar = "<img src='".BASE_URL."assets/images/$gambar' style='width: 200px; vertical-align: middle; margin-top: 10px;' />";
	}

?>

<div class="row">
	<script type="text/javascript" src="<?php echo BASE_URL."assets/js/ckeditor/ckeditor.js" ?>"></script>

	<form action="<?php echo BASE_URL."module/materi/action.php?materi_id=$materi_id"; ?>" method="POST" enctype="multipart/form-data" class="col-md-12">
		
		<div class="element-form">
			<label>Kategori</label>
			<span>
				<select name="kategori_id" class="form-control">
					<?php
						$query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC ");
						while ($row = mysqli_fetch_assoc($query)) {
							if ($kategori_id == $row['kategori_id']) {
								echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
							} else {
								echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
							}
						}
					?>
				</select>
			</span>
		</div>

		<div class="element-form">
			<label>Judul</label>
			<span><input type="text" name="judul" class="form-control" value="<?php echo $judul; ?>"></span>
		</div>	

		<div class="element-form">
			<label >Isi</label>
			<span><textarea name="isi" id="editor" class="form-control"> <?php echo $isi; ?> </textarea></span>
		</div>

		<div class="element-form">
			<label>Tanggal</label>
			<span><input type="date" name="tanggal" class="form-control" value="<?php echo $tanggal; ?>"></span>
		</div>

		<div class="element-form">
			<label>Tag</label>
			<span><input type="text" name="tag" class="form-control" value="<?php echo $tag; ?>"></span>
		</div>
		
		<div class="element-form">
			<label>Gambar konten <?php echo $keterangan_gambar; ?></label>
			<span>
				<input type="file" name="gambar" class="form-control">
				<?php echo $gambar; ?>
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

<!-- <script type="text/javascript">
	//CKEDITOR.replace("editor");

	var roxyFileman = 'assets/js/ckeditor/fileman/index.html';
	$(function(){
		CKEDITOR.replace( 'editor',{filebrowserBrowseUrl:roxyFileman,
									 filebrowserImageBrowseUrl:roxyFileman+'?type=image',
									 removeDialogTabs: 'link:upload;image:upload'});
	});
</script> -->

<script>
	//CKEDITOR.replace("editor");
	
	var roxyFileman = 'assets/js/ckeditor/fileman/index.html'; 
	$(function(){
	   CKEDITOR.replace( 'editor',{filebrowserBrowseUrl:roxyFileman,
	                                filebrowserImageBrowseUrl:roxyFileman+'?type=image',
	                                removeDialogTabs: 'link:upload;image:upload'}); 
	});
</script>