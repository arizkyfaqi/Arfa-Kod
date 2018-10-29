<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background: #F7F7F7;">

	<div class="row detail">
	
		<div class="col-md-3 kiri">

			<div id="menu-kategori">
				
				<ul>
					<?php echo kategori($kategori_id); ?>
				</ul>

			</div>

		</div>

		<div class="col-md-9 kanan">
			<?php

				$materi_id = $_GET['materi_id'];

				$queriDetail = mysqli_query($koneksi, "SELECT * FROM materi WHERE materi_id='$materi_id' AND status='on' ");
				$row = mysqli_fetch_assoc($queriDetail);

				echo "	<div id='detail-materi'>
							<h3>$row[judul]</h3>
							<div class='frame-gambar'>
								<img src='".BASE_URL."assets/images/$row[gambar]'/>
							</div>
							<div id='isi'>
								<p>$row[isi]</p>
							</div>
						</div>
					";	

			?>
		</div>

	</div>

</body>
</html>

