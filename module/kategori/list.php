<div class="frame-tamabah">
	<a href="<?php echo BASE_URL."index.php?page=halaman_admin&module=kategori&action=form"; ?>" class="btn tombol-action btn-kategori" >+ Tambah Kategori</a>
</div>

<div class="row">
	<div class="col-md-12 text-center">
		<?php

			$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
			$data_per_halaman = 5;
			$mulai_dari = ($pagination-1) * $data_per_halaman;

			$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori ASC LIMIT $mulai_dari, $data_per_halaman");

			if (mysqli_num_rows($queryKategori) == 0) {
				echo "<h4>Saat ini belum ada kategori di dalam tabel kategori</h4>";
			} else {

				echo "<table class='table table-striped table-hover'>";

				echo "<tr>
							<th>No</th>
							<th>Kategori</th>
							<th>Status</th>
							<th>Action</th>
					 </tr>";

				$no=1;
				while ($row=mysqli_fetch_assoc($queryKategori)) {
					
					echo "<tr>
								<td>$no</td>
								<td>$row[kategori]</td>
								<td>$row[status]</td>
								<td>
									<a href='".BASE_URL."index.php?page=halaman_admin&module=kategori&action=form&kategori_id=$row[kategori_id]' class='btn tombol-action' >Edit</a>
									<a href='".BASE_URL."module/kategori/action.php?button=Delete&kategori_id=$row[kategori_id]' class='btn tombol-action' >Delete</a>
								</td>
						  </tr>";
						  $no++;
				}

				echo "</table>";

				$queryHitungKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
				pagination($queryHitungKategori, $data_per_halaman, $pagination, "index.php?page=halaman_admin&module=kategori&action=list");
			}

		?>		
	</div>
</div>

