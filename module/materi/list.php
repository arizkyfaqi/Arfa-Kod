<div class="frame-tamabah">
	<a href="<?php echo BASE_URL."index.php?page=halaman_admin&module=materi&action=form"; ?>" class="btn tombol-action" >+ Tambah Materi</a>
</div>

<div class="row">
	<div class="col-md-12">
		<?php

			$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
			$data_per_halaman = 5;
			$mulai_dari = ($pagination-1) * $data_per_halaman;

			$queryMateri = mysqli_query($koneksi, "SELECT materi.*, kategori.kategori FROM materi JOIN kategori ON materi.kategori_id = kategori.kategori_id ORDER BY tanggal DESC LIMIT $mulai_dari, $data_per_halaman ");

			if (mysqli_num_rows($queryMateri) == 0) {
				echo "<h4>Saat ini belum ada kategori di dalam tabel kategori</h4>";
			} else {

				echo "<table class='table table-striped table-hover'>";

				echo "<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Kategori</th>
							<th class='text-center'>Status</th>
							<th class='text-center'>Tanggal</th>
							<th class='text-center'>Action</th>
					 </tr>";

				$no=1 + $mulai_dari;
				while ($row=mysqli_fetch_assoc($queryMateri)) {
					
					echo "<tr>
								<td>$no</td>
								<td>$row[judul]</td>
								<td>$row[kategori]</td>
								<td class='text-center'>$row[status]</td>
								<td class='text-center'>$row[tanggal]</td>
								<td class='text-center'>
									<a href='".BASE_URL."index.php?page=halaman_admin&module=materi&action=form&materi_id=$row[materi_id]' class='btn tombol-action' >Edit</a>
									<a href='".BASE_URL."module/materi/action.php?button=Delete&materi_id=$row[materi_id]' class='btn tombol-action' >Delete</a>
								</td>
						  </tr>";
						  $no++;
				}

				echo "</table>";

				$queryHitungMateri = mysqli_query($koneksi, "SELECT * FROM materi");
				pagination($queryHitungMateri, $data_per_halaman, $pagination, "index.php?page=halaman_admin&module=materi&action=list");
			}

		?>		
	</div>
</div>
