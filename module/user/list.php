<div class="row">
	<div class="col-md-12">
		<?php

			$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
			$data_per_halaman = 5;
			$mulai_dari = ($pagination-1) * $data_per_halaman;

			$queryUser = mysqli_query($koneksi, "SELECT * FROM user LIMIT $mulai_dari, $data_per_halaman ");

			if (mysqli_num_rows($queryUser) == 0) {
				echo "<h4>Saat ini belum ada kategori di dalam tabel kategori</h4>";
			} else {

				echo "<table class='table table-striped table-hover'>";

				echo "<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Level</th>
							<th class='text-center'>Status</th>
							<th class='text-center'>Action</th>
					 </tr>";

				$no=1;
				while ($row=mysqli_fetch_assoc($queryUser)) {
					
					echo "<tr>
								<td>$no</td>
								<td>$row[nama]</td>
								<td>$row[email]</td>
								<td>$row[level]</td>
								<td class='text-center'>$row[status]</td>
								<td class='text-center'>
									<a href='".BASE_URL."index.php?page=halaman_admin&module=user&action=form&user_id=$row[user_id]' class='btn tombol-action' >Edit</a>
									<a href='".BASE_URL."module/user/action.php?button=Delete&user_id=$row[user_id]' class='btn tombol-action' >Delete</a>
								</td>
						  </tr>";
						  $no++;
				}

				echo "</table>";

				$queryHitungUser = mysqli_query($koneksi, "SELECT * FROM user");
				pagination($queryHitungUser, $data_per_halaman, $pagination, "index.php?page=halaman_admin&module=user&action=list");
			}

		?>		
	</div>
</div>