<!DOCTYPE html>
<html>
<head>
	<title>ARFA-KOD</title>
</head>
<body style="background: #F7F7F7; margin-bottom: 100px; min-height: 600px;">

<div class="row">
	<div class="col-md-12 text-center">
		<div id="kiri">
			<div id="menu-kategori">
				<ul>
				 
				 <?php echo kategori($kategori_id); ?>
					
				</ul>
			</div>
		</div>

		<div id="kanan">
			<div id="slide">
				
			</div>
			
			<div id="frame-materi">
				<ul>
					<?php
						if ($kategori_id) {
							$kategori_id = "AND materi.kategori_id='$kategori_id' ";
						}

						$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
						$data_per_halaman = 9;
						$mulai_dari = ($pagination-1) * $data_per_halaman;

						$queryMateri = mysqli_query($koneksi, "SELECT materi.*, kategori.kategori FROM materi JOIN kategori ON materi.kategori_id=kategori.kategori_id WHERE materi.status='on' $kategori_id ORDER BY rand() LIMIT $mulai_dari, $data_per_halaman");

						$no=1;
						while ($row=mysqli_fetch_assoc($queryMateri)) {

							$style = false;
							if ($no == 3) {
								$style = "style='margin-right:0px;'";
								$no=0;
							}

							echo "
									<li $style>
										<a href='".BASE_URL."index.php?page=detail&materi_id=$row[materi_id]'>
											<div class='gambar'>
												<img src='".BASE_URL."assets/images/$row[gambar]'/>
											</div>
										</a>
									<div class='judul-materi'>
										<p><a href='".BASE_URL."index.php?page=detail&materi_id=$row[materi_id]'>$row[judul]</a></p>
									</div>
									<div class='button-read'>
										<a class='btn tombol-action' href='".BASE_URL."index.php?page=detail&materi_id=$row[materi_id]'>Read more</a>
									</div></li>
									";
						}

						
					?>
				</ul>
			</div>	
			<div class="row col-md-12">
				<?php
				
				$queryHitungMain = mysqli_query($koneksi, "SELECT * FROM materi");				
				pagination($queryHitungMain, $data_per_halaman, $pagination, "index.php?page=main");

				// if ($kategori_id) {
				// 	$queryHitungMain = mysqli_query($koneksi, "SELECT * FROM materi ORDER BY kategori_id='$kategori_id' ");
				// }
				?>
			</div>	
		</div>
	</div>
</div>

</body>
</html>

